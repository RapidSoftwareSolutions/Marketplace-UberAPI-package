<?php

$app->post('/api/UberRide/requestRideById', function ($request, $response, $args) {
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
    if(empty($post_data['args']['startPlace_id'])) {
        $error[] = 'startPlace_id';
    }
    if(empty($post_data['args']['endPlace_id'])) {
        $error[] = 'endPlace_id';
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

    if(!empty($post_data['args']['startPlace_id'])) {
        $body['start_place_id'] = $post_data['args']['startPlace_id'];
    }
    if(!empty($post_data['args']['endPlace_id'])) {
        $body['end_place_id'] = $post_data['args']['endPlace_id'];
    }
    if(!empty($post_data['args']['startNickname'])) {
        $body['start_nickname'] = $post_data['args']['startNickname'];
    }
    if(!empty($post_data['args']['endNickname'])) {
        $body['end_nickname'] = $post_data['args']['endNickname'];
    }
    if(!empty($post_data['args']['startAddress'])) {
        $body['start_address'] = $post_data['args']['startAddress'];
    }
    if(!empty($post_data['args']['endAddress'])) {
        $body['end_address'] = $post_data['args']['endAddress'];
    }
    if(!empty($post_data['args']['productId'])) {
        $body['product_id'] = $post_data['args']['productId'];
    }
    if(!empty($post_data['args']['surgeConfirmationId'])) {
        $body['surge_confirmation_id'] = $post_data['args']['surgeConfirmationId'];
    }
    if(!empty($post_data['args']['paymentMethodId'])) {
        $body['payment_method_id'] = $post_data['args']['paymentMethodId'];
    }
    if(!empty($post_data['args']['seatCount'])) {
        $body['seat_count'] = $post_data['args']['seatCount'];
    }
    if(!empty($post_data['args']['fareId'])) {
        $body['fare_id'] = $post_data['args']['fareId'];
    }
    if(!empty($post_data['args']['expenseCode'])) {
        $body['expense_code'] = $post_data['args']['expenseCode'];
    }
    if(!empty($post_data['args']['expenseMemo'])) {
        $body['expense_memo'] = $post_data['args']['expenseMemo'];
    }


    if(isset($post_data['args']['sandbox']) && $post_data['args']['sandbox'] == 1) {
        $query_str = 'https://sandbox-api.uber.com/v1/requests';
    } else {
        $query_str = 'https://api.uber.com/v1/requests';
    }
    
    $client = $this->httpClient;

    try {

        $resp = $client->post( $query_str, 
            [
                'headers' => $headers,
                'json'=> $body
            ]);
        $responseBody = $resp->getBody()->getContents();
        
        if($resp->getStatusCode() == '202') {
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

