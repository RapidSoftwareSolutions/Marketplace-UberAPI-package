<?php

$app->post('/api/Uber/updateReminder', function ($request, $response, $args) {
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
    if(empty($post_data['args']['reminderId'])) {
        $error[] = 'reminderId';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = "REQUIRED_FIELDS";
        $result['contextWrites']['to']['status_msg'] = "Please, check and fill in required fields.";
        $result['contextWrites']['to']['fields'] = $error;
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $headers['Authorization'] = "Token " . $post_data['args']['accessToken'];
    $headers['Content-Type'] = 'application/json'; 
    
    $body = [];
    if(!empty($post_data['args']['reminderTime'])) {
        $body['reminder_time'] = $post_data['args']['reminderTime'];
    }
    if(!empty($post_data['args']['phoneNumber'])) {
        $body['phone_number'] = $post_data['args']['phoneNumber'];
    }
    if(!empty($post_data['args']['eventTime'])) {
        $body['event']['time'] = $post_data['args']['eventTime'];
    }
    if(!empty($post_data['args']['eventName'])) {
        $body['event']['name'] = $post_data['args']['eventName'];
    }
    if(!empty($post_data['args']['eventLocation'])) {
        $body['event']['location'] = $post_data['args']['eventLocation'];
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

    if(isset($post_data['args']['sandbox']) && $post_data['args']['sandbox'] == 1) {
        $query_str = 'https://sandbox-api.uber.com/v1/reminders/' . $post_data['args']['reminderId'];
    } else {
        $query_str = 'https://api.uber.com/v1/reminders/' . $post_data['args']['reminderId'];
    }
    
    $client = $this->httpClient;

    try {

        $resp = $client->patch( $query_str, 
            [
                'headers' => $headers,
                'body' => json_encode($body)
            ]);
        $responseBody = $resp->getBody()->getContents();
        
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

