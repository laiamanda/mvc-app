<?php 
    class Router {
        protected static $routes = [
            'GET' => [],
            'POST' => [],
        ];

        protected static $nameRoutes = [];
        // Keep track of the last added route
        protected static $lastAddedRoute = null;

        // Trim the route
        protected static function formatRoute($route){
            return '/' . trim($route , '/');
        }

        // Handle the Get Route
        public static function get($path, $handler) {
            // self::$routes['GET'][self::formatRoute($path)] = $handler; // Old Version before Last Added Route
            $formattedPath = self::formatRoute($path);
            self::$routes['GET'][$formattedPath] = $handler;
            self::$lastAddedRoute = $formattedPath;
            return new static;
        }

        // Handle the Post Route
        public static function post($path, $handler) {
            // self::$routes['POST'][self::formatRoute($path)] = $handler;
            $formattedPath = self::formatRoute($path);
            self::$routes['POST'][$formattedPath] = $handler;
            self::$lastAddedRoute = $formattedPath;
            return new static;
        }

        // Retrieve the name from the route
        public static function name($routeName) {

            if(self::$lastAddedRoute !== null) {
                self::$nameRoutes[$routeName] = self::$lastAddedRoute;
                self::$lastAddedRoute = null;
            } else {
                throw new Exception("No Route Available");
            }  
            // $lastRoute =  array_key_last(self::$routes['GET'] + self::$routes['POST']);

            // if($lastRoute !== null) {
            //     self::$nameRoutes[$routeName] = $lastRoute;
            // }
            return new static; 
        }

        public static function route($name, $params = []) {
            if(!isset(self::$nameRoutes[$name])) {
                throw new Exception("Route $name does not exists");
            }

            $route = self::$nameRoutes[$name];

            foreach($params as $key => $value) {
                $route = str_replace('{' . $key . '}', $value, $route);
            }

            return $route;
        }

        public static function dispatch() {
            $method = $_SERVER['REQUEST_METHOD'];
            $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

            $cleanedRequest = self::formatRoute($requestUri);

            if(self::match($method, $cleanedRequest)) {
                $handler = self::match($method, $cleanedRequest);

                list($controller, $action) = explode('@', $handler['handler']);
                $params = $handler['params'];
                
                self::callAction($controller, $action, $params);
            }
        }

        public static function match($method, $requestUri) {
            foreach(self::$routes[$method] as $route => $handler) {
                $pattern = preg_replace('#\{[a-zA-Z0-9_]+}#', '([a-zA-Z0-9_]+)', $route);
                if(preg_match('#^'. $pattern . '$#', $requestUri, $matches)) {
                    array_shift($matches);
                    return [
                        'handler' => $handler,
                        'params' => $matches,
                    ];
                }
            }
            return false;
        }

        protected static function callAction($controller, $action, $params = []) {
            require_once base_path('/app/controllers/') . '/' . $controller . '.php';
            $controllerInstance = new $controller();
    
            call_user_func_array([$controllerInstance, $action], $params);
        }
    }
?>