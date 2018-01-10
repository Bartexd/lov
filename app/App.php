<?php

namespace App;

use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;
use FastRoute\Dispatcher;
use Models\Controllers\News;
use Models\Gallery;


class App
{

    /**
     * App constructor.
     */
    static $facebook;

    function __construct()
    {



        self::$facebook = new \Facebook\Facebook([
                                                     'app_id' => '1772377619460159',
                                                     'app_secret' => 'a1ab87f9a6b1d8f07383678f99d728d1',
                                                     'default_graph_version' => 'v2.11',
                                                     //'default_access_token' => '{access-token}', // optional
                                                 ]);

        new Database();



        $this->runRouter();
    }

    /**
     * Routing (TODO app/config/routes.php)
     */
    function runRouter()
    {

        $dispatcher = simpleDispatcher(
            function (RouteCollector $r) {
                $routes = include __DIR__ . "/configs/Routes.php";
                foreach ($routes as $route) {
                    if (strpos($route[1], "asset") === true) continue;
                    $r->addRoute($route[0], $route[1], $route[2]);
                }
            }
        );

        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);

        $routeInfo = $dispatcher->dispatch($httpMethod, $uri);
        switch ($routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                echo View::make('404.twig');

                break;


            case Dispatcher::METHOD_NOT_ALLOWED:
                echo 'METHOD NOT ALLOWED';
                break;


            case Dispatcher::FOUND:
                $handler = $routeInfo[1];
                $vars = $routeInfo[2];
                RouteMiddleware::call_controller($handler, $vars);

                break;
        }

    }
}