<?php

require __DIR__ . '/auth.php';
require __DIR__ . '/migration.php';

// your routes goes here
$router->get('', 'WelcomeController@home');
$router->get('home', 'WelcomeController@home');

$router->get('late/deduction', 'LateDeductController@index');
$router->post('late/deduction', 'LateDeductController@store');
$router->get('late/entry', 'LateDeductController@entry');
$router->post('late/entry', 'LateDeductController@newLate');
$router->get('late/delete/{id}', 'LateDeductController@delete');

$router->get('late/payment', 'LateDeductController@payment');
$router->post('late/payment', 'LateDeductController@storePayment');
$router->get('late/payment/delete/{id}', 'LateDeductController@deletePayment');
$router->get('late/history', 'LateDeductController@history');
$router->get('late/summary', 'LateDeductController@summary');

$router->get('payment/history', 'LateDeductController@paymentHistory');
