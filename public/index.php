<?php 

session_start();

/**  Valid PHP Version? **/
$minPHPVersion = '7.4';
if (phpversion() < $minPHPVersion)
{
	die("Your PHP version must be {$minPHPVersion} or higher to run this app. Your current version is " . phpversion());
}

/**  Path to this file **/
define('ROOTPATH', __DIR__ . DIRECTORY_SEPARATOR);

require "../app/core/init.php";

DEBUG ? ini_set('display_errors', 1) : ini_set('display_errors', 0);

/* Set Timezone */
date_default_timezone_set(DEFAULT_TIMEZONE);

$app = new App;
$app->loadController();
