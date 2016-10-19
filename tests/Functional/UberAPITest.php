<?php

namespace Tests\Functional;

class UberTest extends BaseTestCase
{
    public function testRequestDelivery() {
        
        $var = '{
                "args": {
                  "accessToken": "eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJzY29wZXMiOlsiZGVsaXZlcnkiXSwic3ViIjoiYzcxNmQ3Y2ItMWE1ZC00Y2JhLTk0MDktNDMxNDFiNjBhYzg4IiwiaXNzIjoidWJlci11czEiLCJqdGkiOiI5N2M1YmQxMS0yYzc2LTRkMGYtOTk1ZS00ZmZjM2NiYTYwNmMiLCJleHAiOjE0NzgwNzkxMDQsImlhdCI6MTQ3NTQ4NzEwNCwidWFjdCI6IlhDc2d2ZGFGRWR2UWd3b0hXclE1MWpCU0Zocm1CdSIsIm5iZiI6MTQ3NTQ4NzAxNCwiYXVkIjoiMHIxLWJHenpQa2lQa19LdmwtczZHVjFpM3BqTUFuT2UifQ.lPejm0j1EqUcJp6D1LGfA73Pgoj95kFI-kBNZEJSXiVm2DuP67EVKZh0P7Lq6e823ioh4fL9ehWHe0vmG5Hoq3almcb-S6bBPN76ebcuoymlMTjH6DLSr_2A1pu2y-jkAIvQrQhsitSvGXAH0TlvmCLcKCNAx5UMMctCiuZY4XMYzp466BzAA4P12VNZvFNYl85CsH8_2ppAtqRJIymKrHGTw2lyJcBB_ddOcGAXktBXsy9ncNmcI58HIuHHZB44LBEzpWEXef5Iw2NAWHyHf8VHrn1fOdMMdVQFS3Zk8-fhv78wLp96-ynKhIBkP6lPqc6Fe6iViDJhO5_3C2XKsw",
                  "itemsTitle": "Test title items",
                  "itemsQuantity": "1",
                  "itemsPrice": "100",
                  "itemsCurrencyCode": "USD",
                  "pickupLocationAddress": "143 Ludlow St",
                  "pickupLocationCity": "New York",
                  "pickupLocationState": "NY",
                  "pickupLocationPostalCode": "10002",
                  "pickupLocationCountry": "USA",
                  "pickupContactFirstName": "Sergey",
                  "pickupContactLastName": "Osipchuk",
                  "pickupContactEmail": "triongroup@gmail.com",
                  "pickupContactPhoneNumber": "+381234567890",
                  "dropoffLocationAddress": "Basseyna st",
                  "dropoffLocationAddress2": "Basseyna st",
                  "dropoffLocationCity": "Kyiv",
                  "dropoffLocationState": "Kyiv",
                  "dropoffLocationPostalCode": "50001",
                  "dropoffLocationCountry": "Ukraine",
                  "dropoffContactFirstName": "Test",
                  "dropoffContactLastName": "Testov",
                  "dropoffContactEmail": "test@site.com",
                  "dropoffContactPhoneNumber": "+380051234567",
                  "dropoffContactPhoneSmsEnabled": "false",
                  "includesAlcohol": "false",
                  "sandbox": "1"
                }
        }';
        $post_data = json_decode($var, true);
        
        $response = $this->runApp('POST', '/api/Uber/requestDelivery', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
    }
    
    public function testGetDelivery() {
        
        $var = '{
                        "args": {
                          "accessToken": "eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJzY29wZXMiOlsiZGVsaXZlcnkiXSwic3ViIjoiYzcxNmQ3Y2ItMWE1ZC00Y2JhLTk0MDktNDMxNDFiNjBhYzg4IiwiaXNzIjoidWJlci11czEiLCJqdGkiOiI5N2M1YmQxMS0yYzc2LTRkMGYtOTk1ZS00ZmZjM2NiYTYwNmMiLCJleHAiOjE0NzgwNzkxMDQsImlhdCI6MTQ3NTQ4NzEwNCwidWFjdCI6IlhDc2d2ZGFGRWR2UWd3b0hXclE1MWpCU0Zocm1CdSIsIm5iZiI6MTQ3NTQ4NzAxNCwiYXVkIjoiMHIxLWJHenpQa2lQa19LdmwtczZHVjFpM3BqTUFuT2UifQ.lPejm0j1EqUcJp6D1LGfA73Pgoj95kFI-kBNZEJSXiVm2DuP67EVKZh0P7Lq6e823ioh4fL9ehWHe0vmG5Hoq3almcb-S6bBPN76ebcuoymlMTjH6DLSr_2A1pu2y-jkAIvQrQhsitSvGXAH0TlvmCLcKCNAx5UMMctCiuZY4XMYzp466BzAA4P12VNZvFNYl85CsH8_2ppAtqRJIymKrHGTw2lyJcBB_ddOcGAXktBXsy9ncNmcI58HIuHHZB44LBEzpWEXef5Iw2NAWHyHf8VHrn1fOdMMdVQFS3Zk8-fhv78wLp96-ynKhIBkP6lPqc6Fe6iViDJhO5_3C2XKsw",
                          "deliveryId": "5cc0f005-974e-495d-9693-8b4880e1967e",
                          "sandbox": "1"
                        }
                }';
        $post_data = json_decode($var, true);
        
        $response = $this->runApp('POST', '/api/Uber/getDelivery', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
    }
    
    public function testCancelDelivery() {
        
        $var = '{
                        "args": {
                          "accessToken": "eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJzY29wZXMiOlsiZGVsaXZlcnkiXSwic3ViIjoiYzcxNmQ3Y2ItMWE1ZC00Y2JhLTk0MDktNDMxNDFiNjBhYzg4IiwiaXNzIjoidWJlci11czEiLCJqdGkiOiI5N2M1YmQxMS0yYzc2LTRkMGYtOTk1ZS00ZmZjM2NiYTYwNmMiLCJleHAiOjE0NzgwNzkxMDQsImlhdCI6MTQ3NTQ4NzEwNCwidWFjdCI6IlhDc2d2ZGFGRWR2UWd3b0hXclE1MWpCU0Zocm1CdSIsIm5iZiI6MTQ3NTQ4NzAxNCwiYXVkIjoiMHIxLWJHenpQa2lQa19LdmwtczZHVjFpM3BqTUFuT2UifQ.lPejm0j1EqUcJp6D1LGfA73Pgoj95kFI-kBNZEJSXiVm2DuP67EVKZh0P7Lq6e823ioh4fL9ehWHe0vmG5Hoq3almcb-S6bBPN76ebcuoymlMTjH6DLSr_2A1pu2y-jkAIvQrQhsitSvGXAH0TlvmCLcKCNAx5UMMctCiuZY4XMYzp466BzAA4P12VNZvFNYl85CsH8_2ppAtqRJIymKrHGTw2lyJcBB_ddOcGAXktBXsy9ncNmcI58HIuHHZB44LBEzpWEXef5Iw2NAWHyHf8VHrn1fOdMMdVQFS3Zk8-fhv78wLp96-ynKhIBkP6lPqc6Fe6iViDJhO5_3C2XKsw",
                          "deliveryId": "5cc0f005-974e-495d-9693-8b4880e1967e",
                          "sandbox": "1"
                        }
                }';
        $post_data = json_decode($var, true);
        
        $response = $this->runApp('POST', '/api/Uber/cancelDelivery', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('null', json_decode($response->getBody())->contextWrites->to);
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
    }
    
    public function testGetDeliveries() {
        
        $var = '{
                        "args": {
                          "accessToken": "eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJzY29wZXMiOlsiZGVsaXZlcnkiXSwic3ViIjoiYzcxNmQ3Y2ItMWE1ZC00Y2JhLTk0MDktNDMxNDFiNjBhYzg4IiwiaXNzIjoidWJlci11czEiLCJqdGkiOiI5N2M1YmQxMS0yYzc2LTRkMGYtOTk1ZS00ZmZjM2NiYTYwNmMiLCJleHAiOjE0NzgwNzkxMDQsImlhdCI6MTQ3NTQ4NzEwNCwidWFjdCI6IlhDc2d2ZGFGRWR2UWd3b0hXclE1MWpCU0Zocm1CdSIsIm5iZiI6MTQ3NTQ4NzAxNCwiYXVkIjoiMHIxLWJHenpQa2lQa19LdmwtczZHVjFpM3BqTUFuT2UifQ.lPejm0j1EqUcJp6D1LGfA73Pgoj95kFI-kBNZEJSXiVm2DuP67EVKZh0P7Lq6e823ioh4fL9ehWHe0vmG5Hoq3almcb-S6bBPN76ebcuoymlMTjH6DLSr_2A1pu2y-jkAIvQrQhsitSvGXAH0TlvmCLcKCNAx5UMMctCiuZY4XMYzp466BzAA4P12VNZvFNYl85CsH8_2ppAtqRJIymKrHGTw2lyJcBB_ddOcGAXktBXsy9ncNmcI58HIuHHZB44LBEzpWEXef5Iw2NAWHyHf8VHrn1fOdMMdVQFS3Zk8-fhv78wLp96-ynKhIBkP6lPqc6Fe6iViDJhO5_3C2XKsw",
                          "offset": "0",
                          "limit": "50",
                          "status": "active",
                          "sandbox": "1"
                        }
                }';
        $post_data = json_decode($var, true);
        
        $response = $this->runApp('POST', '/api/Uber/getDeliveries', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
    }
    
    public function testGetQuote() {
        
        $var = '{
                        "args": {
                          "accessToken": "eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJzY29wZXMiOlsiZGVsaXZlcnkiXSwic3ViIjoiYzcxNmQ3Y2ItMWE1ZC00Y2JhLTk0MDktNDMxNDFiNjBhYzg4IiwiaXNzIjoidWJlci11czEiLCJqdGkiOiI5N2M1YmQxMS0yYzc2LTRkMGYtOTk1ZS00ZmZjM2NiYTYwNmMiLCJleHAiOjE0NzgwNzkxMDQsImlhdCI6MTQ3NTQ4NzEwNCwidWFjdCI6IlhDc2d2ZGFGRWR2UWd3b0hXclE1MWpCU0Zocm1CdSIsIm5iZiI6MTQ3NTQ4NzAxNCwiYXVkIjoiMHIxLWJHenpQa2lQa19LdmwtczZHVjFpM3BqTUFuT2UifQ.lPejm0j1EqUcJp6D1LGfA73Pgoj95kFI-kBNZEJSXiVm2DuP67EVKZh0P7Lq6e823ioh4fL9ehWHe0vmG5Hoq3almcb-S6bBPN76ebcuoymlMTjH6DLSr_2A1pu2y-jkAIvQrQhsitSvGXAH0TlvmCLcKCNAx5UMMctCiuZY4XMYzp466BzAA4P12VNZvFNYl85CsH8_2ppAtqRJIymKrHGTw2lyJcBB_ddOcGAXktBXsy9ncNmcI58HIuHHZB44LBEzpWEXef5Iw2NAWHyHf8VHrn1fOdMMdVQFS3Zk8-fhv78wLp96-ynKhIBkP6lPqc6Fe6iViDJhO5_3C2XKsw",
                          "pickupLocationAddress": "143 Ludlow St",
                          "pickupLocationCity": "New York",
                          "pickupLocationState": "NY",
                          "pickupLocationPostalCode": "10002",
                          "pickupLocationCountry": "USA",
                          "dropoffLocationAddress": "Basseyna st",
                          "dropoffLocationAddress2": "Basseyna st",
                          "dropoffLocationCity": "Kyiv",
                          "dropoffLocationState": "Kyiv",
                          "dropoffLocationPostalCode": "50001",
                          "dropoffLocationCountry": "Ukraine",
                          "sandbox": "1"
                        }
                }';
        $post_data = json_decode($var, true);
        
        $response = $this->runApp('POST', '/api/Uber/getQuote', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
    }
    
    public function testGetUser() {
        
        $var = '{
                        "args": {
                          "accessToken": "eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJzY29wZXMiOlsicHJvZmlsZSJdLCJzdWIiOiJjNzE2ZDdjYi0xYTVkLTRjYmEtOTQwOS00MzE0MWI2MGFjODgiLCJpc3MiOiJ1YmVyLXVzMSIsImp0aSI6ImNlY2RiMTYzLThjZjYtNDllNS05Njk5LTQ1NmQ1ZThlMGQ0NSIsImV4cCI6MTQ3ODA4ODY5NiwiaWF0IjoxNDc1NDk2Njk2LCJ1YWN0IjoicWZhbjM3YlF0WG1PQ09zMEtqM05nbUxnS2RuQVBPIiwibmJmIjoxNDc1NDk2NjA2LCJhdWQiOiIwcjEtYkd6elBraVBrX0t2bC1zNkdWMWkzcGpNQW5PZSJ9.dqNwTWZRsV3MZAQG2bpCPQ_jtuh-Ky2XrKE3Skjot_bxT9aIM7LBeCMAzj-RIK0u1WlSWJ0o-6Ldhe5imVyzxZyyg81AsdctUaEZ6OO0599jA8ldAly85aNcBS1hrKG4e8LBD_DnYMmL_CfOf41z8t8a0_AlONEL7CNykOqD9rRYtfbCHPqw5q5jK9HrfxK-HsmSgnUwiL8w-GyzPpM7eylMz-3AGCoiOQDy7OqybkCArxAmX8sQk20-DE-0GqpixSpdXYHhDPeWuya2bUsoh5cNZTzpZBhp_kohctBw2zJGHUAFHwccwEp5kbWMGMcgboQ8huaC8DyLJBcLLnNeOQ",
                          "sandbox": "1"
                        }
                }';
        $post_data = json_decode($var, true);
        
        $response = $this->runApp('POST', '/api/Uber/getUser', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
    }
    
    public function testGetUserActivity() {
        
        $var = '{
                        "args": {
                          "accessToken": "eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJzY29wZXMiOlsicHJvZmlsZSIsImhpc3RvcnkiXSwic3ViIjoiYzcxNmQ3Y2ItMWE1ZC00Y2JhLTk0MDktNDMxNDFiNjBhYzg4IiwiaXNzIjoidWJlci11czEiLCJqdGkiOiI2M2M5Zjg2Zi0zMjE3LTRlNjYtYTc0MS1hMTJhMGI3YmE0MGMiLCJleHAiOjE0NzgwODk3ODIsImlhdCI6MTQ3NTQ5Nzc4MiwidWFjdCI6ImJrSXlmY0Exa0RjOW5Nd1dPWVVtaERWQ1dXTEY5biIsIm5iZiI6MTQ3NTQ5NzY5MiwiYXVkIjoiMHIxLWJHenpQa2lQa19LdmwtczZHVjFpM3BqTUFuT2UifQ.RBioqqkhybn8pkJ8c4qeDJUIgBjzM3PfkHxfe7qOKolvf67iw6m_D7FTXQTTWE2fmVS3Siu9g1OoffIZvfD3tf3DEo6QvW9ZQjBjBvWmeZpe8lTq6SkmlwZ6rZzp3739Z-LT7E1uie0uNOKZ0D3OtO266qf8NHPGszOOHQgAASkIOO2x0h5bDGy278whAq7mfuiCmbV5BJZGD9dG7TrpGEFYCeRt8DcgwSxepzm48VTxibT80lUiIHWih6gKhb9RQqzU3B5vauehHKcWWeALgM3A1vX40z-z6vcUm5XhrzMdiCHhT14QVs7wtvMLriTcM5sYSay_n6QICm69ztN3jw",
                          "sandbox": "1"
                        }
                }';
        $post_data = json_decode($var, true);
        
        $response = $this->runApp('POST', '/api/Uber/getUserActivity', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
    }
    
    public function testGetProductDetails() {
        
        $var = '{
                        "args": {
                          "accessToken": "eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJzY29wZXMiOlsicHJvZmlsZSIsImhpc3RvcnkiXSwic3ViIjoiYzcxNmQ3Y2ItMWE1ZC00Y2JhLTk0MDktNDMxNDFiNjBhYzg4IiwiaXNzIjoidWJlci11czEiLCJqdGkiOiI2M2M5Zjg2Zi0zMjE3LTRlNjYtYTc0MS1hMTJhMGI3YmE0MGMiLCJleHAiOjE0NzgwODk3ODIsImlhdCI6MTQ3NTQ5Nzc4MiwidWFjdCI6ImJrSXlmY0Exa0RjOW5Nd1dPWVVtaERWQ1dXTEY5biIsIm5iZiI6MTQ3NTQ5NzY5MiwiYXVkIjoiMHIxLWJHenpQa2lQa19LdmwtczZHVjFpM3BqTUFuT2UifQ.RBioqqkhybn8pkJ8c4qeDJUIgBjzM3PfkHxfe7qOKolvf67iw6m_D7FTXQTTWE2fmVS3Siu9g1OoffIZvfD3tf3DEo6QvW9ZQjBjBvWmeZpe8lTq6SkmlwZ6rZzp3739Z-LT7E1uie0uNOKZ0D3OtO266qf8NHPGszOOHQgAASkIOO2x0h5bDGy278whAq7mfuiCmbV5BJZGD9dG7TrpGEFYCeRt8DcgwSxepzm48VTxibT80lUiIHWih6gKhb9RQqzU3B5vauehHKcWWeALgM3A1vX40z-z6vcUm5XhrzMdiCHhT14QVs7wtvMLriTcM5sYSay_n6QICm69ztN3jw",
                          "productId": "d4abaae7-f4d6-4152-91cc-77523e8165a4",
                          "sandbox": "1"
                        }
                }';
        $post_data = json_decode($var, true);
        
        $response = $this->runApp('POST', '/api/Uber/getProductDetails', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
    }
    
    public function testGetCurrentRide() {
        
        $var = '{
                        "args": {
                          "accessToken": "eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJzY29wZXMiOlsicmVxdWVzdCIsImFsbF90cmlwcyIsImhpc3RvcnkiXSwic3ViIjoiYzcxNmQ3Y2ItMWE1ZC00Y2JhLTk0MDktNDMxNDFiNjBhYzg4IiwiaXNzIjoidWJlci11czEiLCJqdGkiOiIxYWI3ZTY4MC1iYjUxLTQ2YWItOTg1Mi01OWI3YmFjMzFjYmYiLCJleHAiOjE0NzgwOTAzMzAsImlhdCI6MTQ3NTQ5ODMyOSwidWFjdCI6IkJFRXhBa2xJaWtHUXNpSDhPYk0yZmpkODNHVjRXTiIsIm5iZiI6MTQ3NTQ5ODIzOSwiYXVkIjoiMHIxLWJHenpQa2lQa19LdmwtczZHVjFpM3BqTUFuT2UifQ.akPXNrCSOGq1_kppBasoIunZkCfktiLLEyJLcV-c3k1mKLFfkPon8R7kQhqap67enrPJY_1xwRdY3Q-9pO_7NUWXZhiGtRIUNrSWj8PQrwR_PtNhWCx2TfM79ySbYtL-ygpyrqRBEVIGZQNr_-gXQtn2jouOKGojJbBpS5VZ0VDMN_D9V9BFHUF0K_75Vifrdz7CS-8FOninipdM2BaLaJLPXj9SqD-5pa9bK-z17kF5mO9ryptWzqD9LOJ-E4i3PdA0oGjX4Q1FNvwuRZC8moEMWrt45sH0IFYhZxBKJNezRcoIaBoFNLQeOacmZ30rcGIqcXlS2-kLO18-c2Twtw",
                          "sandbox": "1"
                        }
                }';
        $post_data = json_decode($var, true);
        
        $response = $this->runApp('POST', '/api/Uber/getCurrentRide', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('error', json_decode($response->getBody())->callback);
        $this->assertContains('User is not currently on a trip', json_decode($response->getBody())->contextWrites->to);
        
    }
    
    public function testGetRide() {
        
        $var = '{
                        "args": {
                          "accessToken": "eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJzY29wZXMiOlsicmVxdWVzdCIsImFsbF90cmlwcyIsImhpc3RvcnkiXSwic3ViIjoiYzcxNmQ3Y2ItMWE1ZC00Y2JhLTk0MDktNDMxNDFiNjBhYzg4IiwiaXNzIjoidWJlci11czEiLCJqdGkiOiIxYWI3ZTY4MC1iYjUxLTQ2YWItOTg1Mi01OWI3YmFjMzFjYmYiLCJleHAiOjE0NzgwOTAzMzAsImlhdCI6MTQ3NTQ5ODMyOSwidWFjdCI6IkJFRXhBa2xJaWtHUXNpSDhPYk0yZmpkODNHVjRXTiIsIm5iZiI6MTQ3NTQ5ODIzOSwiYXVkIjoiMHIxLWJHenpQa2lQa19LdmwtczZHVjFpM3BqTUFuT2UifQ.akPXNrCSOGq1_kppBasoIunZkCfktiLLEyJLcV-c3k1mKLFfkPon8R7kQhqap67enrPJY_1xwRdY3Q-9pO_7NUWXZhiGtRIUNrSWj8PQrwR_PtNhWCx2TfM79ySbYtL-ygpyrqRBEVIGZQNr_-gXQtn2jouOKGojJbBpS5VZ0VDMN_D9V9BFHUF0K_75Vifrdz7CS-8FOninipdM2BaLaJLPXj9SqD-5pa9bK-z17kF5mO9ryptWzqD9LOJ-E4i3PdA0oGjX4Q1FNvwuRZC8moEMWrt45sH0IFYhZxBKJNezRcoIaBoFNLQeOacmZ30rcGIqcXlS2-kLO18-c2Twtw",
                          "requestId": "a1111c8c-c720-46c3-8534-2fcdd730040d",
                          "sandbox": "1"
                        }
                }';
        $post_data = json_decode($var, true);
        
        $response = $this->runApp('POST', '/api/Uber/getRide', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('error', json_decode($response->getBody())->callback);
        $this->assertContains('cannot find trip', json_decode($response->getBody())->contextWrites->to);
        
    }
    
    public function testGetProductsByLocation() {
        
        $var = '{
                        "args": {
                          "accessToken": "eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJzY29wZXMiOlsicmVxdWVzdCIsImFsbF90cmlwcyIsImhpc3RvcnkiXSwic3ViIjoiYzcxNmQ3Y2ItMWE1ZC00Y2JhLTk0MDktNDMxNDFiNjBhYzg4IiwiaXNzIjoidWJlci11czEiLCJqdGkiOiIxYWI3ZTY4MC1iYjUxLTQ2YWItOTg1Mi01OWI3YmFjMzFjYmYiLCJleHAiOjE0NzgwOTAzMzAsImlhdCI6MTQ3NTQ5ODMyOSwidWFjdCI6IkJFRXhBa2xJaWtHUXNpSDhPYk0yZmpkODNHVjRXTiIsIm5iZiI6MTQ3NTQ5ODIzOSwiYXVkIjoiMHIxLWJHenpQa2lQa19LdmwtczZHVjFpM3BqTUFuT2UifQ.akPXNrCSOGq1_kppBasoIunZkCfktiLLEyJLcV-c3k1mKLFfkPon8R7kQhqap67enrPJY_1xwRdY3Q-9pO_7NUWXZhiGtRIUNrSWj8PQrwR_PtNhWCx2TfM79ySbYtL-ygpyrqRBEVIGZQNr_-gXQtn2jouOKGojJbBpS5VZ0VDMN_D9V9BFHUF0K_75Vifrdz7CS-8FOninipdM2BaLaJLPXj9SqD-5pa9bK-z17kF5mO9ryptWzqD9LOJ-E4i3PdA0oGjX4Q1FNvwuRZC8moEMWrt45sH0IFYhZxBKJNezRcoIaBoFNLQeOacmZ30rcGIqcXlS2-kLO18-c2Twtw",
                          "latitude": "37.766220",
                          "longitude": "-122.454754",
                          "sandbox": "1"
                        }
                }';
        $post_data = json_decode($var, true);
        
        $response = $this->runApp('POST', '/api/Uber/getProductsByLocation', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
    }
    
    public function testGetProductsPrices() {
        
        $var = '{
                        "args": {
                          "accessToken": "eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJzY29wZXMiOlsicmVxdWVzdCIsImFsbF90cmlwcyIsImhpc3RvcnkiXSwic3ViIjoiYzcxNmQ3Y2ItMWE1ZC00Y2JhLTk0MDktNDMxNDFiNjBhYzg4IiwiaXNzIjoidWJlci11czEiLCJqdGkiOiIxYWI3ZTY4MC1iYjUxLTQ2YWItOTg1Mi01OWI3YmFjMzFjYmYiLCJleHAiOjE0NzgwOTAzMzAsImlhdCI6MTQ3NTQ5ODMyOSwidWFjdCI6IkJFRXhBa2xJaWtHUXNpSDhPYk0yZmpkODNHVjRXTiIsIm5iZiI6MTQ3NTQ5ODIzOSwiYXVkIjoiMHIxLWJHenpQa2lQa19LdmwtczZHVjFpM3BqTUFuT2UifQ.akPXNrCSOGq1_kppBasoIunZkCfktiLLEyJLcV-c3k1mKLFfkPon8R7kQhqap67enrPJY_1xwRdY3Q-9pO_7NUWXZhiGtRIUNrSWj8PQrwR_PtNhWCx2TfM79ySbYtL-ygpyrqRBEVIGZQNr_-gXQtn2jouOKGojJbBpS5VZ0VDMN_D9V9BFHUF0K_75Vifrdz7CS-8FOninipdM2BaLaJLPXj9SqD-5pa9bK-z17kF5mO9ryptWzqD9LOJ-E4i3PdA0oGjX4Q1FNvwuRZC8moEMWrt45sH0IFYhZxBKJNezRcoIaBoFNLQeOacmZ30rcGIqcXlS2-kLO18-c2Twtw",
                          "startLatitude": "37.733259",
                          "startLongitude": "-122.429254",
                          "endLatitude": "37.726394",
                          "endLongitude": "-122.476348",
                          "sandbox": "1"
                        }
                }';
        $post_data = json_decode($var, true);
        
        $response = $this->runApp('POST', '/api/Uber/getProductsPrices', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
    }
    
    public function testGetProductsTimeEstimates() {
        
        $var = '{
                        "args": {
                          "accessToken": "eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJzY29wZXMiOlsicmVxdWVzdCIsImFsbF90cmlwcyIsImhpc3RvcnkiXSwic3ViIjoiYzcxNmQ3Y2ItMWE1ZC00Y2JhLTk0MDktNDMxNDFiNjBhYzg4IiwiaXNzIjoidWJlci11czEiLCJqdGkiOiIxYWI3ZTY4MC1iYjUxLTQ2YWItOTg1Mi01OWI3YmFjMzFjYmYiLCJleHAiOjE0NzgwOTAzMzAsImlhdCI6MTQ3NTQ5ODMyOSwidWFjdCI6IkJFRXhBa2xJaWtHUXNpSDhPYk0yZmpkODNHVjRXTiIsIm5iZiI6MTQ3NTQ5ODIzOSwiYXVkIjoiMHIxLWJHenpQa2lQa19LdmwtczZHVjFpM3BqTUFuT2UifQ.akPXNrCSOGq1_kppBasoIunZkCfktiLLEyJLcV-c3k1mKLFfkPon8R7kQhqap67enrPJY_1xwRdY3Q-9pO_7NUWXZhiGtRIUNrSWj8PQrwR_PtNhWCx2TfM79ySbYtL-ygpyrqRBEVIGZQNr_-gXQtn2jouOKGojJbBpS5VZ0VDMN_D9V9BFHUF0K_75Vifrdz7CS-8FOninipdM2BaLaJLPXj9SqD-5pa9bK-z17kF5mO9ryptWzqD9LOJ-E4i3PdA0oGjX4Q1FNvwuRZC8moEMWrt45sH0IFYhZxBKJNezRcoIaBoFNLQeOacmZ30rcGIqcXlS2-kLO18-c2Twtw",
                          "startLatitude": "37.733259",
                          "startLongitude": "-122.429254",
                          "sandbox": "1"
                        }
                }';
        $post_data = json_decode($var, true);
        
        $response = $this->runApp('POST', '/api/Uber/getProductsTimeEstimates', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
    }
    
    public function testGetUserAddress() {
        
        $var = '{
                        "args": {
                          "accessToken": "eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJzY29wZXMiOlsiYWxsX3RyaXBzIiwicGxhY2VzIiwiaGlzdG9yeSJdLCJzdWIiOiJjNzE2ZDdjYi0xYTVkLTRjYmEtOTQwOS00MzE0MWI2MGFjODgiLCJpc3MiOiJ1YmVyLXVzMSIsImp0aSI6ImJkZDUzMzFlLWNlZDgtNGM0ZS04NDNmLWZjYmMzZWQ2YjEyNyIsImV4cCI6MTQ3ODA5MjM2NSwiaWF0IjoxNDc1NTAwMzY0LCJ1YWN0IjoiV2ZCaUJGOVVGUncwc21XRGtzcUp0ek5zSWVtemRNIiwibmJmIjoxNDc1NTAwMjc0LCJhdWQiOiIwcjEtYkd6elBraVBrX0t2bC1zNkdWMWkzcGpNQW5PZSJ9.XZZbv1pKeotE2_M5AsRQWu1chLHi4PHMZ_e0EVZH23e8sPX3TBgMjT6Uk7AQIiO7R4ehdSUSCJ21TL5A_ebS42HDl8-A-7RLvIWjLcQJ-dJcXjHSUjcuoGwomsS01PnSro9-p_SyJG6Zkw-GHcy1ySQiJIY9Q6JaEXXooURjNTGVGe3OlWZugxGjE8j8yPY1uMh-4_HC5tM3MOyoJ7xXdvr2PaRdL0vfOzBnLE4XwYKpB3dZMmMwMARdq3l2nlLkBnckVwti2FW2XCD8GzpMQf6IqGoGoJwfoKJAlUfdg1tQnJlh5kxF9nElv6GkQIjiaJ9vYn6PUNepRCabOYTeLw",
                          "placeName": "work",
                          "sandbox": "1"
                        }
                }';
        $post_data = json_decode($var, true);
        
        $response = $this->runApp('POST', '/api/Uber/getUserAddress', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
    }
    
    public function testUpdateUserAddress() {
        
        $var = '{
                        "args": {
                          "accessToken": "eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJzY29wZXMiOlsiYWxsX3RyaXBzIiwicGxhY2VzIiwiaGlzdG9yeSJdLCJzdWIiOiJjNzE2ZDdjYi0xYTVkLTRjYmEtOTQwOS00MzE0MWI2MGFjODgiLCJpc3MiOiJ1YmVyLXVzMSIsImp0aSI6ImJkZDUzMzFlLWNlZDgtNGM0ZS04NDNmLWZjYmMzZWQ2YjEyNyIsImV4cCI6MTQ3ODA5MjM2NSwiaWF0IjoxNDc1NTAwMzY0LCJ1YWN0IjoiV2ZCaUJGOVVGUncwc21XRGtzcUp0ek5zSWVtemRNIiwibmJmIjoxNDc1NTAwMjc0LCJhdWQiOiIwcjEtYkd6elBraVBrX0t2bC1zNkdWMWkzcGpNQW5PZSJ9.XZZbv1pKeotE2_M5AsRQWu1chLHi4PHMZ_e0EVZH23e8sPX3TBgMjT6Uk7AQIiO7R4ehdSUSCJ21TL5A_ebS42HDl8-A-7RLvIWjLcQJ-dJcXjHSUjcuoGwomsS01PnSro9-p_SyJG6Zkw-GHcy1ySQiJIY9Q6JaEXXooURjNTGVGe3OlWZugxGjE8j8yPY1uMh-4_HC5tM3MOyoJ7xXdvr2PaRdL0vfOzBnLE4XwYKpB3dZMmMwMARdq3l2nlLkBnckVwti2FW2XCD8GzpMQf6IqGoGoJwfoKJAlUfdg1tQnJlh5kxF9nElv6GkQIjiaJ9vYn6PUNepRCabOYTeLw",
                          "placeName": "work",
                          "address": "Kyiv, Khreschatik st, 1",
                          "sandbox": "1"
                        }
                }';
        $post_data = json_decode($var, true);
        
        $response = $this->runApp('POST', '/api/Uber/updateUserAddress', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
    }
    
    public function testGetUserPaymentMethods() {
        
        $var = '{
                        "args": {
                          "accessToken": "eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJzY29wZXMiOlsicmVxdWVzdCIsImFsbF90cmlwcyIsImhpc3RvcnkiXSwic3ViIjoiYzcxNmQ3Y2ItMWE1ZC00Y2JhLTk0MDktNDMxNDFiNjBhYzg4IiwiaXNzIjoidWJlci11czEiLCJqdGkiOiJhZGY3YzYwZS00ZTlhLTRhN2QtYWM3NC03OWE4NzkwNmJmYjkiLCJleHAiOjE0NzgwOTMwOTYsImlhdCI6MTQ3NTUwMTA5NiwidWFjdCI6IlFONHE3QjlyWG95QnBJOUhpM0RmeTFpcDNiVFFzTCIsIm5iZiI6MTQ3NTUwMTAwNiwiYXVkIjoiMHIxLWJHenpQa2lQa19LdmwtczZHVjFpM3BqTUFuT2UifQ.fnA4tyv_GCAb40Xzv7O_x9BV16FHnesUjxuf_ONKs_TONhKFu5ybCe4ep6nRTQNBNjaPOmyJ7yp1EWMNeRHVf4uHlFg4CBsMYd1hLgIhJk4TghEiIn0_vWYIsw3yPZobDghCf-KKlOQrTOEWZPCaAp2e24RELOhASzWSPPs3fEdNPlqtYFd268nIZ1vMIXAnmU6-4H5BHYEKfeLdcu6QOUBNvntUb78ltykJGK4mBnuzvAMdEchJedxIE9-gJI9Y5PLnYXPwB5KV83H7-6ydSrlP6sq9vMDGSLVNdfL8_41mbQ0LtqEAnYUJ4mHKko24QT-FaKrdJezlWdlGizVx-Q",
                          "sandbox": "1"
                        }
                }';
        $post_data = json_decode($var, true);
        
        $response = $this->runApp('POST', '/api/Uber/getUserPaymentMethods', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
    }
    
    public function testCreateReminder() {
        
        $var = '{
                        "args": {
                          "accessToken": "6s3mJZacwayfSNS9FcnHv_ibiDUM5j8zrCi1s19E",
                          "reminderTime": "1475677105",
                          "phoneNumber": "+380931234567",
                          "eventTime": "1475677105",
                          "sandbox": "1"
                        }
                }';
        $post_data = json_decode($var, true);
        
        $response = $this->runApp('POST', '/api/Uber/createReminder', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
    }
    
    public function testGetReminder() {
        
        $var = '{
                        "args": {
                          "accessToken": "6s3mJZacwayfSNS9FcnHv_ibiDUM5j8zrCi1s19E",
                          "reminderId": "99950679-cfb4-4ca8-8270-5acc8822c231",
                          "phoneNumber": "+380931234567",
                          "eventTime": "1475677105",
                          "sandbox": "1"
                        }
                }';
        $post_data = json_decode($var, true);
        
        $response = $this->runApp('POST', '/api/Uber/getReminder', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
    }
    
    public function testUpdateReminder() {
        
        $var = '{
                        "args": {
                          "accessToken": "6s3mJZacwayfSNS9FcnHv_ibiDUM5j8zrCi1s19E",
                          "reminderId": "99950679-cfb4-4ca8-8270-5acc8822c231",
                          "phoneNumber": "+380931234567",
                          "eventTime": "1475677105",
                          "sandbox": "1"
                        }
                }';
        $post_data = json_decode($var, true);
        
        $response = $this->runApp('POST', '/api/Uber/updateReminder', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
    }
    
    public function testDeleteReminder() {
        
        $var = '{
                        "args": {
                          "accessToken": "6s3mJZacwayfSNS9FcnHv_ibiDUM5j8zrCi1s19E",
                          "reminderId": "99950679-cfb4-4ca8-8270-5acc8822c231",
                          "sandbox": "1"
                        }
                }';
        $post_data = json_decode($var, true);
        
        $response = $this->runApp('POST', '/api/Uber/deleteReminder', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('error', json_decode($response->getBody())->callback);
        $this->assertContains('No reminder found', json_decode($response->getBody())->contextWrites->to);
        
    }
    
    public function testRequestRide() {
        
        $var = '{
                        "args": {
                          "accessToken": "eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJzY29wZXMiOlsicmVxdWVzdCIsImFsbF90cmlwcyIsImhpc3RvcnkiXSwic3ViIjoiYzcxNmQ3Y2ItMWE1ZC00Y2JhLTk0MDktNDMxNDFiNjBhYzg4IiwiaXNzIjoidWJlci11czEiLCJqdGkiOiI0Yzg1YTgzNy1mMTc5LTQ1OTEtYTNkOC1iZmIxYTgwODk5MTAiLCJleHAiOjE0NzgwOTkxOTIsImlhdCI6MTQ3NTUwNzE5MiwidWFjdCI6ImN2YUZQcW1nTFB0QmFvRlBUTEJWaXp2UzFXajBVZSIsIm5iZiI6MTQ3NTUwNzEwMiwiYXVkIjoiMHIxLWJHenpQa2lQa19LdmwtczZHVjFpM3BqTUFuT2UifQ.GHKkFy5BuQRbg3uqJXgPBy0PbiLq9_p2O0HpqpPX80SA8anzioHxM6bNfy-OG7d4gmZiD7fR2ACW2_8HwioMCwFYQxbdIK5QEJ86WTfWCfAK4ocxlPljccNPM0fcoWRZiXs1pHyzSfTehKXapGloBck5Q4oLd241sIOqyBRR4AQIx7A4MXwHmuHExFzHstPq61mGBS9ApTprdGYrrqB4ke0C8EVna1Ox86oYaBEfD_kz8Vty9WfepgmwDxOWAaRydjeTKUb2ANMckBYMU2jRowfUq4ZwEUwD9ERMVeJXguHyjbq2_4sC1G0kxISkYy1Bg6H1iqmVxxnFQKR4M6KmPw",
                          "startLatitude": "37.733259",
                          "startLongitude": "-122.429254",
                          "endLatitude": "37.726394",
                          "endLongitude": "-122.476348",
                          "sandbox": "1"
                        }
                }';
        $post_data = json_decode($var, true);
        
        $response = $this->runApp('POST', '/api/Uber/requestRide', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('error', json_decode($response->getBody())->callback);
        $this->assertContains('validation_failed', json_decode($response->getBody())->contextWrites->to);
        
    }
    
    public function testUpdateCurrentRide() {
        
        $var = '{
                        "args": {
                          "accessToken": "eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJzY29wZXMiOlsicmVxdWVzdCIsImFsbF90cmlwcyIsImhpc3RvcnkiXSwic3ViIjoiYzcxNmQ3Y2ItMWE1ZC00Y2JhLTk0MDktNDMxNDFiNjBhYzg4IiwiaXNzIjoidWJlci11czEiLCJqdGkiOiI0Yzg1YTgzNy1mMTc5LTQ1OTEtYTNkOC1iZmIxYTgwODk5MTAiLCJleHAiOjE0NzgwOTkxOTIsImlhdCI6MTQ3NTUwNzE5MiwidWFjdCI6ImN2YUZQcW1nTFB0QmFvRlBUTEJWaXp2UzFXajBVZSIsIm5iZiI6MTQ3NTUwNzEwMiwiYXVkIjoiMHIxLWJHenpQa2lQa19LdmwtczZHVjFpM3BqTUFuT2UifQ.GHKkFy5BuQRbg3uqJXgPBy0PbiLq9_p2O0HpqpPX80SA8anzioHxM6bNfy-OG7d4gmZiD7fR2ACW2_8HwioMCwFYQxbdIK5QEJ86WTfWCfAK4ocxlPljccNPM0fcoWRZiXs1pHyzSfTehKXapGloBck5Q4oLd241sIOqyBRR4AQIx7A4MXwHmuHExFzHstPq61mGBS9ApTprdGYrrqB4ke0C8EVna1Ox86oYaBEfD_kz8Vty9WfepgmwDxOWAaRydjeTKUb2ANMckBYMU2jRowfUq4ZwEUwD9ERMVeJXguHyjbq2_4sC1G0kxISkYy1Bg6H1iqmVxxnFQKR4M6KmPw",
                          "sandbox": "1"
                        }
                }';
        $post_data = json_decode($var, true);
        
        $response = $this->runApp('POST', '/api/Uber/updateCurrentRide', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('error', json_decode($response->getBody())->callback);
        $this->assertContains('validation_failed', json_decode($response->getBody())->contextWrites->to);
        
    }
    
    public function testCancelCurrentRide() {
        
        $var = '{
                        "args": {
                          "accessToken": "eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJzY29wZXMiOlsicmVxdWVzdCIsImFsbF90cmlwcyIsImhpc3RvcnkiXSwic3ViIjoiYzcxNmQ3Y2ItMWE1ZC00Y2JhLTk0MDktNDMxNDFiNjBhYzg4IiwiaXNzIjoidWJlci11czEiLCJqdGkiOiI0Yzg1YTgzNy1mMTc5LTQ1OTEtYTNkOC1iZmIxYTgwODk5MTAiLCJleHAiOjE0NzgwOTkxOTIsImlhdCI6MTQ3NTUwNzE5MiwidWFjdCI6ImN2YUZQcW1nTFB0QmFvRlBUTEJWaXp2UzFXajBVZSIsIm5iZiI6MTQ3NTUwNzEwMiwiYXVkIjoiMHIxLWJHenpQa2lQa19LdmwtczZHVjFpM3BqTUFuT2UifQ.GHKkFy5BuQRbg3uqJXgPBy0PbiLq9_p2O0HpqpPX80SA8anzioHxM6bNfy-OG7d4gmZiD7fR2ACW2_8HwioMCwFYQxbdIK5QEJ86WTfWCfAK4ocxlPljccNPM0fcoWRZiXs1pHyzSfTehKXapGloBck5Q4oLd241sIOqyBRR4AQIx7A4MXwHmuHExFzHstPq61mGBS9ApTprdGYrrqB4ke0C8EVna1Ox86oYaBEfD_kz8Vty9WfepgmwDxOWAaRydjeTKUb2ANMckBYMU2jRowfUq4ZwEUwD9ERMVeJXguHyjbq2_4sC1G0kxISkYy1Bg6H1iqmVxxnFQKR4M6KmPw",
                          "sandbox": "1"
                        }
                }';
        $post_data = json_decode($var, true);
        
        $response = $this->runApp('POST', '/api/Uber/cancelCurrentRide', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        $this->assertEquals('null', json_decode($response->getBody())->contextWrites->to);
        
    }
    
    public function testGetRideEstimate() {
        
        $var = '{
                        "args": {
                          "accessToken": "eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJzY29wZXMiOlsicmVxdWVzdCIsImFsbF90cmlwcyIsImhpc3RvcnkiXSwic3ViIjoiYzcxNmQ3Y2ItMWE1ZC00Y2JhLTk0MDktNDMxNDFiNjBhYzg4IiwiaXNzIjoidWJlci11czEiLCJqdGkiOiI0Yzg1YTgzNy1mMTc5LTQ1OTEtYTNkOC1iZmIxYTgwODk5MTAiLCJleHAiOjE0NzgwOTkxOTIsImlhdCI6MTQ3NTUwNzE5MiwidWFjdCI6ImN2YUZQcW1nTFB0QmFvRlBUTEJWaXp2UzFXajBVZSIsIm5iZiI6MTQ3NTUwNzEwMiwiYXVkIjoiMHIxLWJHenpQa2lQa19LdmwtczZHVjFpM3BqTUFuT2UifQ.GHKkFy5BuQRbg3uqJXgPBy0PbiLq9_p2O0HpqpPX80SA8anzioHxM6bNfy-OG7d4gmZiD7fR2ACW2_8HwioMCwFYQxbdIK5QEJ86WTfWCfAK4ocxlPljccNPM0fcoWRZiXs1pHyzSfTehKXapGloBck5Q4oLd241sIOqyBRR4AQIx7A4MXwHmuHExFzHstPq61mGBS9ApTprdGYrrqB4ke0C8EVna1Ox86oYaBEfD_kz8Vty9WfepgmwDxOWAaRydjeTKUb2ANMckBYMU2jRowfUq4ZwEUwD9ERMVeJXguHyjbq2_4sC1G0kxISkYy1Bg6H1iqmVxxnFQKR4M6KmPw",
                          "sandbox": "1"
                        }
                }';
        $post_data = json_decode($var, true);
        
        $response = $this->runApp('POST', '/api/Uber/getRideEstimate', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('error', json_decode($response->getBody())->callback);
        $this->assertContains('validation_failed', json_decode($response->getBody())->contextWrites->to);
        
    }
    
    public function testUpdateRide() {
        
        $var = '{
                        "args": {
                          "accessToken": "eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJzY29wZXMiOlsicmVxdWVzdCIsImFsbF90cmlwcyIsImhpc3RvcnkiXSwic3ViIjoiYzcxNmQ3Y2ItMWE1ZC00Y2JhLTk0MDktNDMxNDFiNjBhYzg4IiwiaXNzIjoidWJlci11czEiLCJqdGkiOiI0Yzg1YTgzNy1mMTc5LTQ1OTEtYTNkOC1iZmIxYTgwODk5MTAiLCJleHAiOjE0NzgwOTkxOTIsImlhdCI6MTQ3NTUwNzE5MiwidWFjdCI6ImN2YUZQcW1nTFB0QmFvRlBUTEJWaXp2UzFXajBVZSIsIm5iZiI6MTQ3NTUwNzEwMiwiYXVkIjoiMHIxLWJHenpQa2lQa19LdmwtczZHVjFpM3BqTUFuT2UifQ.GHKkFy5BuQRbg3uqJXgPBy0PbiLq9_p2O0HpqpPX80SA8anzioHxM6bNfy-OG7d4gmZiD7fR2ACW2_8HwioMCwFYQxbdIK5QEJ86WTfWCfAK4ocxlPljccNPM0fcoWRZiXs1pHyzSfTehKXapGloBck5Q4oLd241sIOqyBRR4AQIx7A4MXwHmuHExFzHstPq61mGBS9ApTprdGYrrqB4ke0C8EVna1Ox86oYaBEfD_kz8Vty9WfepgmwDxOWAaRydjeTKUb2ANMckBYMU2jRowfUq4ZwEUwD9ERMVeJXguHyjbq2_4sC1G0kxISkYy1Bg6H1iqmVxxnFQKR4M6KmPw",
                          "requestId": "1",
                          "sandbox": "1"
                        }
                }';
        $post_data = json_decode($var, true);
        
        $response = $this->runApp('POST', '/api/Uber/updateRide', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('error', json_decode($response->getBody())->callback);
        $this->assertContains('validation_failed', json_decode($response->getBody())->contextWrites->to);
        
    }
    
    public function testCancelRide() {
        
        $var = '{
                        "args": {
                          "accessToken": "eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJzY29wZXMiOlsicmVxdWVzdCIsImFsbF90cmlwcyIsImhpc3RvcnkiXSwic3ViIjoiYzcxNmQ3Y2ItMWE1ZC00Y2JhLTk0MDktNDMxNDFiNjBhYzg4IiwiaXNzIjoidWJlci11czEiLCJqdGkiOiI0Yzg1YTgzNy1mMTc5LTQ1OTEtYTNkOC1iZmIxYTgwODk5MTAiLCJleHAiOjE0NzgwOTkxOTIsImlhdCI6MTQ3NTUwNzE5MiwidWFjdCI6ImN2YUZQcW1nTFB0QmFvRlBUTEJWaXp2UzFXajBVZSIsIm5iZiI6MTQ3NTUwNzEwMiwiYXVkIjoiMHIxLWJHenpQa2lQa19LdmwtczZHVjFpM3BqTUFuT2UifQ.GHKkFy5BuQRbg3uqJXgPBy0PbiLq9_p2O0HpqpPX80SA8anzioHxM6bNfy-OG7d4gmZiD7fR2ACW2_8HwioMCwFYQxbdIK5QEJ86WTfWCfAK4ocxlPljccNPM0fcoWRZiXs1pHyzSfTehKXapGloBck5Q4oLd241sIOqyBRR4AQIx7A4MXwHmuHExFzHstPq61mGBS9ApTprdGYrrqB4ke0C8EVna1Ox86oYaBEfD_kz8Vty9WfepgmwDxOWAaRydjeTKUb2ANMckBYMU2jRowfUq4ZwEUwD9ERMVeJXguHyjbq2_4sC1G0kxISkYy1Bg6H1iqmVxxnFQKR4M6KmPw",
                          "requestId": "1",
                          "sandbox": "1"
                        }
                }';
        $post_data = json_decode($var, true);
        
        $response = $this->runApp('POST', '/api/Uber/cancelRide', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        $this->assertEquals('null', json_decode($response->getBody())->contextWrites->to);
        
    }
    
    public function testGetRideMap() {
        
        $var = '{
                        "args": {
                          "accessToken": "eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJzY29wZXMiOlsicmVxdWVzdCIsImFsbF90cmlwcyIsImhpc3RvcnkiXSwic3ViIjoiYzcxNmQ3Y2ItMWE1ZC00Y2JhLTk0MDktNDMxNDFiNjBhYzg4IiwiaXNzIjoidWJlci11czEiLCJqdGkiOiI0Yzg1YTgzNy1mMTc5LTQ1OTEtYTNkOC1iZmIxYTgwODk5MTAiLCJleHAiOjE0NzgwOTkxOTIsImlhdCI6MTQ3NTUwNzE5MiwidWFjdCI6ImN2YUZQcW1nTFB0QmFvRlBUTEJWaXp2UzFXajBVZSIsIm5iZiI6MTQ3NTUwNzEwMiwiYXVkIjoiMHIxLWJHenpQa2lQa19LdmwtczZHVjFpM3BqTUFuT2UifQ.GHKkFy5BuQRbg3uqJXgPBy0PbiLq9_p2O0HpqpPX80SA8anzioHxM6bNfy-OG7d4gmZiD7fR2ACW2_8HwioMCwFYQxbdIK5QEJ86WTfWCfAK4ocxlPljccNPM0fcoWRZiXs1pHyzSfTehKXapGloBck5Q4oLd241sIOqyBRR4AQIx7A4MXwHmuHExFzHstPq61mGBS9ApTprdGYrrqB4ke0C8EVna1Ox86oYaBEfD_kz8Vty9WfepgmwDxOWAaRydjeTKUb2ANMckBYMU2jRowfUq4ZwEUwD9ERMVeJXguHyjbq2_4sC1G0kxISkYy1Bg6H1iqmVxxnFQKR4M6KmPw",
                          "requestId": "1",
                          "sandbox": "1"
                        }
                }';
        $post_data = json_decode($var, true);
        
        $response = $this->runApp('POST', '/api/Uber/getRideMap', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('error', json_decode($response->getBody())->callback);
        $this->assertContains('conflict', json_decode($response->getBody())->contextWrites->to);
        
    }
    
    public function testGetReceipt() {
        
        $var = '{
                        "args": {
                          "accessToken": "eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJzY29wZXMiOlsicmVxdWVzdF9yZWNlaXB0IiwiYWxsX3RyaXBzIiwiaGlzdG9yeSJdLCJzdWIiOiJjNzE2ZDdjYi0xYTVkLTRjYmEtOTQwOS00MzE0MWI2MGFjODgiLCJpc3MiOiJ1YmVyLXVzMSIsImp0aSI6IjY4ZWY5MWFiLWQ4MWUtNGRmNC04ZTU1LWQ3YTgxODE5YmYxMyIsImV4cCI6MTQ3ODE2MjEzNSwiaWF0IjoxNDc1NTcwMTM1LCJ1YWN0IjoiRHNqem9jNWczSnlUb3AyMFZRNEJod2NZN21IVnpaIiwibmJmIjoxNDc1NTcwMDQ1LCJhdWQiOiIwcjEtYkd6elBraVBrX0t2bC1zNkdWMWkzcGpNQW5PZSJ9.ewjHjrjoKY_zfdwKSU9V8lH5TmAApmZ0quFYqrlKmCb2_TLV1P4mcvrgHM1aPg4tNctPGybQSYeTRAiUrS-uLDiHKK4dQJCceWN2otPNCvBvLvuSjaPwNbz--dab9VZuOCaub-n3Hoa-4h4C_t8a2axA6MfXAZvwOAZu-jjyUiLIb3X_tl0juyE_o6J0GGt1bPge77y54wrEd9c8X0Og923gMwCsPZ4sblsqh514J4C_F51LKJWeBZqA9XlOCjaRmEe6Bp4xfWYjYeNe71dOUkDqEvxcn4fxodGnvhtmzMZuFIEKt1oPxqBqW8PHdgxZo3yTgYRPRyoWqvwAzpx3Yg",
                          "requestId": "1",
                          "sandbox": "1"
                        }
                }';
        $post_data = json_decode($var, true);
        
        $response = $this->runApp('POST', '/api/Uber/getReceipt', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('error', json_decode($response->getBody())->callback);
        $this->assertContains('Invalid request_id', json_decode($response->getBody())->contextWrites->to);
        
    }

}