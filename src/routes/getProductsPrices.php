<?php

$app->post('/api/Uber/getProductsPrices', function ($request, $response, $args) {
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
        
    $error = [];
    if(empty($post_data['args']['accessToken'])) {
        $error[] = 'accessToken cannot be empty';
    }
    if(empty($post_data['args']['startLatitude'])) {
        $error[] = 'startLatitude cannot be empty';
    }
    if(empty($post_data['args']['startLongitude'])) {
        $error[] = 'startLongitude cannot be empty';
    }
    if(empty($post_data['args']['endLatitude'])) {
        $error[] = 'endLatitude cannot be empty';
    }
    if(empty($post_data['args']['endLongitude'])) {
        $error[] = 'endLongitude cannot be empty';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = implode(',', $error);
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $headers['Authorization'] = "Bearer " . $post_data['args']['accessToken'];
    $headers['Content-Type'] = 'application/json'; 
    
    $query['start_latitude'] = $post_data['args']['startLatitude'];
    $query['start_longitude'] = $post_data['args']['startLongitude'];
    $query['end_latitude'] = $post_data['args']['endLatitude'];
    $query['end_longitude'] = $post_data['args']['endLongitude'];
    if(!empty($post_data['args']['seatCount'])) {
        $query['seat_count'] = $post_data['args']['seatCount'];
    }

    if(isset($post_data['args']['sandbox']) && $post_data['args']['sandbox'] == 1) {
        $query_str = 'https://sandbox-api.uber.com/v1/estimates/price';
    } else {
        $query_str = 'https://api.uber.com/v1/estimates/price';
    }
    
    
    $client = $this->httpClient;

    try {

        $resp = $client->get( $query_str, 
            [
                'headers' => $headers,
                'query' => $query
            ]);
        $responseBody = $resp->getBody()->getContents();
        $code = $resp->getStatusCode();
        $res = json_decode($responseBody);
        
        if($resp->getStatusCode() == '200') {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {

        $responseBody = $exception->getResponse()->getBody();
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    } catch (GuzzleHttp\Exception\BadResponseException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    }

    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
});

