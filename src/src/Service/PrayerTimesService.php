<?php

namespace App\Service;
use SimpleContainer\ContainerBuilder;

use IslamicNetwork\PrayerTimes\PrayerTimes;

final class PrayerTimesService
{

  private $settings;

  public function __construct()
  {
    $container = ContainerBuilder::getContainer();
    $this->settings = $container->get('Settings');
  }

  public function GetTimes(): Array
  {
    $method = $this->settings->get('prayer_time_defaults')['method'];
    $pt = new PrayerTimes($method);

    $times = $pt->getTimesForToday("51.599507", "-0.289562", "UTC");
    
    return $times;
  }
}