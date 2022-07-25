<?php
declare(strict_types = 1);

namespace elektrodancer\mailer_api;

require_once __DIR__ . '/../vendor/autoload.php';

$configuration = Configuration::fromArray(require __DIR__ . '/../config/config.php');
$factory = new Factory($configuration);

$app = $factory->createApp();
$app->run();