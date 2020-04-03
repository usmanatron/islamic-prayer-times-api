<?php

use Slim\Factory\AppFactory;
use Slim\App;

require_once __DIR__ . '/../vendor/autoload.php';

$container = (require __DIR__ . '/container.php');

AppFactory::setContainer($container);
$app = AppFactory::create();
 
// Register routes
(require __DIR__ . '/routes.php')($app);

// Register middleware
(require __DIR__ . '/middleware.php')($app);

return $app;