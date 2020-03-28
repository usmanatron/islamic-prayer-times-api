<?php

// Error reporting
error_reporting(0);
ini_set('display_errors', '0');

// Timezone
date_default_timezone_set('Europe/London');

// Settings
$return json_decode(file_get_contents('./settings.json', true), true);
