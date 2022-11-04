<?php
require_once './libs/Router.php';
require_once './app/controllers/cars-api.controller.php';

// crea el router
$router = new Router();

// defina la tabla de ruteo
$router->addRoute('cars', 'GET', 'CarApiController', 'getCars');
$router->addRoute('cars/:ID', 'GET', 'CarApiController', 'getCar');
$router->addRoute('cars/:ID', 'DELETE', 'CarApiController', 'deleteCar');
$router->addRoute('cars', 'POST', 'CarApiController', 'insertCar'); 

// ejecuta la ruta (sea cual sea)
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);