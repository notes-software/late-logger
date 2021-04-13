<?php

require __DIR__ . '/auth.php';
require __DIR__ . '/migration.php';

// your routes goes here
$router->get('', 'WelcomeController@home');
$router->get('home', 'WelcomeController@home');

$router->get('deduction', 'LateDeductController@index');
$router->post('deduction', 'LateDeductController@store');
$router->get('entry', 'LateDeductController@entry');
$router->post('entry', 'LateDeductController@newLate');
$router->get('delete/{id}', 'LateDeductController@delete');

$router->get('payment', 'LateDeductController@payment');
$router->post('payment', 'LateDeductController@storePayment');
$router->get('payment/delete/{id}', 'LateDeductController@deletePayment');
$router->get('history', 'LateDeductController@history');
$router->get('summary', 'LateDeductController@summary');

$router->get('payment/history', 'LateDeductController@paymentHistory');
