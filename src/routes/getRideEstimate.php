<?php

$app->post('/api/UberAPI/getRideEstimate', function ($request, $response, $args) {
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
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = implode(',', $error);
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $headers['Authorization'] = "Bearer " . $post_data['args']['accessToken'];
    $headers['Content-Type'] = 'application/json'; 
    
    $body = [];
    if(!empty($post_data['args']['productId'])) {
        $body['product_id'] = $post_data['args']['productId'];
    }
    if(!empty($post_data['args']['startLatitude'])) {
        $body['start_latitude'] = $post_data['args']['startLatitude'];
    }
    if(!empty($post_data['args']['startLongitude'])) {
        $body['start_longitude'] = $post_data['args']['startLongitude'];
    }
    if(!empty($post_data['args']['startPlaceId'])) {
        $body['start_place_id'] = $post_data['args']['startPlaceId'];
    }
    if(!empty($post_data['args']['endLatitude'])) {
        $body['end_latitude'] = $post_data['args']['endLatitude'];
    }
    if(!empty($post_data['args']['endLongitude'])) {
        $body['end_longitude'] = $post_data['args']['endLongitude'];
    }
    if(!empty($post_data['args']['endPlaceId'])) {
        $body['end_place_id'] = $post_data['args']['endPlaceId'];
    }
    if(!empty($post_data['args']['seatCount'])) {
        $body['seat_count'] = $post_data['args']['seatCount'];
    }


    if($post_data['args']['sandbox'] == 1) {
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
        
        if($code == '200') { 
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

