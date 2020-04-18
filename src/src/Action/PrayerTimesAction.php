<?php

namespace App\Action;

use Slim\Http\Response;
use Slim\Http\ServerRequest;
use IslamicNetwork\PrayerTimes\PrayerTimes;
use App\Model\PrayerTimesConfiguration;
use App\Service\PrayerTimesService;

final class PrayerTimesAction
{
  public function __invoke(ServerRequest $request, Response $response): Response
  {
    $config = new PrayerTimesConfiguration();
    $pts = new PrayerTimesService($config);
    $times = $pts->GetTimes();
    return $response->withJson($times);
  }
}