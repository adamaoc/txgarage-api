<?php
// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);
// Report all PHP errors (see changelog)
error_reporting(E_ALL);
// Report all PHP errors
error_reporting(-1);

require_once 'app/init.php';

$app = new App;
