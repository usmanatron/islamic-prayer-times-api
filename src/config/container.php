<?php

use Selective\Config\Configuration;
use SimpleContainer\ContainerBuilder;

class Settings {

  private $settings;

  public function __construct() {
    date_default_timezone_set('Europe/London');

    $raw_settings = file_get_contents(__DIR__ . "/settings.json", true);
    $this->settings = json_decode($raw_settings, true);
  }

  public function get($key) {
      return $this->settings[$key];
  }
}

$configuration = [
  'Settings' => Settings::class
];

ContainerBuilder::build($configuration);
return ContainerBuilder::getContainer();
