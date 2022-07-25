<?php
declare(strict_types=1);

namespace elektrodancer\mailer_api;

use Slim\App;

class RouteFactory
{
    private App $app;

    public function __construct(App $app)
    {
        $this->app = $app;
    }

    public function create(): App
    {
        $this->app->addErrorMiddleware(true, true, true);

        return $this->app;
    }
}
