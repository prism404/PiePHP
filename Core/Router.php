<?php

namespace Core;

class Router
{

    private static $routes;

    public static function connect($url, $route)
    {
        self::$routes[$url] = $route;
    }

    public static function get($url)
    {
        if (!array_key_exists($url, self::$routes)) {
            return null;
        }
        return self::$routes[$url];
    }

    public static function getDynamic($url)
    {
        $url = substr($url, 1);

        if ($url[strlen($url) - 1] == '/') {
            $url = substr($url, 0, -1);
        }

        $dynamicRoute = explode('/', $url,);
        $route = array('controller' => null, 'action' => null);

        if (count($dynamicRoute) > 2) {
            return $route;
        } else if (count($dynamicRoute) == 2) {
            $route['controller'] = $dynamicRoute[0];
            $route['action'] = $dynamicRoute[1];
        } else if (count($dynamicRoute) == 1) {
            $route['controller'] = $dynamicRoute[0];
        }
        return $route;
    }
}
