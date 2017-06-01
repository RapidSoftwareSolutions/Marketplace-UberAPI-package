<?php

$app->post('/api/UberRide/getRideEstimate', function ($request, $response, $args) {
    $settings =  $this->settings;
    
    $data = $request->getBody();

    if($data=='') {
        $post_data = $request->getParsedBody();
    } else {
        $toJson = $this->toJson;
        $data = $toJson->normalizeJson($data); 
        $data = str_replace('\"', '"', $data);
        $post_data = json_decode($data, true);
    }
    
    if(json_last_error() != 0) {
        $error[] = json_last_error_msg() . '. Incorrect input JSON. Please, check fields with JSON input.';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'JSON_VALIDATION';
        $result['contextWrites']['to']['status_msg'] = implode(',', $error);
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
        
    $error = [];
    if(empty($post_data['args']['accessToken'])) {
        $error[] = 'accessToken';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = "REQUIRED_FIELDS";
        $result['contextWrites']['to']['status_msg'] = "Please, check and fill in required fields.";
        $result['contextWrites']['to']['fields'] = $error;
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $headers['Authorization'] = "Bearer " . $post_data['args']['accessToken'];
    $headers['Content-Type'] = 'application/json'; 
    
    $body = [];
    if(!empty($post_data['args']['productId'])) {
        $body['product_id'] = $post_data['args']['productId'];
    }

    if(!empty($post_data['args']['startCoordinates'])) {
        $body['start_latitude'] = explode(",",$post_data['args']['startCoordinates'])[0];
        $body['start_longitude'] = explode(",",$post_data['args']['startCoordinates'])[1];
    }

    if(!empty($post_data['args']['startLatitude']) && !empty($post_data['args']['startLongitude'])){
        $body['start_latitude'] = $post_data['args']['eventLatitude'];
        $body['start_longitude'] = $post_data['args']['eventLongitude'];
    }


    if(!empty($post_data['args']['startPlaceId'])) {
        $body['start_place_id'] = $post_data['args']['startPlaceId'];
    }

    if(!empty($post_data['args']['endCoordinates'])) {
        $body['end_latitude'] = explode(",",$post_data['args']['endCoordinates'])[0];
        $body['end_longitude'] = explode(",",$post_data['args']['endCoordinates'])[1];
    }

    if(!empty($post_data['args']['endLatitude']) && !empty($post_data['args']['endLongitude'])){
        $body['end_latitude'] = $post_data['args']['endLatitude'];
        $body['end_longitude'] = $post_data['args']['endLongitude'];
    }


    if(!empty($post_data['args']['endPlaceId'])) {
        $body['end_place_id'] = $post_data['args']['endPlaceId'];
    }
    if(!empty($post_data['args']['seatCount'])) {
        $body['seat_count'] = $post_data['args']['seatCount'];
    }


    if(isset($post_data['args']['sandbox']) && $post_data['args']['sandbox'] == 1) {
        $query_str = 'https://sandbox-api.uber.com/v1/requests/estimate';
    } else {
        $query_str = 'https://api.uber.com/v1/requests/estimate';
    }
    
    $client = $this->httpClient;

    try {

        $resp = $client->post( $query_str, 
            [
                'headers' => $headers,
                'body'=> json_encode($body)
            ]);
        $responseBody = $resp->getBody()->getContents();
        $code = $resp->getStatusCode();
        $res = json_decode($responseBody);
        
        if($resp->getStatusCode() == '200') {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {

        $responseBody = $exception->getResponse()->getBody();
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = json_decode($responseBody);

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = json_decode($responseBody);

    } catch (GuzzleHttp\Exception\BadResponseException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = json_decode($responseBody);

    } catch (GuzzleHttp\Exception\ConnectException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'INTERNAL_PACKAGE_ERROR';
        $result['contextWrites']['to']['status_msg'] = 'Something went wrong inside the package.';

    }

    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
});


