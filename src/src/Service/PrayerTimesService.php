<?php

namespace App\Service;
use SimpleContainer\ContainerBuilder;

use IslamicNetwork\PrayerTimes\PrayerTimes;

final class PrayerTimesService
{
  public function GetTimes(): Array
  {
    $container = ContainerBuilder::getContainer();
    $method = ($container->get('Settings'))->get('prayer_time_defaults')['isna'];
    $pt = new PrayerTimes($method);

    $times = $pt->getTimesForToday("51.599507", "-0.289562", "Europe/London");
    
    return $times;
  }
}