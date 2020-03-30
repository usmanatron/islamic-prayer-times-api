<?php

use Selective\Config\Configuration;
use Slim\App;

return function (App $app) {
    // Parse json, form data and xml
    $app->addBodyParsingMiddleware();

    // Add routing middleware
    $app->addRoutingMiddleware();

    // Add error handler middleware
    $settings = (new Configuration(require __DIR__ . '/settings.php'))->getArray('error_handler_middleware');

    $displayErrorDetails = (bool)$settings['display_error_details'];
    $logErrors = (bool)$settings['log_errors'];
    $logErrorDetails = (bool)$settings['log_error_details'];

    $app->addErrorMiddleware($displayErrorDetails, $logErrors, $logErrorDetails);
};
