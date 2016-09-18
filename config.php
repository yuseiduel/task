<?php

define('__ROOT__', dirname(__FILE__));
define('VIEW_DIR', __ROOT__ . '/src/views/');
define('DB_HOST',   (isset($_ENV['DB_HOST'])) ? $_ENV['DB_HOST'] : 'localhost');
define('DB_NAME',   (isset($_ENV['DB_NAME'])) ? $_ENV['DB_NAME'] : 'task');
define('DB_USER',   (isset($_ENV['DB_USER'])) ? $_ENV['DB_USER'] : 'root');
define('DB_PASS',   (isset($_ENV['DB_PASS'])) ? $_ENV['DB_PASS'] : '');

ini_set('error_reporting', E_ALL);