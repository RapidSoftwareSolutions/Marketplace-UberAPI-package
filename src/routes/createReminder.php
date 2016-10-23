<?php

$app->post('/api/Uber/createReminder', function ($request, $response, $args) {
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
    if(empty($post_data['args']['reminderTime'])) {
        $error[] = 'reminderTime cannot be empty';
    }
    if(empty($post_data['args']['phoneNumber'])) {
        $error[] = 'phoneNumber cannot be empty';
    }
    if(empty($post_data['args']['eventTime'])) {
        $error[] = 'eventTime cannot be empty';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = implode(',', $error);
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $headers['Authorization'] = "Token " . $post_data['args']['accessToken'];
    $headers['Content-Type'] = 'application/json'; 

    if(isset($post_data['args']['sandbox']) && $post_data['args']['sandbox'] == 1) {
        $query_str = 'https://sandbox-api.uber.com/v1/reminders';
    } else {
        $query_str = 'https://api.uber.com/v1/reminders';
    }
    $body['reminder_time'] = $post_data['args']['reminderTime'];
    $body['phone_number'] = $post_data['args']['phoneNumber'];
    $body['event']['time'] = $post_data['args']['eventTime'];
    if(!empty($post_data['args']['eventName'])) {
        $body['event']['name'] = $post_data['args']['eventName'];
    }
    if(!empty($post_data['args']['eventLocation'])) {
        $body['event']['location'] = $post_data['args']['eventLocation'];
    }
    if(!empty($post_data['args']['eventLatitude'])) {
        $body['event']['latitude'] = $post_data['args']['eventLatitude'];
    }
    if(!empty($post_data['args']['eventLongitude'])) {
        $body['event']['longitude'] = $post_data['args']['eventLongitude'];
    }
    if(!empty($post_data['args']['eventProductId'])) {
        $body['event']['product_id'] = $post_data['args']['eventProductId'];
    }
    if(!empty($post_data['args']['tripBrandingLinkText'])) {
        $body['trip_branding']['link_text'] = $post_data['args']['tripBrandingLinkText'];
    }
    if(!empty($post_data['args']['tripBrandingPartnerDeeplink'])) {
        $body['trip_branding']['partner_deeplink'] = $post_data['args']['tripBrandingPartnerDeeplink'];
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

