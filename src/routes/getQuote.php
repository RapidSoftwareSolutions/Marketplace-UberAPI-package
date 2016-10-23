<?php

$app->post('/api/Uber/getQuote', function ($request, $response, $args) {
    $settings =  $this->settings;
    
    $data = $request->getBody();
    $post_data = json_decode($data, true);
    if(!isset($post_data['args'])) {
        $data = $request->getParsedBody();
        $post_data = $data;
    }
    
    $reqFields = ['pickupLocationAddress',
                'pickupLocationCity', 
                'pickupLocationState', 
                'pickupLocationPostalCode', 
                'pickupLocationCountry', 
                'dropoffLocationAddress', 
                'dropoffLocationAddress2', 
                'dropoffLocationCity', 
                'dropoffLocationState', 
                'dropoffLocationPostalCode', 
                'dropoffLocationCountry'];
    
    $error = [];
    if(empty($post_data['args']['accessToken'])) {
        $error[] = 'accessToken cannot be empty';
    }
    foreach($reqFields as $field) {
        if(empty($post_data['args'][$field])) {
            $error[] = ' ' .$field. ' cannot be empty';
        }
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = implode(',', $error);
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $headers['Authorization'] = "Bearer " . $post_data['args']['accessToken'];
    $headers['Content-Type'] = 'application/json';
    
    $body['pickup']['location']['address'] = $post_data['args']['pickupLocationAddress'];
    $body['pickup']['location']['city'] = $post_data['args']['pickupLocationCity'];
    $body['pickup']['location']['state'] = $post_data['args']['pickupLocationState'];
    $body['pickup']['location']['postal_code'] = $post_data['args']['pickupLocationPostalCode'];
    $body['pickup']['location']['country'] = $post_data['args']['pickupLocationCountry'];
    $body['dropoff']['location']['address'] = $post_data['args']['dropoffLocationAddress'];
    $body['dropoff']['location']['address_2'] = $post_data['args']['dropoffLocationAddress2'];
    $body['dropoff']['location']['city'] = $post_data['args']['dropoffLocationCity'];
    $body['dropoff']['location']['state'] = $post_data['args']['dropoffLocationState'];
    $body['dropoff']['location']['postal_code'] = $post_data['args']['dropoffLocationPostalCode'];
    $body['dropoff']['location']['country'] = $post_data['args']['dropoffLocationCountry'];
 
    
    if(!empty($post_data['args']['pickupLocationAddress2'])) {
        $body['pickup']['location']['address_2'] = $post_data['args']['pickupLocationAddress2'];
    }
    if(!empty($post_data['args']['pickupLocationLatitude'])) {
        $body['pickup']['location']['latitude'] = $post_data['args']['pickupLocationLatitude'];
    }
    if(!empty($post_data['args']['pickupLocationLongitude'])) {
        $body['pickup']['location']['longitude'] = $post_data['args']['pickupLocationLongitude'];
    }
    if(!empty($post_data['args']['dropoffLocationLatitude'])) {
        $body['dropoff']['location']['latitude'] = $post_data['args']['dropoffLocationLatitude'];
    }
    if(!empty($post_data['args']['dropoffLocationLongitude'])) {
        $body['dropoff']['location']['longitude'] = $post_data['args']['dropoffLocationLongitude'];
    }  

    if(isset($post_data['args']['sandbox']) && $post_data['args']['sandbox'] == 1) {
        $query_str = 'https://sandbox-api.uber.com/v1/deliveries/quote';
    } else {
        $query_str = 'https://api.uber.com/v1/deliveries/quote';
    }
    
    $client = $this->httpClient;

    try {

        $resp = $client->post( $query_str, 
            [
                'headers' => $headers,
                'body' => json_encode($body)
            ]);
        $responseBody = $resp->getBody()->getContents();
        $code = $resp->getStatusCode();
        $res = json_decode($responseBody);
        
        if(!empty($res) && $code == '201') { 
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

