<?php
$routes = [
    'updateCurrentRideById',
    'requestRideById',
    'getAccessToken',
    'getUser',
    'getUserActivity',
    'getProductDetails',
    'getCurrentRide',
    'getRide',
    'getProductsByLocation',
    'getProductsPrices',
    'getProductsTimeEstimates',
    'getUserAddress',
    'updateUserAddress',
    'getUserPaymentMethods',
    'createReminder',
    'getReminder',
    'updateReminder',
    'deleteReminder',
    'requestRide',
    'updateCurrentRide',
    'cancelCurrentRide',
    'getRideEstimate',
    'updateRide',
    'cancelRide',
    'getRideMap',
    'getReceipt',
    'metadata'
];
foreach($routes as $file) {
    require __DIR__ . '/../src/routes/'.$file.'.php';
}

