# UberAPI Package
The mission of the Uber API is to make it easy for developers to unlock the power of our logistical network that runs across cities.
* Domain: uber.com
* Credentials: accessToken

## How to get credentials: 
0. Go to the [Uber developers area](https://developer.uber.com/) 
1. Sign in or Log in
2. Register an UberRush app.
3. Create UberRush accessToken [HowTo documentation](https://developer.uber.com/docs/rush/authentication)
4. Create an Rides app to retrive server_token

## TOC: 
* [requestDelivery](#requestDelivery)
* [getDelivery](#getDelivery)
* [cancelDelivery](#cancelDelivery)
* [getDeliveries](#getDeliveries)
* [getQuote](#getQuote)
* [getUser](#getUser)
* [getUserActivity](#getUserActivity)
* [getProductDetails](#getProductDetails)
* [getCurrentRide](#getCurrentRide)
* [getRide](#getRide)
* [getProductsByLocation](#getProductsByLocation)
* [getProductsPrices](#getProductsPrices)
* [getProductsTimeEstimates](#getProductsTimeEstimates)
* [getUserAddress](#getUserAddress)
* [updateUserAddress](#updateUserAddress)
* [getUserPaymentMethods](#getUserPaymentMethods)
* [createReminder](#createReminder)
* [getReminder](#getReminder)
* [updateReminder](#updateReminder)
* [deleteReminder](#deleteReminder)
* [requestRide](#requestRide)
* [updateCurrentRide](#updateCurrentRide)
* [cancelCurrentRide](#cancelCurrentRide)
* [getRideEstimate](#getRideEstimate)
* [updateRide](#updateRide)
* [cancelRide](#cancelRide)
* [getRideMap](#getRideMap)
* [getReceipt](#getReceipt)
 
<a name="requestDelivery"/>
## UberAPI.requestDelivery
The Delivery endpoint allows a delivery to be requested given the delivery information and quote ID.

| Field                               | Type  | Description
|-------------------------------------|-------|----------
| accessToken                         | String| The access token obtained from Uber API.
| itemsTitle                          | String| The title of the item. Limited to 128 characters.
| itemsQuantity                       | String| The number of this item.
| itemsPrice                          | String| The price of the item.
| itemsCurrencyCode                   | String| The currency code of the item price. The currency code follows the ISO 4217 standard.
| pickupLocationAddress               | String| The top address line of the delivery pickup location.
| pickupLocationCity                  | String| The city of the delivery pickup location.
| pickupLocationState                 | String| The state of the delivery pickup location such as "CA".
| pickupLocationPostalCode            | String| The postal code of the delivery pickup location.
| pickupLocationCountry               | String| The country of the pickup location such as "US".
| pickupContactFirstName              | String| The first name of the contact. This field is optional if pickup.contact.company_name is provided. Limited to 128 characters.
| pickupContactLastName               | String| The last name of the contact. This field is optional if pickup.contact.company_name is provided. Limited to 128 characters.
| pickupContactEmail                  | String| The email of the contact.
| pickupContactPhoneNumber            | String| The phone number of the contact. Phone number should start with + followed by the country code and then the local number (e.g., +18005555555).
| dropoffLocationAddress              | String| The top address line of the delivery drop-off location.
| dropoffLocationAddress2             | String| The second address line of the delivery drop-off location such as the apartment number. Limited to 128 characters.
| dropoffLocationCity                 | String| The city of the delivery drop-off location.
| dropoffLocationState                | String| The state of the delivery drop-off location such as "CA".
| dropoffLocationPostalCode           | String| The postal code of the delivery drop-off location.
| dropoffLocationCountry              | String| The country of the delivery pickup location such as "US".
| dropoffContactFirstName             | String| The first name of the contact. Limited to 128 characters.
| dropoffContactLastName              | String| The last name of the contact. Limited to 128 characters.
| dropoffContactEmail                 | String| The email of the contact.
| dropoffContactPhoneNumber           | String| The phone number of the contact.
| dropoffContactPhoneSmsEnabled       | String| If the phone has SMS capabilities. True or false.
| quoteId                             | String| Optional: The ID of the quoted price of the delivery. This field is optional. If missing, the fee for the delivery will be determined at the time of request.
| orderReferenceId                    | String| Optional: The merchant-supplied order reference identifier. This field is optional. Limited to 256 characters.
| itemsWidth                          | String| Optional: The width of the item in inches.
| itemsHeight                         | String| Optional: The height of the item in inches.
| itemsLength                         | String| Optional: The length of the item in inches.
| itemsWeight                         | String| Optional: The weight of the item in pounds.
| itemsIsFragile                      | String| Optional: If the item is fragile. True or false. Default to false.
| pickupLocationAddress2              | String| Optional: The second address line of the delivery pickup location such as the apartment number. Limited to 128 characters.
| pickupLocationLatitude              | String| Optional: Latitude of the pickup location. If UberRUSH cannot geocode the given address, the latitude and longitude coordinates will be used if provided.
| pickupLocationLongitude             | String| Optional: Longitude of the pickup location. If UberRUSH cannot geocode the given address, the latitude and longitude coordinates will be used if provided.
| pickupContactCompanyName            | String| Optional: The company name of the contact. Limited to 128 characters.
| pickupContactPhoneSmsEnabled        | String| Optional: If the phone has SMS capabilities. True or false.
| pickupSpecialInstructions           | String| Optional: Special instructions for the pickup. Limited to 256 characters.
| dropoffLocationLatitude             | String| Optional: Latitude of the dropoff location. If UberRUSH cannot geocode the given address, the latitude and longitude coordinates will be used if provided.
| dropoffLocationLongitude            | String| Optional: Longitude of the dropoff location. If UberRUSH cannot geocode the given address, the latitude and longitude coordinates will be used if provided.
| dropoffContactSendEmailNotifications| String| Optional: If Uber should send email delivery notifications. True or false. Default to true.
| dropoffContactSendSmsNotifications  | String| Optional: If Uber should send SMS delivery notifications. True or false. Default to true.
| dropoffSpecialInstructions          | String| Optional: Special instructions for the drop-off. Limited to 256 characters.
| dropoffSignatureRequired            | String| Optional: If signature is required for drop-off. True or false. Default to false.
| includesAlcohol                     | String| Optional: Indicates if the delivery includes alcohol. True or false. This feature is only available to whitelisted businesses.

#### Request example
```json
{	"accessToken": "...",
	"itemsTitle": "...",
	"itemsQuantity": "...",
	"itemsPrice": "...",
	"itemsCurrencyCode": "...",
	"pickupLocationAddress": "...",
	"pickupLocationCity": "...",
	"pickupLocationState": "...",
	"pickupLocationPostalCode": "...",
	"pickupLocationCountry": "...",
	"pickupContactFirstName": "...",
	"pickupContactLastName": "...",
	"pickupContactEmail": "...",
	"pickupContactPhoneNumber": "...",
	"dropoffLocationAddress": "...",
	"dropoffLocationAddress2": "...",
	"dropoffLocationCity": "...",
	"dropoffLocationState": "...",
	"dropoffLocationPostalCode": "...",
	"dropoffLocationCountry": "...",
	"dropoffContactFirstName": "...",
	"dropoffContactLastName": "...",
	"dropoffContactEmail": "...",
	"dropoffContactPhoneNumber": "...",
	"dropoffContactPhoneSmsEnabled": "...",
	"quoteId": "...",
	"orderReferenceId": "...",
	"itemsWidth": "...",
	"itemsHeight": "...",
	"itemsLength": "...",
	"itemsWeight": "...",
	"itemsIsFragile": "...",
	"pickupLocationAddress2": "...",
	"pickupLocationLatitude": "...",
	"pickupLocationLongitude": "...",
	"pickupContactCompanyName": "...",
	"pickupContactPhoneSmsEnabled": "...",
	"pickupSpecialInstructions": "...",
	"dropoffLocationLatitude": "...",
	"dropoffLocationLongitude": "...",
	"dropoffContactSendEmailNotifications": "...",
	"dropoffContactSendSmsNotifications": "...",
	"dropoffSpecialInstructions": "...",
	"dropoffSignatureRequired": "...",
	"includesAlcohol": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{
    \"courier\": null,
    \"created_at\": 1441146983,
    \"currency_code\": \"USD\",
    \"delivery_id\": \"b32d5374-7cee-4bc0-b588-f3820ab9b98c\",
    \"dropoff\": {
        \"contact\": {
            \"company_name\": \"Gizmo Shop\",
            \"email\": \"contact@uber.com\",
            \"first_name\": \"Calvin\",
            \"last_name\": \"Lee\",
            \"phone\": {
                \"number\": \"+14081234567\",
                \"sms_enabled\": false
            },
            \"send_email_notifications\": true,
            \"send_sms_notifications\": true
        },
        \"eta\": 20,
        \"location\": {
            \"address\": \"530 W 113th Street\",
            \"address_2\": \"Floor 2\",
            \"city\": \"New York\",
            \"country\": \"US\",
            \"postal_code\": \"10025\",
            \"state\": \"NY\"
        },
        \"signature_required\": false,
        \"special_instructions\": null
    },
    \"fee\": 5.0,
    \"items\": [
        {
            \"height\": 5.0,
            \"is_fragile\": false,
            \"length\": 14.5,
            \"price\": 1.0,
            \"quantity\": 1,
            \"title\": \"Shoes\",
            \"weight\": 2.0,
            \"width\": 7.0
        },
        {
            \"height\": 5.0,
            \"is_fragile\": false,
            \"length\": 25.0,
            \"quantity\": 1,
            \"title\": \"Guitar\",
            \"weight\": 10.0,
            \"width\": 12.0
        }
    ],
    \"order_reference_id\": \"SDA124KA\",
    \"pickup\": {
        \"contact\": {
            \"company_name\": \"Gizmo Shop\",
            \"email\": \"contact@uber.com\",
            \"first_name\": \"Calvin\",
            \"last_name\": \"Lee\",
            \"phone\": {
                \"number\": \"+14081234567\",
                \"sms_enabled\": false
            },
            \"send_email_notifications\": true,
            \"send_sms_notifications\": true
        },
        \"eta\": 5,
        \"location\": {
            \"address\": \"636 W 28th Street\",
            \"address_2\": \"Floor 2\",
            \"city\": \"New York\",
            \"country\": \"US\",
            \"postal_code\": \"10001\",
            \"state\": \"NY\"
        },
        \"signature_required\": false,
        \"special_instructions\": \"Go to pickup counter in back of shop.\"
    },
    \"quote_id\": \"KEBjNGUxNjhlZmNmMDA4ZGJjNmJlY2EwOGJlN2M0ZjdmZjI2Y2VkZDdmMmQ2MDJlZDJjMTc4MzM2ODU2YzRkMzU4FYihsd4KFbiqsd4KFYD1sgwcFdD/0oQDFYfw48EFABwVyoCThQMVp/qvwQUAGANVU0QA\",
    \"status\": \"processing\",
    \"tracking_url\": null
}"
		}
	}
}
```

<a name="getDelivery"/>
## UberAPI.getDelivery
Get the real time status of an ongoing delivery that was created using the Delivery endpoint.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The access token key obtained from Uber API.
| deliveryId | String| Unique identifier representing a Delivery.

#### Request example
```json
{	"accessToken": "...",
	"deliveryId": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{
    \"courier\": {
        \"location\": {
            \"latitude\": 40.7619629893,
            \"longitude\": -74.0014480227,
            \"bearing\": 33
        },
        \"name\": \"Rob\",
        \"phone\": \"+18622564699\",
        \"picture_url\": \"https://d297l2q4lq2ras.cloudfront.net/nomad/2014/10/16/18/479x479_id_dba13493-27db-4d39-a322-8cb5eca67b54.jpeg\",
        \"vehicle\": {
            \"license_plate\": \"RUSHNYC\",
            \"make\": \"Acura\",
            \"model\": \"ZDX\",
            \"picture_url\": null
        }
    },
    \"created_at\": 1441147296,
    \"currency_code\": \"USD\",
    \"delivery_id\": \"8b58bc58-7352-4278-b569-b5d24d8e3f76\",
    \"dropoff\": {
        \"contact\": {
            \"company_name\": \"Gizmo Shop\",
            \"email\": \"contact@uber.com\",
            \"first_name\": \"Calvin\",
            \"last_name\": \"Lee\",
            \"phone\": {
                \"number\": \"+14081234567\",
                \"sms_enabled\": false
            },
            \"send_email_notifications\": true,
            \"send_sms_notifications\": true
        },
        \"eta\": 30,
        \"location\": {
            \"address\": \"530 W 113th Street\",
            \"address_2\": \"Floor 2\",
            \"city\": \"New York\",
            \"country\": \"US\",
            \"postal_code\": \"10025\",
            \"state\": \"NY\"
        },
        \"signature_required\": false,
        \"special_instructions\": null
    },
    \"fee\": 5.0,
    \"items\": [
        {
            \"height\": 5.0,
            \"is_fragile\": false,
            \"length\": 14.5,
            \"price\": 1.0,
            \"quantity\": 1,
            \"title\": \"Shoes\",
            \"weight\": 2.0,
            \"width\": 7.0
        },
        {
            \"height\": 5.0,
            \"is_fragile\": false,
            \"length\": 25.0,
            \"quantity\": 1,
            \"title\": \"Guitar\",
            \"weight\": 10.0,
            \"width\": 12.0
        }
    ],
    \"order_reference_id\": \"SDA124KA\",
    \"pickup\": {
        \"contact\": {
            \"company_name\": \"Gizmo Shop\",
            \"email\": \"contact@uber.com\",
            \"first_name\": \"Calvin\",
            \"last_name\": \"Lee\",
            \"phone\": {
                \"number\": \"+14081234567\",
                \"sms_enabled\": false
            },
            \"send_email_notifications\": true,
            \"send_sms_notifications\": true
        },
        \"eta\": 4,
        \"location\": {
            \"address\": \"636 W 28th Street\",
            \"address_2\": \"Floor 2\",
            \"city\": \"New York\",
            \"country\": \"US\",
            \"postal_code\": \"10001\",
            \"state\": \"NY\"
        },
        \"signature_required\": false,
        \"special_instructions\": \"Go to pickup counter in back of shop.\"
    },
    \"quote_id\": \"KEBiNmI4MWQ0NDIzNjUyNjE1ZmM5YzlkNDQ5NDA4MzhlNTg5MWZlNzQ5YTNmZTRkYzQxZTgxMzc4YjlkZjU0Yjc2Fbamsd4KFeavsd4KFYD1sgwcFdD/0oQDFYfw48EFABwVyoCThQMVp/qvwQUAGANVU0QA\",
    \"status\": \"en_route_to_pickup\",
    \"tracking_url\": \"https://trip.uber.com/v2/share/-JazZXXuBl\"
}"
		}
	}
}
```

<a name="cancelDelivery"/>
## UberAPI.cancelDelivery
Cancels an existing delivery.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The access token key obtained from Uber API.
| deliveryId | String| Unique identifier representing a Delivery.

#### Request example
```json
{	"accessToken": "...",
	"deliveryId": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"null"
		}
	}
}
```

<a name="getDeliveries"/>
## UberAPI.getDeliveries
Get a list of all deliveries, ordered chronologically by time of creation.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The access token key obtained from Uber API.
| offset     | String| Offset the list of returned results by this amount.
| limit      | String| Number of items to retrieve. Maximum is 50.
| status     | String| A status value to filter for. List of status strings can be found https://developer.uber.com/docs/rush/statuses. Additionally supports a value of active that will return all ongoing deliveries. A delivery is considered active if the status field value is either en_route_to_pickup, at_pickup, en_route_to_dropoff or at_dropoff.

#### Request example
```json
{	"accessToken": "...",
	"offset": "...",
	"limit": "...",
	"status": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{
   \"count\":172,
   \"next_page\":\"status=completed&limit=10&offset=10\",
   \"previous_page\":\"\",
   \"deliveries\":[
      {
        // Delivery object 1 (omitted for clarity)
      },
      {
        // Delivery object 2 (omitted for clarity)
      },
      // ... More delivery objects
   ]
}"
		}
	}
}
```

<a name="getQuote"/>
## UberAPI.getQuote
Generate a delivery quote, given a pickup and dropoff location. On-demand and scheduled delivery quotes will be returned.

| Field                    | Type  | Description
|--------------------------|-------|----------
| accessToken              | String| The access token obtained from Uber API.
| pickupLocationAddress    | String| The top address line of the delivery pickup location.
| pickupLocationCity       | String| The city of the delivery pickup location.
| pickupLocationState      | String| The state of the delivery pickup location such as "CA".
| pickupLocationPostalCode | String| The postal code of the delivery pickup location.
| pickupLocationCountry    | String| The country of the pickup location such as "US".
| dropoffLocationAddress   | String| The top address line of the delivery drop-off location.
| dropoffLocationAddress2  | String| The second address line of the delivery drop-off location such as the apartment number. Limited to 128 characters.
| dropoffLocationCity      | String| The city of the delivery drop-off location.
| dropoffLocationState     | String| The state of the delivery drop-off location such as "CA".
| dropoffLocationPostalCode| String| The postal code of the delivery drop-off location.
| dropoffLocationCountry   | String| The country of the delivery pickup location such as "US".
| pickupLocationAddress2   | String| Optional: The second address line of the delivery pickup location such as the apartment number. Limited to 128 characters.
| pickupLocationLatitude   | String| Optional: Latitude of the pickup location. If UberRUSH cannot geocode the given address, the latitude and longitude coordinates will be used if provided.
| pickupLocationLongitude  | String| Optional: Longitude of the pickup location. If UberRUSH cannot geocode the given address, the latitude and longitude coordinates will be used if provided.
| dropoffLocationLatitude  | String| Optional: Latitude of the dropoff location. If UberRUSH cannot geocode the given address, the latitude and longitude coordinates will be used if provided.
| dropoffLocationLongitude | String| Optional: Longitude of the dropoff location. If UberRUSH cannot geocode the given address, the latitude and longitude coordinates will be used if provided.

#### Request example
```json
{	"accessToken": "...",
	"pickupLocationAddress": "...",
	"pickupLocationCity": "...",
	"pickupLocationState": "...",
	"pickupLocationPostalCode": "...",
	"pickupLocationCountry": "...",
	"dropoffLocationAddress": "...",
	"dropoffLocationAddress2": "...",
	"dropoffLocationCity": "...",
	"dropoffLocationState": "...",
	"dropoffLocationPostalCode": "...",
	"dropoffLocationCountry": "...",
	"pickupLocationAddress2": "...",
	"pickupLocationLatitude": "...",
	"pickupLocationLongitude": "...",
	"dropoffLocationLatitude": "...",
	"dropoffLocationLongitude": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{
  \"quotes\": [
    {
      \"quote_id\": \"CwACAAAAQGU0NTYwYjUyNjY4YzBjNDBiNDFjYzA4ZDdlNzE0OWM3ZmYxZjY0NTJkNDQ1NjE2NDg3NDI1ZmFkZjZiYTI1ODcIAANXHm3xCAAEVx5wSQgABQBSs-AMAAYIAAEYXJdJCAAC0_FrQwAMAAcIAAEYWt-7CAAC0_BeNAALAAgAAAADVVNEAA==\",
      \"estimated_at\": 1461612017,
      \"expires_at\": 1461612617,
      \"fee\": 5.42,
      \"currency_code\": \"USD\",
      \"pickup_eta\": 6,
      \"dropoff_eta\": 13
    },
    {
      \"quote_id\": \"CwACAAAAQDNkMWZhMDg0ZWJiNzkwMTA4MGNmNzlkMTdlN2U1MGE2YzI1NTQ0Yzc4ZmIwOTIyNzUwMDc0ZDNjNGFhZjRlYjMIAANXHm3xCAAEVx5wSQgABQBCOSAMAAYIAAEYXJdJCAAC0_FrQwAMAAcIAAEYWt-7CAAC0_BeNAALAAgAAAADVVNECgAJAAABVE84wIAKAAoAAAFUT2-vAAoACwAAAVRPLXXgAA==\",
      \"estimated_at\": 1461612017,
      \"expires_at\": 1461612617,
      \"start_time\": 1461618000,
      \"end_time\": 1461621600,
      \"fee\": 4.34,
      \"currency_code\": \"USD\",
      \"ready_by_time\": 1461617260
    },
    {
      \"quote_id\": \"CwACAAAAQGViOWFkM2E5NTBkZDlmOWI1NjI4ODc0NTljMjc3OWFlZWY1YmVkODVhMzc4MGQ4N2RlNTI3NDAzNWU3NTIxYzUIAANXHm3xCAAEVx5wSQgABQBCOSAMAAYIAAEYXJdJCAAC0_FrQwAMAAcIAAEYWt-7CAAC0_BeNAALAAgAAAADVVNECgAJAAABVE9vrwAKAAoAAAFUT6adgAoACwAAAVRPZGRgAA==\",
      \"estimated_at\": 1461612017,
      \"expires_at\": 1461612617,
      \"start_time\": 1461621600,
      \"end_time\": 1461625200,
      \"fee\": 4.34,
      \"currency_code\": \"USD\",
      \"ready_by_time\": 1461620860
    },
    {
      \"quote_id\": \"CwACAAAAQDljOGJkZmVjZjg0NDgwNGJhY2UyNDAzYTU4NjA3OTc5MjA3NmIxMmJmMjNhOTM3YWQ0NGM3NGMwYzNjNTM4OTQIAANXHm3xCAAEVx5wSQgABQBCOSAMAAYIAAEYXJdJCAAC0_FrQwAMAAcIAAEYWt-7CAAC0_BeNAALAAgAAAADVVNECgAJAAABVE-mnYAKAAoAAAFUT92MAAoACwAAAVRPm1LgAA==\",
      \"estimated_at\": 1461612017,
      \"expires_at\": 1461612617,
      \"start_time\": 1461625200,
      \"end_time\": 1461628800,
      \"fee\": 4.34,
      \"currency_code\": \"USD\",
      \"ready_by_time\": 1461624460
    }
  ]
}"
		}
	}
}
```

<a name="getUser"/>
## UberAPI.getUser
The User Profile endpoint returns information about the Uber user that has authorized with the application.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The access token obtained from Uber API.

#### Request example
```json
{	"accessToken": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{
  \"first_name\": \"Uber\",
  \"last_name\": \"Developer\",
  \"email\": \"developer@uber.com\",
  \"picture\": \"https://...\",
  \"promo_code\": \"teypo\",
  \"mobile_verified\": true,
  \"uuid\": \"91d81273-45c2-4b57-8124-d0165f8240c0\"
}"
		}
	}
}
```

<a name="getUserActivity"/>
## UberAPI.getUserActivity
The User Activity endpoint returns a limited amount of data about a user’s lifetime activity with Uber. The response will include pickup and dropoff times, the city the trips took place in, the distance of past requests, and information about which products were requested.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The access token obtained from Uber API.
| offset     | String| Optional: Offset the list of returned results by this amount. Default is zero.
| limit      | String| Optional: Number of items to retrieve. Default is 5, maximum is 50.

#### Request example
```json
{	"accessToken": "...",
	"offset": "...",
	"limit": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{
  \"offset\": 0,
  \"limit\": 1,
  \"count\": 5,
  \"history\": [
    {
     \"status\":\"completed\",
     \"distance\":1.64691465,
     \"request_time\":1428876188,
     \"start_time\":1428876374,
     \"start_city\":{
        \"display_name\":\"San Francisco\",
        \"latitude\":37.7749295,
        \"longitude\":-122.4194155
     },
     \"end_time\":1428876927,
     \"request_id\":\"37d57a99-2647-4114-9dd2-c43bccf4c30b\",
     \"product_id\":\"a1111c8c-c720-46c3-8534-2fcdd730040d\"
  },
  ]
}"
		}
	}
}
```

<a name="getProductDetails"/>
## UberAPI.getProductDetails
The Products Detail endpoint returns information about a specific Uber product. The response includes the display name and other details about the product.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The access token obtained from Uber API.
| productId  | String| Unique identifier representing a specific product for a given latitude & longitude. For example, uberX in San Francisco will have a different product_id than uberX in Los Angeles.

#### Request example
```json
{	"accessToken": "...",
	"productId": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{
   \"capacity\": 4,
   \"description\": \"The original Uber\",
   \"price_details\": {
      \"distance_unit\": \"mile\",
      \"cost_per_minute\": 0.65,
      \"service_fees\": [],
      \"minimum\": 15.0,
      \"cost_per_distance\": 3.75,
      \"base\": 8.0,
      \"cancellation_fee\": 10.0,
      \"currency_code\": \"USD\"
   },
   \"image\": \"http: //d1a3f4spazzrp4.cloudfront.net/car.jpg\",
   \"display_name\": \"UberBLACK\",
   \"product_id\": \"d4abaae7-f4d6-4152-91cc-77523e8165a4\",
   \"shared\": false
}"
		}
	}
}
```

<a name="getCurrentRide"/>
## UberAPI.getCurrentRide
The Ride Request endpoint allows retrieving real-time details for an ongoing trip.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The access token obtained from Uber API.

#### Request example
```json
{	"accessToken": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{
  \"product_id\": \"17cb78a7-b672-4d34-a288-a6c6e44d5315\",
  \"request_id\": \"a1111c8c-c720-46c3-8534-2fcdd730040d\",
  \"status\": \"accepted\",
  \"eta\": 5,
  \"surge_multiplier\": 1.0,
  \"shared\": true,
  \"driver\": {
    \"phone_number\": \"(555)555-5555\",
    \"sms_number\": \"(555)555-5555\",
    \"rating\": 5,
    \"picture_url\": \"https:\/\/d1w2poirtb3as9.cloudfront.net\/img.jpeg\",
    \"name\": \"Bob\"
  },
  \"vehicle\": {
    \"make\": \"Bugatti\",
    \"model\": \"Veyron\",
    \"license_plate\": \"I<3Uber\",
    \"picture_url\": \"https:\/\/d1w2poirtb3as9.cloudfront.net\/car.jpeg\"
  },
  \"location\": {
    \"latitude\": 37.3382129093,
    \"longitude\": -121.8863287568,
    \"bearing\": 328
  },
  \"pickup\": {
    \"latitude\": 37.3303463,
    \"longitude\": -121.8890484,
    \"eta\": 5
  },
  \"destination\": {
    \"latitude\": 37.6213129,
    \"longitude\": -122.3789554,
    \"eta\": 19
  },
  \"waypoints\": [
    {
       \"rider_id\":null,
       \"latitude\":37.77508531,
       \"type\":\"pickup\",
       \"longitude\":-122.3976683872
    },
    {
       \"rider_id\":null,
       \"latitude\":37.773133,
       \"type\":\"dropoff\",
       \"longitude\":-122.415069
    },
    {
       \"rider_id\":\"8KwsIO_YG6Y2jijSMf\",
       \"latitude\":37.7752423,
       \"type\":\"dropoff\",
       \"longitude\":-122.4175658
    }
  ],
  \"riders\": [
    {
       \"rider_id\":\"8KwsIO_YG6Y2jijSMf\",
       \"first_name\":\"Alec\",
       \"me\": true
    },
    {
       \"rider_id\":null,
       \"first_name\":\"Kevin\",
       \"me\": false
    }
  ]
}"
		}
	}
}
```

<a name="getRide"/>
## UberAPI.getRide
The Ride Request endpoint allows retrieving the status of an ongoing or completed trip that was created by your app.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The access token obtained from Uber API.
| requestId  | String| Unique identifier representing a Request.

#### Request example
```json
{	"accessToken": "...",
	"requestId": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{
  \"product_id\": \"17cb78a7-b672-4d34-a288-a6c6e44d5315\",
  \"request_id\": \"a1111c8c-c720-46c3-8534-2fcdd730040d\",
  \"status\": \"accepted\",
  \"eta\": 5,
  \"surge_multiplier\": 1.0,
  \"shared\": true,
  \"driver\": {
    \"phone_number\": \"(555)555-5555\",
    \"sms_number\": \"(555)555-5555\",
    \"rating\": 5,
    \"picture_url\": \"https:\/\/d1w2poirtb3as9.cloudfront.net\/img.jpeg\",
    \"name\": \"Bob\"
  },
  \"vehicle\": {
    \"make\": \"Bugatti\",
    \"model\": \"Veyron\",
    \"license_plate\": \"I<3Uber\",
    \"picture_url\": \"https:\/\/d1w2poirtb3as9.cloudfront.net\/car.jpeg\"
  },
  \"location\": {
    \"latitude\": 37.3382129093,
    \"longitude\": -121.8863287568,
    \"bearing\": 328
  },
  \"pickup\": {
    \"latitude\": 37.3303463,
    \"longitude\": -121.8890484,
    \"eta\": 5
  },
  \"destination\": {
    \"latitude\": 37.6213129,
    \"longitude\": -122.3789554,
    \"eta\": 19
  },
  \"waypoints\": [
    {
       \"rider_id\":null,
       \"latitude\":37.77508531,
       \"type\":\"pickup\",
       \"longitude\":-122.3976683872
    },
    {
       \"rider_id\":null,
       \"latitude\":37.773133,
       \"type\":\"dropoff\",
       \"longitude\":-122.415069
    },
    {
       \"rider_id\":\"8KwsIO_YG6Y2jijSMf\",
       \"latitude\":37.7752423,
       \"type\":\"dropoff\",
       \"longitude\":-122.4175658
    }
  ],
  \"riders\": [
    {
       \"rider_id\":\"8KwsIO_YG6Y2jijSMf\",
       \"first_name\":\"Alec\",
       \"me\": true
    },
    {
       \"rider_id\":null,
       \"first_name\":\"Kevin\",
       \"me\": false
    }
  ]
}"
		}
	}
}
```

<a name="getProductsByLocation"/>
## UberAPI.getProductsByLocation
The Products endpoint returns information about the Uber products offered at a given location. The response includes the display name and other details about each product, and lists the products in the proper display order. Some products, such as uberEATS, are not returned by this endpoint.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The access token obtained from Uber API.
| latitude   | String| Latitude component of location.
| longitude  | String| Longitude component of location.

#### Request example
```json
{	"accessToken": "...",
	"latitude": "...",
	"longitude": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{
  \"products\": [
    {
       \"capacity\": 2,
       \"description\": \"Ride for less with uberPOOL\",
       \"price_details\": {},
       \"image\": \"http://d1a3f4spazzrp4.cloudfront.net/car.jpg\",
       \"display_name\": \"POOL\",
       \"product_id\": \"26546650-e557-4a7b-86e7-6a3942445247\",
       \"shared\": true,
    },
    {
       \"capacity\": 4,
       \"description\": \"The low-cost Uber\",
       \"price_details\": {
          \"distance_unit\": \"mile\",
          \"cost_per_minute\": 0.26,
          \"service_fees\": [
             {
                \"fee\": 1.0,
                \"name\": \"Safe Rides Fee\"
             }
          ],
          \"minimum\": 5.0,
          \"cost_per_distance\": 1.3,
          \"base\": 2.2,
          \"cancellation_fee\": 5.0,
          \"currency_code\": \"USD\"
       },
       \"cash_enabled\": false,
       \"image\": \"http://d1a3f4spazzrp4.cloudfront.net/car.jpg\",
       \"display_name\": \"uberX\",
       \"product_id\": \"a1111c8c-c720-46c3-8534-2fcdd730040d\",
       \"shared\": false
    },
    {
       \"capacity\": 6,
       \"description\": \"low-cost rides for large groups\",
       \"price_details\": {
          \"distance_unit\": \"mile\",
          \"cost_per_minute\": 0.45,
          \"service_fees\": [
             {
                \"fee\": 1.0,
                \"name\": \"Safe Rides Fee\"
             }
          ],
          \"minimum\": 8.0,
          \"cost_per_distance\": 2.15,
          \"base\": 5.0,
          \"cancellation_fee\": 5.0,
          \"currency_code\": \"USD\"
       },
       \"cash_enabled\": false,
       \"image\": \"http://d1a3f4spazzrp4.cloudfront.net/car.jpg\",
       \"display_name\": \"uberXL\",
       \"product_id\": \"821415d8-3bd5-4e27-9604-194e4359a449\",
       \"shared\": false
    }
  ]
}"
		}
	}
}
```

<a name="getProductsPrices"/>
## UberAPI.getProductsPrices
The Price Estimates endpoint returns an estimated price range for each product offered at a given location. The price estimate is provided as a formatted string with the full price range and the localized currency symbol.

| Field         | Type  | Description
|---------------|-------|----------
| accessToken   | String| The access token obtained from Uber API.
| startLatitude | String| Latitude component of start location.
| startLongitude| String| Longitude component of start location.
| endLatitude   | String| Latitude component of end location.
| endLongitude  | String| Longitude component of end location.
| seatCount     | String| Optional: The number of seats required for uberPOOL. Default and maximum value is 2.

#### Request example
```json
{	"accessToken": "...",
	"startLatitude": "...",
	"startLongitude": "...",
	"endLatitude": "...",
	"endLongitude": "...",
	"seatCount": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{
  \"prices\":
    {
      \"product_id\": \"26546650-e557-4a7b-86e7-6a3942445247\",
      \"currency_code\": \"USD\",
      \"display_name\": \"POOL\",
      \"estimate\": \"$7\",
      \"low_estimate\": 7,
      \"high_estimate\": 7,
      \"surge_multiplier\": 1,
      \"duration\": 640,
      \"distance\": 5.34,
    },
    {
      \"product_id\": \"08f17084-23fd-4103-aa3e-9b660223934b\",
      \"currency_code\": \"USD\",
      \"display_name\": \"UberBLACK\",
      \"estimate\": \"$23-29\",
      \"low_estimate\": 23,
      \"high_estimate\": 29,
      \"surge_multiplier\": 1,
      \"duration\": 640,
      \"distance\": 5.34
    },
    {
      \"product_id\": \"9af0174c-8939-4ef6-8e91-1a43a0e7c6f6\",
      \"currency_code\": \"USD\",
      \"display_name\": \"UberSUV\",
      \"estimate\": \"$36-44\",
      \"low_estimate\": 36,
      \"high_estimate\": 44,
      \"surge_multiplier\": 1.25,
      \"duration\": 640,
      \"distance\": 5.34
    },
    {
      \"product_id\": \"aca52cea-9701-4903-9f34-9a2395253acb\",
      \"currency_code\": null,
      \"display_name\": \"uberTAXI\",
      \"estimate\": \"Metered\",
      \"low_estimate\": null,
      \"high_estimate\": null,
      \"surge_multiplier\": 1,
      \"duration\": 640,
      \"distance\": 5.34
    },
    {
      \"product_id\": \"a27a867a-35f4-4253-8d04-61ae80a40df5\",
      \"currency_code\": \"USD\",
      \"display_name\": \"uberX\",
      \"estimate\": \"$15\",
      \"low_estimate\": 15,
      \"high_estimate\": 15,
      \"surge_multiplier\": 1,
      \"duration\": 640,
      \"distance\": 5.34
    }
  ]
}"
		}
	}
}
```

<a name="getProductsTimeEstimates"/>
## UberAPI.getProductsTimeEstimates
The Time Estimates endpoint returns ETAs for all products currently available at a given location, with the ETA for each product expressed as integers in seconds.

| Field         | Type  | Description
|---------------|-------|----------
| accessToken   | String| The access token obtained from Uber API.
| startLatitude | String| Latitude component.
| startLongitude| String| Longitude component.
| productId     | String| Optional: Unique identifier representing a specific product for a given latitude & longitude.

#### Request example
```json
{	"accessToken": "...",
	"startLatitude": "...",
	"startLongitude": "...",
	"productId": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{
   \"times\":[
      {
         \"localized_display_name\":\"uberPOOL\",
         \"estimate\":180,
         \"display_name\":\"uberPOOL\",
         \"product_id\":\"26546650-e557-4a7b-86e7-6a3942445247\"
      },
      {
         \"localized_display_name\":\"uberX\",
         \"estimate\":180,
         \"display_name\":\"uberX\",
         \"product_id\":\"a1111c8c-c720-46c3-8534-2fcdd730040d\"
      },
      {
         \"localized_display_name\":\"uberXL\",
         \"estimate\":420,
         \"display_name\":\"uberXL\",
         \"product_id\":\"821415d8-3bd5-4e27-9604-194e4359a449\"
      },
      {
         \"localized_display_name\":\"UberBLACK\",
         \"estimate\":180,
         \"display_name\":\"UberBLACK\",
         \"product_id\":\"d4abaae7-f4d6-4152-91cc-77523e8165a4\"
      }
   ]
}"
		}
	}
}
```

<a name="getUserAddress"/>
## UberAPI.getUserAddress
The Places endpoint allows retrieving the home and work addresses from an Uber user's profile.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The access token obtained from Uber API.
| placeName  | String| The name of the place to retrieve. Only home and work are acceptable.

#### Request example
```json
{	"accessToken": "...",
	"placeName": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{
   "address": "685 Market St, San Francisco, CA 94103, USA"
}"
		}
	}
}
```

<a name="updateUserAddress"/>
## UberAPI.updateUserAddress
The Places endpoint allows updating the home and work addresses from an Uber user's profile.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The access token obtained from Uber API.
| placeName  | String| The name of the place to retrieve. Only home and work are acceptable.
| address    | String| The address of the place that should be tied to the given placeName.

#### Request example
```json
{	"accessToken": "...",
	"placeName": "...",
	"address": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{
   \"address\": \"685 Market St, San Francisco, CA 94103, USA\"
}"
		}
	}
}
```

<a name="getUserPaymentMethods"/>
## UberAPI.getUserPaymentMethods
The Payment Methods endpoint allows retrieving the list of the user’s available payment methods.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The access token obtained from Uber API.

#### Request example
```json
{	"accessToken": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{
  \"payment_methods\": [
    {
      \"payment_method_id\": \"5f384f7d-8323-4207-a297-51c571234a8c\",
      \"type\": \"baidu_wallet\",
      \"description\": \"***53\",
    },
    {
      \"payment_method_id\": \"f33847de-8113-4587-c307-51c2d13a823c\",
      \"type\": \"alipay\",
      \"description\": \"ga***@uber.com\",
    },
    {
      \"payment_method_id\": \"f43847de-8113-4587-c307-51c2d13a823c\",
      \"type\": \"visa\",
      \"description\": \"***23\"
    },
    {
      \"payment_method_id\": \"f53847de-8113-4587-c307-51c2d13a823c\",
      \"type\": \"business_account\",
      \"description\": \"Late Night Ride\"
    }
  ],
  \"last_used\": \"f53847de-8113-4587-c307-51c2d13a823c\"
}"
		}
	}
}
```

<a name="createReminder"/>
## UberAPI.createReminder
The Reminders endpoint allows developers to set a reminder for a future trip.

| Field                      | Type  | Description
|----------------------------|-------|----------
| accessToken                | String| The access token obtained from Uber API. This endpoint only supports server_token.
| reminderTime               | String| Unix UTC timestamp of when the reminder will occur.
| phoneNumber                | String| Phone number of the individual to remind. Must be in the E.164 format.
| eventTime                  | String| Unix UTC timestamp of the event time.
| eventName                  | String| Optional: Formatted name of the event, which appears in the reminder notification. Alphanumeric up to 50 characters. Defaults to “Your event” if no name is provided.
| eventLocation              | String| Optional: Location of the event, which appears in the Uber app destination field. This does not need to be the entire address string since we rely on the event lat/long to set the destination pin, i.e., “Coit Tower” is sufficient instead of "Coit Tower, 1 Telegraph Hill Blvd, San Francisco, CA 94133".
| eventLatitude              | String| Optional: Latitude of the event location. Required to set destination pin.
| eventLongitude             | String| Optional: Longitude of the event location. Required to set destination pin.
| eventProductId             | String| Optional: Product ID of the Uber product to request. This overrides the product selected by the latitude / longitude pair. Required to set destination pin.
| tripBrandingLinkText       | String| Optional: Call-to-action text for the deeplink to your app. Used for trip branding and personalization.
| tripBrandingPartnerDeeplink| String| Optional: Deeplink URL to a page in your app where your users can view relevant information and perform actions that will enhance the post-trip experience. Used for trip branding and personalization.

#### Request example
```json
{	"accessToken": "...",
	"reminderTime": "...",
	"phoneNumber": "...",
	"eventTime": "...",
	"eventName": "...",
	"eventLocation": "...",
	"eventLatitude": "...",
	"eventLongitude": "...",
	"eventProductId": "...",
	"tripBrandingLinkText": "...",
	"tripBrandingPartnerDeeplink": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{
  \"event\": {
    \"name\": \"Frisbee with friends\",
    \"location\": \"Dolores Park\",
    \"latitude\": 37.759773,
    \"longitude\": -122.427063,
    \"time\": 1429294463
  },
  \"product_id\": \"a1111c8c-c720-46c3-8534-2fcdd730040d\",
  \"reminder_id\": \"def-456\",
  \"reminder_time\": 1429294463,
  \"reminder_status\": \"pending\",
  \"trip_branding\": {
    \"link_text\": \"View team roster\",
    \"partner_deeplink\": \"partner://team/9383\"
  }
}"
		}
	}
}
```

<a name="getReminder"/>
## UberAPI.getReminder
The Reminders endpoint allows you to get the status of an existing ride reminder.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The access token obtained from Uber API. This endpoint only supports server_token.
| reminderId | String| The reminder ID.

#### Request example
```json
{	"accessToken": "...",
	"reminderId": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{
  \"event\": {
    \"name\": \"Frisbee with friends\",
    \"location\": \"Dolores Park\",
    \"latitude\": 37.759773,
    \"longitude\": -122.427063,
    \"time\": 1429294463
  },
  \"product_id\": \"a1111c8c-c720-46c3-8534-2fcdd730040d\",
  \"reminder_id\": \"def-456\",
  \"reminder_time\": 1429294463,
  \"reminder_status\": \"pending\",
  \"trip_branding\": {
    \"link_text\": \"View team roster\",
    \"partner_deeplink\": \"partner://team/9383\"
  }
}"
		}
	}
}
```

<a name="updateReminder"/>
## UberAPI.updateReminder
The Reminders endpoint allows you to update an existing reminder.

| Field                      | Type  | Description
|----------------------------|-------|----------
| accessToken                | String| The access token obtained from Uber API. This endpoint only supports server_token.
| reminderId                 | String| The reminder ID.
| reminderTime               | String| Unix UTC timestamp of when the reminder will occur.
| phoneNumber                | String| Phone number of the individual to remind. Must be in the E.164 format.
| eventTime                  | String| Unix UTC timestamp of the event time.
| eventName                  | String| Optional: Formatted name of the event, which appears in the reminder notification. Alphanumeric up to 50 characters. Defaults to “Your event” if no name is provided.
| eventLocation              | String| Optional: Location of the event, which appears in the Uber app destination field. This does not need to be the entire address string since we rely on the event lat/long to set the destination pin, i.e., “Coit Tower” is sufficient instead of "Coit Tower, 1 Telegraph Hill Blvd, San Francisco, CA 94133".
| eventLatitude              | String| Optional: Latitude of the event location. Required to set destination pin.
| eventLongitude             | String| Optional: Longitude of the event location. Required to set destination pin.
| eventProductId             | String| Optional: Product ID of the Uber product to request. This overrides the product selected by the latitude / longitude pair. Required to set destination pin.
| tripBrandingLinkText       | String| Optional: Call-to-action text for the deeplink to your app. Used for trip branding and personalization.
| tripBrandingPartnerDeeplink| String| Optional: Deeplink URL to a page in your app where your users can view relevant information and perform actions that will enhance the post-trip experience. Used for trip branding and personalization.

#### Request example
```json
{	"accessToken": "...",
	"reminderId": "...",
	"reminderTime": "...",
	"phoneNumber": "...",
	"eventTime": "...",
	"eventName": "...",
	"eventLocation": "...",
	"eventLatitude": "...",
	"eventLongitude": "...",
	"eventProductId": "...",
	"tripBrandingLinkText": "...",
	"tripBrandingPartnerDeeplink": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{
  \"event\": {
    \"name\": \"Frisbee with friends\",
    \"location\": \"Dolores Park\",
    \"latitude\": 37.759773,
    \"longitude\": -122.427063,
    \"time\": 1429294463
  },
  \"product_id\": \"a1111c8c-c720-46c3-8534-2fcdd730040d\",
  \"reminder_id\": \"def-456\",
  \"reminder_time\": 1429294463,
  \"reminder_status\": \"pending\",
  \"trip_branding\": {
    \"link_text\": \"View team roster\",
    \"partner_deeplink\": \"partner://team/9383\"
  }
}"
		}
	}
}
```

<a name="deleteReminder"/>
## UberAPI.deleteReminder
The Reminders endpoint allows you to remove any reminder in the pending state from being sent.

| Field                      | Type  | Description
|----------------------------|-------|----------
| accessToken                | String| The access token obtained from Uber API. This endpoint only supports server_token.
| reminderId                 | String| The reminder ID.

#### Request example
```json
{	"accessToken": "...",
	"reminderId": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"[empty]"
		}
	}
}
```

<a name="requestRide"/>
## UberAPI.requestRide
The Ride Request endpoint allows a ride to be requested on behalf of an Uber user.

| Field              | Type  | Description
|--------------------|-------|----------
| accessToken        | String| The access token obtained from Uber API.
| startLatitude      | String| The beginning or “pickup” latitude. Either this or startPlaceId must be specified.
| startLongitude     | String| The beginning or “pickup” longitude. Either this or startPlaceId must be specified.
| endLatitude        | String| The final or destination latitude. Either this or endPlaceId may be specified. If requesting POOL, this parameter is required.
| endLongitude       | String| The final or destination longitude. Either this or endPlaceId may be specified. If requesting POOL, this parameter is required.
| startPlace_id      | String| Optional: The beginning or “pickup” place ID. This is the name of an Uber saved place. Only “home” or “work” is acceptable. Either this or startLatitude and startLongitude must be specified.
| endPlace_id        | String| Optional: The final or destination place ID. This is the name of an Uber saved place. Only “home” or “work” is acceptable. Either this or endLatitude and endLongitude may be specified.
| startNickname      | String| Optional: The beginning or “pickup” nickname label.
| endNickname        | String| Optional: The final or destination nickname label.
| startAddress       | String| Optional: The beginning or “pickup” address.
| endAddress         | String| Optional: The final or destination address.
| productId          | String| Optional: The unique ID of the product being requested. If none is provided, it will default to the cheapest product for the given location.
| surgeConfirmationId| String| Optional: The unique identifier of the surge session for a user. Required when returned from a 409 Conflict response on previous POST attempt.
| paymentMethodId    | String| Optional: The unique identifier of the payment method selected by a user. If set, the trip will be requested using this payment method. If not set, the trip will be requested using the user’s last used payment method.
| seatCount          | String| Optional: The number of seats required for uberPOOL. Default and maximum value is 2.
| fareId             | String| Optional: The key for the upfront price of an uberPOOL ride. Required if we want to use a previously retrieved price estimate for POOL. If it is missed, we will automatically issue a new upfront price for the ride request.
| expenseCode        | String| Optional: An alphanumeric identifier for expense reporting policies. This value will appear in the trip receipt and any configured expense-reporting integrations like Uber For Business or Business Profiles.
| expenseMemo        | String| Optional: A free text field to describe the purpose of the trip for expense reporting. This value will appear in the trip receipt and any configured expense-reporting integrations like Uber For Business or Business Profiles.

#### Request example
```json
{	"accessToken": "...",
	"startLatitude": "...",
	"startLongitude": "...",
	"endLatitude": "...",
	"endLongitude": "...",
	"startPlace_id": "...",
	"endPlace_id": "...",
	"startNickname": "...",
	"endNickname": "...",
	"startAddress": "...",
	"endAddress": "...",
	"productId": "...",
	"surgeConfirmationId": "...",
	"paymentMethodId": "...",
	"seatCount": "...",
	"fareId": "...",
	"expenseCode": "...",
	"expenseMemo": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{
   \"request_id\": \"852b8fdd-4369-4659-9628-e122662ad257\",
   \"product_id\": \"a1111c8c-c720-46c3-8534-2fcdd730040d\",
   \"status\": \"processing\",
   \"vehicle\": null,
   \"driver\": null,
   \"location\": null,
   \"eta\": 5,
   \"surge_multiplier\": null
}"
		}
	}
}
```

<a name="updateCurrentRide"/>
## UberAPI.updateCurrentRide
The Ride Request endpoint allows updating an ongoing request’s destination.

| Field       | Type  | Description
|-------------|-------|----------
| accessToken | String| The access token obtained from Uber API.
| endLatitude | String| Optional: The final or destination latitude. Either this or endPlaceId must be specified.
| endLongitude| String| Optional: The final or destination longitude. Either this or endPlaceId must be specified.
| endAddress  | String| Optional: The final or destination address.
| endNickname | String| Optional: The final or destination nickname label.
| endPlaceId  | String| Optional: The final or destination place ID. This is the name of an Uber saved place. Only “home” or “work” is accepted. Either this or endLatitude and endLongitude must be specified.

#### Request example
```json
{	"accessToken": "...",
	"endLatitude": "...",
	"endLongitude": "...",
	"endAddress": "...",
	"endNickname": "...",
	"endPlaceId": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"[empty]"
		}
	}
}
```

<a name="cancelCurrentRide"/>
## UberAPI.cancelCurrentRide
The Ride Request endpoint allows cancellation of the user's current trip.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The access token obtained from Uber API.

#### Request example
```json
{	"accessToken": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"null"
		}
	}
}
```

<a name="getRideEstimate"/>
## UberAPI.getRideEstimate
The Request Estimate endpoint allows a ride to be estimated given the desired product, start, and end locations.

| Field         | Type  | Description
|---------------|-------|----------
| accessToken   | String| The access token obtained from Uber API.
| productId     | String| Optional: The unique ID of the product being requested. If none is provided, it will default to the cheapest product for the given location.
| startLatitude | String| Optional: The beginning or "pickup" latitude. Either this or startPlaceId must be specified.
| startLongitude| String| Optional: The beginning or "pickup" longitude. Either this or startPlaceId must be specified.
| startPlaceId  | String| Optional: The beginning or “pickup” place ID. This is the name of an Uber saved place. Only “home” or “work” is acceptable. Either this or startLatitude and startLongitude must be specified.
| endLatitude   | String| Optional: The final or destination latitude. If not included, only the pickup ETA and details of surge pricing will be included.
| endLongitude  | String| Optional: The final or destination longitude. If not included, only the pickup ETA and details of surge pricing will be included.
| endPlaceId    | String| Optional: The final or destination place ID. This is the name of an Uber saved place. Only “home” or “work” is acceptable. Either this or endLatitude and endLongitude may be specified.
| seatCount     | String| Optional: The number of seats required for uberPOOL. Default and maximum value is 2.

#### Request example
```json
{	"accessToken": "...",
	"productId": "...",
	"startLatitude": "...",
	"startLongitude": "...",
	"startPlaceId": "...",
	"endLatitude": "...",
	"endLongitude": "...",
	"endPlaceId": "...",
	"seatCount": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{
  \"price\": {
    \"surge_confirmation_href\": \"https:\/\/api.uber.com\/v1\/surge-confirmations\/7d604f5e\",
    \"high_estimate\": 11,
    \"surge_confirmation_id\": \"7d604f5e\",
    \"minimum\": 5,
    \"low_estimate\": 8,
    \"fare_breakdown\": [
      {
        \"low_amount\": 1.25,
        \"high_amount\": 1.25,
        \"display_amount\": \"1.25\",
        \"display_name\": \"Base Fare\"
      },
      {
        \"low_amount\": 1.92,
        \"high_amount\": 2.57,
        \"display_amount\": \"1.92-2.57\",
        \"display_name\": \"Distance\"
      },
      {
        \"low_amount\": 2.50,
        \"high_amount\": 3.50,
        \"display_amount\": \"2.50-3.50\",
        \"display_name\": \"Surge x1.5\"
      },
      {
        \"low_amount\": 1.25,
        \"high_amount\": 1.25,
        \"display_amount\": \"1.25\",
        \"display_name\": \"Booking Fee\"
      },
      {
        \"low_amount\": 1.36,
        \"high_amount\": 1.81,
        \"display_amount\": \"1.36-1.81\",
        \"display_name\": \"Time\"
      }
    ],
    \"surge_multiplier\": 1.5,
    \"display\": \"$8-11\",
    \"currency_code\": \"USD\"
  },
  \"trip\": {
    \"distance_unit\": \"mile\",
    \"duration_estimate\": 480,
    \"distance_estimate\": 1.95
  },
  \"pickup_estimate\": 2
}"
		}
	}
}
```

<a name="updateRide"/>
## UberAPI.updateRide
The Ride Request endpoint allows updating an ongoing request’s destination using the Ride Request endpoint.

| Field       | Type  | Description
|-------------|-------|----------
| accessToken | String| The access token obtained from Uber API.
| requesttId  | String| Unique identifier representing a Request.
| endLatitude | String| Optional: The final or destination latitude. Either this or endPlaceId must be specified.
| endLongitude| String| Optional: The final or destination latitude. Either this or endPlaceId must be specified.
| endAddress  | String| Optional: The final or destination address.
| endNickname | String| Optional: The final or destination nickname label.
| endPlaceId  | String| Optional: The final or destination place ID. This is the name of an Uber saved place. Only “home” or “work” is accepted. Either this or endLatitude and end_Longitude must be specified.

#### Request example
```json
{	"accessToken": "...",
	"requesttId": "...",
	"endLatitude": "...",
	"endLongitude": "...",
	"endAddress": "...",
	"endNickname": "...",
	"endPlaceId": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"[empty]"
		}
	}
}
```

<a name="cancelRide"/>
## UberAPI.cancelRide
The Ride Request endpoint allows cancellation of an ongoing Request on behalf of a rider.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The access token obtained from Uber API.
| requesttId | String| Unique identifier representing a Request.

#### Request example
```json
{	"accessToken": "...",
	"requesttId": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"[empty]"
		}
	}
}
```

<a name="getRideMap"/>
## UberAPI.getRideMap
The Ride Request endpoint getting a map with a visual representation of a Request.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The access token obtained from Uber API.
| requesttId | String| Unique identifier representing a Request.

#### Request example
```json
{	"accessToken": "...",
	"requesttId": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{
  \"request_id\":\"b5512127-a134-4bf4-b1ba-fe9f48f56d9d\",
  \"href\":\"https://trip.uber.com/abc123\"
}"
		}
	}
}
```

<a name="getReceipt"/>
## UberAPI.getReceipt
The Ride Request endpoint allows getting the receipt information of the completed request.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The access token obtained from Uber API.
| requesttId | String| Unique identifier representing a Request.

#### Request example
```json
{	"accessToken": "...",
	"requesttId": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":"{
  \"request_id\": \"b5512127-a134-4bf4-b1ba-fe9f48f56d9d\",
  \"charges\": [
    {
      \"name\": \"Base Fare\",
      \"amount\": \"2.20\",
      \"type\": \"base_fare\"
    },
    {
      \"name\": \"Distance\",
      \"amount\": \"2.75\",
      \"type\": \"distance\",
    },
    {
      \"name\": \"Time\",
      \"amount\": \"3.57\",
      \"type\": \"time\",
    }
  ],
  \"surge_charge\" : {
    \"name\": \"Surge x1.5\",
    \"amount\": \"4.26\",
    \"type\": \"surge\",
  },
  \"charge_adjustments\" : [
    {
      \"name\": \"Promotion\",
      \"amount\": \"-2.43\",
      \"type\": \"promotion\",
    },
    {
      \"name\": \"Booking Fee\",
      \"amount\": \"1.00\",
      \"type\": \"booking_fee\",
    },
    {
      \"name\": \"Rounding Down\",
      \"amount\": \"0.78\",
      \"type\": \"rounding_down\",
    },
  ],
  \"normal_fare\": \"$8.52\",
  \"subtotal\": \"$12.78\",
  \"total_charged\": \"$5.92\",
  \"total_owed\": null,
  \"currency_code\": \"USD\",
  \"duration\": \"00:11:35\",
  \"distance\": \"1.49\",
  \"distance_label\": \"miles\",
}"
		}
	}
}
```

