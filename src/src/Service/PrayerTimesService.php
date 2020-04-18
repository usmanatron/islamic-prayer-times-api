<?php

namespace App\Service;
use SimpleContainer\ContainerBuilder;

use IslamicNetwork\PrayerTimes\PrayerTimes;

final class PrayerTimesService
{

  private $settings;
  private $prayer_times_config;

  public function __construct($prayer_times_config)
  {
    $container = ContainerBuilder::getContainer();
    $this->settings = $container->get('Settings');
    $this->prayer_times_config = $prayer_times_config;
  }

  public function GetTimes(): Array
  {
    $pt = new PrayerTimes($this->prayer_times_config->method, $this->prayer_times_config->school);

    $times = $pt->getTimesForToday(
      "51.599507",
      "-0.289562",
      "UTC",
      $elevation = $this->prayer_times_config->elevation,
      $latitudeAdjustmentMethod = $this->prayer_times_config->latitude_adjustment_method,
      $midnightMode = $this->prayer_times_config->midnight_mode
  );
    
    return $times;
  }
}
