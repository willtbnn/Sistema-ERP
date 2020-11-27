<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/login', 'LoginController@signin');


$router->post('/login', 'LoginController@signAction');

// Esse vai ser feito pelo usuario do sistema
$router->get('/cadastro', 'HomeController@signup');
// recebendo cadastro de usuario
$router->post('/cadastro', 'LoginController@signupAction');

$router->get('/inlogout', 'LoginController@logout');

// parte de funcionarios"
$router->get('/employee', 'FunController@employees');
//deletando funcionario
$router->get('/employee/{id}', 'FunController@deleteFun');


//adicionando funcionario
$router->get('/addfun', 'FunController@addEmployees');
$router->post('/addfun', 'FunController@addAction');

// Ler informações do funcionario
$router->get('/employee/{id}/viewfun', 'FunController@fun');

// edição de funcioarios
$router->post('/employee/{id}/viewfun', 'Funcontroller@updateFun');