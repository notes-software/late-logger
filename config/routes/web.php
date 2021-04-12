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
