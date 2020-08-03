<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/login', 'LoginController@signin');

$router->post('/login', 'LoginController@signAction');




// Esse vai ser feito pelo usuario do sistema
$router->get('/cadastro', 'LoginController@signup');
// recebendo cadastro de usuario
$router->post('/cadastro', 'LoginController@signupAction');