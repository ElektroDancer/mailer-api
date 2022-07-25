<?php
declare(strict_types=1);

namespace elektrodancer\mailer_api;

use PHPMailer\PHPMailer\PHPMailer;
use Slim\App;
use Slim\Factory\AppFactory;

class Factory
{
    private Configuration $configuration;

    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function createApp(): App
    {
        $app = AppFactory::create();
        return $this->createRouteFactory($app)->create();
    }

    private function createRouteFactory(App $app): RouteFactory
    {
        return new RouteFactory($app);
    }


    private function createPhpMailerFactory(): PhpMailerFactory
    {
        return new PhpMailerFactory(
            new PHPMailer(),
            $this->configuration
        );
    }
}
