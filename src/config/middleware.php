<?php

use Psr\Log\LogLevel;
use Selective\Config\Configuration;
use SimpleContainer\ContainerBuilder;
use SimpleLog\Logger;
use Slim\App;

return function (App $app) {
    // Parse json, form data and xml
    $app->addBodyParsingMiddleware();

    // Add routing middleware
    $app->addRoutingMiddleware();

    // Add error handler middleware
    $container = ContainerBuilder::getContainer();
    $settings = $container->get('Settings');


    $slim_error_handler_settings = $settings->get('error_handler_middleware');
    $display_error_details = (bool)$slim_error_handler_settings['display_error_details'];
    $log_errors = (bool)$slim_error_handler_settings['log_errors'];
    $log_error_details = (bool)$slim_error_handler_settings['log_error_details'];

    $logger_settings = $settings->get('logger');
    $log_level = ((bool)$logger_settings['debug']) ? LogLevel::DEBUG : LogLevel::INFO; 
    $logger  = new Logger($logger_settings['path'], $logger_settings['name'], $log_level);

    if ((bool)$logger_settings['include_stdout']) {
        $logger->setOutput(true);
    }

    $app->addErrorMiddleware($display_error_details, $log_errors, $log_error_details, $logger);
};
