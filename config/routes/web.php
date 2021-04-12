<?php

require __DIR__ . '/auth.php';
require __DIR__ . '/migration.php';

// your routes goes here
$router->get('', 'WelcomeController@home');
$router->get('home', 'WelcomeController@home');

$router->get('project', 'ProjectController@index');
$router->get('project/detail/{id}', 'ProjectController@detail');
$router->post('project/detail/{id}', 'ProjectController@updateDetail');
$router->get('project/add', 'ProjectController@add');
$router->post('project/add', 'ProjectController@store');
$router->get('project/delete/{id}', 'ProjectController@delete');
