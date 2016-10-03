# UberAPI Package
The mission of the Uber API is to make it easy for developers to unlock the power of our logistical network that runs across cities.
* Domain: uber.com
* Credentials: accessToken

## How to get credentials: 
0. Item one 
1. Item two

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
Method description

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
			"to":"..."
		}
	}
}
```

<a name="getDelivery"/>
## UberAPI.getDelivery
Method description

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
			"to":"..."
		}
	}
}
```

<a name="cancelDelivery"/>
## UberAPI.cancelDelivery
Method description

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
			"to":"..."
		}
	}
}
```

<a name="getDeliveries"/>
## UberAPI.getDeliveries
Method description

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
			"to":"..."
		}
	}
}
```

<a name="getQuote"/>
## UberAPI.getQuote
Method description

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
			"to":"..."
		}
	}
}
```

<a name="getUser"/>
## UberAPI.getUser
Method description

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
			"to":"..."
		}
	}
}
```

<a name="getUserActivity"/>
## UberAPI.getUserActivity
Method description

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
			"to":"..."
		}
	}
}
```

<a name="getProductDetails"/>
## UberAPI.getProductDetails
Method description

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
			"to":"..."
		}
	}
}
```

<a name="getCurrentRide"/>
## UberAPI.getCurrentRide
Method description

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
			"to":"..."
		}
	}
}
```

<a name="getRide"/>
## UberAPI.getRide
Method description

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
			"to":"..."
		}
	}
}
```

<a name="getProductsByLocation"/>
## UberAPI.getProductsByLocation
Method description

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
			"to":"..."
		}
	}
}
```

<a name="getProductsPrices"/>
## UberAPI.getProductsPrices
Method description

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
			"to":"..."
		}
	}
}
```

<a name="getProductsTimeEstimates"/>
## UberAPI.getProductsTimeEstimates
Method description

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
			"to":"..."
		}
	}
}
```

<a name="getUserAddress"/>
## UberAPI.getUserAddress
Method description

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
			"to":"..."
		}
	}
}
```

<a name="updateUserAddress"/>
## UberAPI.updateUserAddress
Method description

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
			"to":"..."
		}
	}
}
```

<a name="getUserPaymentMethods"/>
## UberAPI.getUserPaymentMethods
Method description

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
			"to":"..."
		}
	}
}
```

<a name="createReminder"/>
## UberAPI.createReminder
Method description

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
			"to":"..."
		}
	}
}
```

<a name="getReminder"/>
## UberAPI.getReminder
Method description

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
			"to":"..."
		}
	}
}
```

<a name="updateReminder"/>
## UberAPI.updateReminder
Method description

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
			"to":"..."
		}
	}
}
```

<a name="requestRide"/>
## UberAPI.requestRide
Method description

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
			"to":"..."
		}
	}
}
```

<a name="updateCurrentRide"/>
## UberAPI.updateCurrentRide
Method description

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
			"to":"..."
		}
	}
}
```

<a name="cancelCurrentRide"/>
## UberAPI.cancelCurrentRide
Method description

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
			"to":"..."
		}
	}
}
```

<a name="getRideEstimate"/>
## UberAPI.getRideEstimate
Method description

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
			"to":"..."
		}
	}
}
```

<a name="updateRide"/>
## UberAPI.updateRide
Method description

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
			"to":"..."
		}
	}
}
```

<a name="cancelRide"/>
## UberAPI.cancelRide
Method description

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
			"to":"..."
		}
	}
}
```

<a name="getRideMap"/>
## UberAPI.getRideMap
Method description

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
			"to":"..."
		}
	}
}
```

<a name="getReceipt"/>
## UberAPI.getReceipt
Method description

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
			"to":"..."
		}
	}
}
```

