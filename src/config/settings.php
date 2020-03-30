<?php

// Timezone
date_default_timezone_set('Europe/London');

// Settings
$setting_file = __DIR__ . "/settings.json";
$setting_file_contents = file_get_contents($setting_file, true);

return json_decode($setting_file_contents, true);


