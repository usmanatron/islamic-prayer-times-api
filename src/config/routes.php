<?php

use Slim\App;

return function (App $app) {
  $app->get('/', \App\Action\HomeAction::class);
  $app->get('/pt', \App\Action\PrayerTimesAction::class);

  $app->get('/healthcheck', function ($request, $response, $args) {
    return $response->withJson(['healthy' => true]);
  });
};