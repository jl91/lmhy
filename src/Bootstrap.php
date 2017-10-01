<?php


namespace Lmhy;


use Slim\App;

class Bootstrap
{
    private $app;
    private $settings;

    public function __construct(App $app)
    {
        $this->app = $app;
    }

    public static function setUp(array $settings): App
    {
        $instance = new static(new App($settings));
        $instance->settings = $settings;
        $instance->registerRoutes();

        return $instance->app;
    }

    private function registerRoutes(): self
    {
        $settings = $this->settings;
        $routes = $settings['routes'];
        $app = $this->app;

        foreach ($routes as $key => $route) {
            $controller = $route->controller;
            $action = $route->action;
            $methods = $route->methods;
            $pattern = $route->pattern;
            $resolver = $controller . ':' . $action;

            foreach ($methods as $method) {
                $app->{$method}($pattern, $resolver);
            }
        }

        return $this;
    }


}