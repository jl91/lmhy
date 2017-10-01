<?php


namespace Lmhy;


use Slim\App;

class Bootstrap
{
    private $app;

    public function __construct(App $app)
    {
        $this->app = $app;
    }

    public static function setUp(App $app)
    {
        $instance = new static($app);
        $instance->registerRoutes();
    }

    private function registerRoutes()
    {

    }


}