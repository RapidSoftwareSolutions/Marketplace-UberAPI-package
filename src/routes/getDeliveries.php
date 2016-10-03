<?php

$app->post('/api/UberAPI/getDeliveries', function ($request, $response, $args) {
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
    if($post_data['args']['offset'] == '' ) {
        $error[] = 'offset cannot be empty';
    }
    if(empty($post_data['args']['limit'])) {
        $error[] = 'limit cannot be empty';
    }
    if(empty($post_data['args']['status'])) {
        $error[] = 'status cannot be empty';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = implode(',', $error);
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $headers['Authorization'] = "Bearer " . $post_data['args']['accessToken'];
    $headers['Content-Type'] = 'application/json';
    
    $query['offset'] = $post_data['args']['offset'];  
    $query['limit'] = $post_data['args']['limit'];
    $query['status'] = $post_data['args']['status'];

    if($post_data['args']['sandbox'] == 1) {
        $query_str = 'https://sandbox-api.uber.com/v1/deliveries';
    } else {
        $query_str = 'https://api.uber.com/v1/deliveries';
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
        
        if(!empty($res) && $code == '200') { 
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

