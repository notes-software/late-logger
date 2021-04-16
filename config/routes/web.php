<?php

// your routes goes here
$router->get('', ['WelcomeController@home', 'auth']);
$router->get('home', ['WelcomeController@home', 'auth']);

$router->get('deduction', ['LateDeductController@index', 'auth']);
$router->post('deduction', ['LateDeductController@store', 'auth']);
$router->get('entry', ['LateDeductController@entry', 'auth']);
$router->post('entry', ['LateDeductController@newLate', 'auth']);
$router->get('delete/{id}', ['LateDeductController@delete', 'auth']);

$router->get('payment', ['LateDeductController@payment', 'auth']);
$router->post('payment', ['LateDeductController@storePayment', 'auth']);
$router->get('payment/delete/{id}', ['LateDeductController@deletePayment', 'auth']);
$router->get('history', ['LateDeductController@history', 'auth']);
$router->get('summary', ['LateDeductController@summary', 'auth']);

$router->get('payment/history', ['LateDeductController@paymentHistory', 'auth']);
