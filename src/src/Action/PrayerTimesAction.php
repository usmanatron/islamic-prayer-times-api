<?php

namespace App\Action;

use Slim\Http\Response;
use Slim\Http\ServerRequest;
use IslamicNetwork\PrayerTimes\PrayerTimes;
use App\Service\PrayerTimesService;

final class PrayerTimesAction
{
  public function __invoke(ServerRequest $request, Response $response): Response
  {
    $pts = new PrayerTimesService();
    $times = $pts->GetTimes();
    return $response->withJson($times);
  }
}