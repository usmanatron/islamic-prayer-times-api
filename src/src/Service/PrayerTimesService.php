<?php

namespace App\Service;

use IslamicNetwork\PrayerTimes\PrayerTimes;

final class PrayerTimesService
{
  global $app;

  public function GetTimes(): Array
  {
    $container = $app->getContainer();
    $method = $container->get('settings')['prayer_time_defaults']['isna'];
    $pt = new PrayerTimes($method);

    $times = $pt->getTimesForToday("51.599507", "-0.289562", "Europe/London");
    
    return $times;
  }
}