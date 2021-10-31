<?php

require __DIR__ . '/vendor/autoload.php';

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

$logger = new Logger('main');
$logger->pushHandler(new StreamHandler(__DIR__ . '/logs/app.log', Logger::DEBUG));

$logger->info('First message');
$logger->info('Second message');


?>