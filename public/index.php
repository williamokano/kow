<?php

require './../vendor/autoload.php';

// ------ DEFINE ROOT DIR ------
define('ROOT_DIR', dirname(__DIR__));

// ------ DEFINE SRC FOLDER AND DIR ------
define('SRC_FOLDER', 'src');
define('SRC_PATH', ROOT_DIR . DIRECTORY_SEPARATOR . SRC_FOLDER);

// ------ DEFINE CONFIG FOLDER AND DIR ------
define('CONFIG_FOLDER', 'config');
define('CONFIG_PATH', ROOT_DIR . DIRECTORY_SEPARATOR . CONFIG_FOLDER);

define('AUTO_CONFIG_FOLDER', 'auto');
define('AUTO_CONFIG_PATH', CONFIG_PATH . DIRECTORY_SEPARATOR . AUTO_CONFIG_FOLDER);

// ------ DEFINE APP FOLDER AND DIR ------
define('APP_FOLDER', 'App');
define('APP_PATH', ROOT_DIR . DIRECTORY_SEPARATOR . APP_FOLDER);

// ------ DEFINE STORAGE FOLDER AND DIR ------
define('STORAGE_FOLDER', 'Storage');
define('STORAGE_PATH', ROOT_DIR . DIRECTORY_SEPARATOR . STORAGE_FOLDER);

// ------ DEFINE CACHE FOLDER AND DIR ------
define('CACHE_FOLDER', 'Storage');
define('CACHE_PATH', ROOT_DIR . DIRECTORY_SEPARATOR . CACHE_FOLDER);

$app = new \Katapoka\Kow\Core\Application();
$app->run();
