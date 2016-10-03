<?php

namespace Tests\Functional;

class GoogleGeocodingAPITest extends BaseTestCase
{
    protected $api_key = 'AIzaSyCu03ZwLyQUscfZ6Rqle1vgoCiTUtmRCEA';
    
    public function testAddressMethods() {
        
        $post_data['args']['api_key'] = $this->api_key;
        $post_data['args']['address'] = 'Wall Street, New York';
        
        foreach(['addressToCoordinates', 'getAddressComponents'] as $route) {
            $response = $this->runApp('POST', '/api/GoogleGeocodingAPI/'.$route, $post_data);

            $this->assertEquals(200, $response->getStatusCode());
            $this->assertNotEmpty($response->getBody());
            $this->assertEquals('success', json_decode($response->getBody())->callback, 'Error in '.$route.' method.');
        }
        
    }
    
    public function testCoordinateMethods() {
        
        $post_data['args']['api_key'] = $this->api_key;
        $post_data['args']['latitude'] = '40.7127837';
        $post_data['args']['longitude'] = '-74.0059413';
        
        foreach(['coordinatesToAddress'] as $route) {
            $response = $this->runApp('POST', '/api/GoogleGeocodingAPI/'.$route, $post_data);

            $this->assertEquals(200, $response->getStatusCode());
            $this->assertNotEmpty($response->getBody());
            $this->assertEquals('success', json_decode($response->getBody())->callback, 'Error in '.$route.' method.');
        }
        
    }

}