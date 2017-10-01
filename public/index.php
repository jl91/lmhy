<?php
define('DS', DIRECTORY_SEPARATOR);
define('APP_ROOT', realpath(implode(DS, [
        __DIR__,
        '..'
    ])) . DS);

require_once APP_ROOT . "vendor" . DS . "autoload.php";

use Pimple\Psr11\Container;
use Pimple\Container as PimpleContainer;

$pimpleContainer = new PimpleContainer([]);

$psr11Container = new Container($pimpleContainer);

$globalSettingsFile = APP_ROOT . 'src' . DS . 'config' . DS . 'settings.global.php';
$localSettingsFile = APP_ROOT . 'src' . DS . 'config' . DS . 'settings.local.php';

$globalSettings = [];
$localSettings = [];

$globalSettings = require_once $globalSettingsFile;

if (is_file($localSettingsFile)) {
    $localSettings = require_once $localSettingsFile;
}

$settings = array_replace_recursive($globalSettings, $localSettings);

$app = \Lmhy\Bootstrap::setUp($settings);

$app->getContainer();

$app->run(true);