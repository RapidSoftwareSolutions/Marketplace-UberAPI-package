# UberRide Package
Request an Uber or Uber delivery all from within your app.
* Domain: uber.com
* Credentials: clientId, clientSecret

## How to get credentials: 
0. Go to the [Uber developers area](https://developer.uber.com/) 
1. Sign in or Log in
2. Register an UberRide app.


## UberRide.getAccessToken
Generate Access Token.

| Field        | Type       | Description
|--------------|------------|----------
| clientId     | credentials| The Client ID obtained from Uber.
| clientSecret | credentials| The Client Secret obtained from Uber.
| code         | String     | The authorization code obtained from Uber API.
| redirectUri  | String     | The URI we will redirect back to after an authorization by the resource owner. The base of the URI must match the redirect_uri used during the registration of your application.

## UberRide.getUser
The User Profile endpoint returns information about the Uber user that has authorized with the application.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The valid access token.


## UberRide.getUserActivity
The User Activity endpoint returns a limited amount of data about a user’s lifetime activity with Uber. The response will include pickup and dropoff times, the city the trips took place in, the distance of past requests, and information about which products were requested.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The valid access token.
| offset     | String| Optional: Offset the list of returned results by this amount. Default is zero.
| limit      | String| Optional: Number of items to retrieve. Default is 5, maximum is 50.


## UberRide.getProductDetails
The Products Detail endpoint returns information about a specific Uber product. The response includes the display name and other details about the product.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The valid access token.
| productId  | String| Unique identifier representing a specific product for a given latitude & longitude. For example, uberX in San Francisco will have a different product_id than uberX in Los Angeles.


## UberRide.getCurrentRide
The Ride Request endpoint allows retrieving real-time details for an ongoing trip.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The valid access token.


## UberRide.getRide
The Ride Request endpoint allows retrieving the status of an ongoing or completed trip that was created by your app.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The valid access token.
| requestId  | String| Unique identifier representing a Request.


## UberRide.getProductsByLocation
The Products endpoint returns information about the Uber products offered at a given location. The response includes the display name and other details about each product, and lists the products in the proper display order. Some products, such as uberEATS, are not returned by this endpoint.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The valid access token.
| latitude   | String| Latitude component of location.
| longitude  | String| Longitude component of location.


## UberRide.getProductsPrices
The Price Estimates endpoint returns an estimated price range for each product offered at a given location. The price estimate is provided as a formatted string with the full price range and the localized currency symbol.

| Field         | Type  | Description
|---------------|-------|----------
| accessToken   | String| The valid access token.
| startLatitude | String| Latitude component of start location.
| startLongitude| String| Longitude component of start location.
| endLatitude   | String| Latitude component of end location.
| endLongitude  | String| Longitude component of end location.
| seatCount     | String| Optional: The number of seats required for uberPOOL. Default and maximum value is 2.


## UberRide.getProductsTimeEstimates
The Time Estimates endpoint returns ETAs for all products currently available at a given location, with the ETA for each product expressed as integers in seconds.

| Field         | Type  | Description
|---------------|-------|----------
| accessToken   | String| The valid access token.
| startLatitude | String| Latitude component.
| startLongitude| String| Longitude component.
| productId     | String| Optional: Unique identifier representing a specific product for a given latitude & longitude.


## UberRide.getUserAddress
The Places endpoint allows retrieving the home and work addresses from an Uber user's profile.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The valid access token.
| placeName  | String| The name of the place to retrieve. Only home and work are acceptable.


## UberRide.updateUserAddress
The Places endpoint allows updating the home and work addresses from an Uber user's profile.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The valid access token.
| placeName  | String| The name of the place to retrieve. Only home and work are acceptable.
| address    | String| The address of the place that should be tied to the given placeName.


## UberRide.getUserPaymentMethods
The Payment Methods endpoint allows retrieving the list of the user’s available payment methods.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The valid access token.


## UberRide.createReminder
The Reminders endpoint allows developers to set a reminder for a future trip.

| Field                      | Type  | Description
|----------------------------|-------|----------
| accessToken                | String| The valid access token. This endpoint only supports server_token.
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


## UberRide.getReminder
The Reminders endpoint allows you to get the status of an existing ride reminder.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The valid access token. This endpoint only supports server_token.
| reminderId | String| The reminder ID.


## UberRide.updateReminder
The Reminders endpoint allows you to update an existing reminder.

| Field                      | Type  | Description
|----------------------------|-------|----------
| accessToken                | String| The valid access token. This endpoint only supports server_token.
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


## UberRide.deleteReminder
The Reminders endpoint allows you to remove any reminder in the pending state from being sent.

| Field                      | Type  | Description
|----------------------------|-------|----------
| accessToken                | String| The valid access token. This endpoint only supports server_token.
| reminderId                 | String| The reminder ID.


## UberRide.requestRide
The Ride Request endpoint allows a ride to be requested on behalf of an Uber user.

| Field              | Type  | Description
|--------------------|-------|----------
| accessToken        | String| The valid access token.
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


## UberRide.updateCurrentRide
The Ride Request endpoint allows updating an ongoing request’s destination.

| Field       | Type  | Description
|-------------|-------|----------
| accessToken | String| The valid access token.
| endLatitude | String| Optional: The final or destination latitude. Either this or endPlaceId must be specified.
| endLongitude| String| Optional: The final or destination longitude. Either this or endPlaceId must be specified.
| endAddress  | String| Optional: The final or destination address.
| endNickname | String| Optional: The final or destination nickname label.
| endPlaceId  | String| Optional: The final or destination place ID. This is the name of an Uber saved place. Only “home” or “work” is accepted. Either this or endLatitude and endLongitude must be specified.


## UberRide.cancelCurrentRide
The Ride Request endpoint allows cancellation of the user's current trip.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The valid access token.


## UberRide.getRideEstimate
The Request Estimate endpoint allows a ride to be estimated given the desired product, start, and end locations.

| Field         | Type  | Description
|---------------|-------|----------
| accessToken   | String| The valid access token.
| productId     | String| Optional: The unique ID of the product being requested. If none is provided, it will default to the cheapest product for the given location.
| startLatitude | String| Optional: The beginning or "pickup" latitude. Either this or startPlaceId must be specified.
| startLongitude| String| Optional: The beginning or "pickup" longitude. Either this or startPlaceId must be specified.
| startPlaceId  | String| Optional: The beginning or “pickup” place ID. This is the name of an Uber saved place. Only “home” or “work” is acceptable. Either this or startLatitude and startLongitude must be specified.
| endLatitude   | String| Optional: The final or destination latitude. If not included, only the pickup ETA and details of surge pricing will be included.
| endLongitude  | String| Optional: The final or destination longitude. If not included, only the pickup ETA and details of surge pricing will be included.
| endPlaceId    | String| Optional: The final or destination place ID. This is the name of an Uber saved place. Only “home” or “work” is acceptable. Either this or endLatitude and endLongitude may be specified.
| seatCount     | String| Optional: The number of seats required for uberPOOL. Default and maximum value is 2.


## UberRide.updateRide
The Ride Request endpoint allows updating an ongoing request’s destination using the Ride Request endpoint.

| Field       | Type  | Description
|-------------|-------|----------
| accessToken | String| The valid access token.
| requestId  | String| Unique identifier representing a Request.
| endLatitude | String| Optional: The final or destination latitude. Either this or endPlaceId must be specified.
| endLongitude| String| Optional: The final or destination latitude. Either this or endPlaceId must be specified.
| endAddress  | String| Optional: The final or destination address.
| endNickname | String| Optional: The final or destination nickname label.
| endPlaceId  | String| Optional: The final or destination place ID. This is the name of an Uber saved place. Only “home” or “work” is accepted. Either this or endLatitude and end_Longitude must be specified.


## UberRide.cancelRide
The Ride Request endpoint allows cancellation of an ongoing Request on behalf of a rider.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The valid access token.
| requestId | String| Unique identifier representing a Request.


## UberRide.getRideMap
The Ride Request endpoint getting a map with a visual representation of a Request.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The valid access token.
| requestId | String| Unique identifier representing a Request.


## UberRide.getReceipt
The Ride Request endpoint allows getting the receipt information of the completed request.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The valid access token.
| requestId | String| Unique identifier representing a Request.


