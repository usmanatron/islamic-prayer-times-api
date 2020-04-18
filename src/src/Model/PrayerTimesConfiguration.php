<?php

namespace App\Model;

use IslamicNetwork\PrayerTimes\Method;
use IslamicNetwork\PrayerTimes\PrayerTimes;

class PrayerTimesConfiguration
{
  # These defaults were taken from the source of the PrayerTimes library.
  public $method = Method::METHOD_MWL;
  public $midnight_mode = PrayerTimes::MIDNIGHT_MODE_STANDARD;
  public $latitude_adjustment_method = PrayerTimes::LATITUDE_ADJUSTMENT_METHOD_ANGLE;
  public $elevation = 0;
  public $school = PrayerTimes::SCHOOL_STANDARD;

  public function __construct()
  {
  }
}