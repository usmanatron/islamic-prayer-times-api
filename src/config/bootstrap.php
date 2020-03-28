<?php

use Slim\Factory\AppFactory;
use Slim\App;

require_once __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();
 
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

// Register routes
(require __DIR__ . '/routes.php')($app);

// Register middleware
(require __DIR__ . '/middleware.php')($app);

return $app;