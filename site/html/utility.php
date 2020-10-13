<?php
// Set default timezone
date_default_timezone_set('UTC');

session_start();

include_once('./Singleton.php');
$singleton = new Singleton();