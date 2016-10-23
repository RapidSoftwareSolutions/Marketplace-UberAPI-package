<?php

$app->post('/api/Uber/requestRide', function ($request, $response, $args) {
    $settings =  $this->settings;
    
    $data = $request->getBody();
    $post_data = json_decode($data, true);
    if(!isset($post_data['args'])) {
        $data = $request->getParsedBody();
        $post_data = $data;
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
    
    $body = [];
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
                'body'=> json_encode($body)
            ]);
        $responseBody = $resp->getBody()->getContents();
        $code = $resp->getStatusCode();
        $res = json_decode($responseBody);
        
        if($code == '202') { 
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = json_encode($res);   
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to'] = json_encode($res);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {

        $responseBody = $exception->getResponse()->getBody();
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_encode(json_decode($responseBody));

    }
    
    

    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
});

