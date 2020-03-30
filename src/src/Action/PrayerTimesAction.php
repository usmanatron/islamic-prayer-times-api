<?php

namespace App\Action;

use Slim\Http\Response;
use Slim\Http\ServerRequest;
use IslamicNetwork\PrayerTimes\PrayerTimes;

final class PrayerTimesAction
{
  public function __invoke(ServerRequest $request, Response $response): Response
  {
    $pt = new PrayerTimes('ISNA');

    $times = $pt->getTimesForToday("51.599507", "-0.289562", "Europe/London");
    
    return $response->withJson($times);
  }
}