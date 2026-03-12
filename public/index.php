<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Router;
use App\Http\ApiClient;
use App\Service\LeadService;
use App\Controller\LeadController;

$router = new Router();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$api = new ApiClient();
$service = new LeadService($api);
$controller = new LeadController($service);

$router->add('GET', '/', [$controller, 'showForm']);
$router->add('POST', '/submit', [$controller, 'submit']);
$router->add('GET', '/success', [$controller, 'success']);
$router->add('GET', '/statuses', [$controller, 'statuses']);

$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);