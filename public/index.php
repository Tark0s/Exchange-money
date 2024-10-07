<?php

use Application\Services\ExchangeService;
use Infrastructure\Http\Controllers\ExchangeController;

require_once __DIR__ . '/../vendor/autoload.php';

$exchangeService = new ExchangeService();
$controller = new ExchangeController($exchangeService);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === '/exchange') {
    $controller->exchange();
} else {
    http_response_code(404);
    echo 'Not Found';
}