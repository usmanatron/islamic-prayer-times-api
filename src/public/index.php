<?php

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');

$app = (require __DIR__ . '/../config/bootstrap.php');
$app->run();
