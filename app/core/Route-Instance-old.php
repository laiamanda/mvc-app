<?php 
    class Route {
        protected $routes = [
            'GET' => [],
            'POST' => [],
        ];

        // Trim the route
        protected function formatRoute($route){
            return '/' . trim($route , '/');
        }

        // Handle the Get Route
        public function get($path, $handler) {
            $this->routes['GET'][$this->formatRoute($path)] = $handler;
        }

        // Handle the Post Route
        public function post($path, $handler) {
            $this->routes['POST'][$this->formatRoute($path)] = $handler;
        }

        public function dispatch() {
            $method = $_SERVER['REQUEST_METHOD'];
            $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

            $cleanedRequest = $this ->formatRoute($requestUri);

            if($this->match($method, $cleanedRequest)) {
                $handler = $this->match($method, $cleanedRequest);

                list($controller, $action) = explode('@', $handler['handler']);
                $params = $handler['params'];
                
                $this->callAction($controller, $action, $params);
            }
        }

        public function match($method, $requestUri) {
            foreach($this->routes[$method] as $route => $handler) {
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

        protected function callAction($controller, $action, $params = []) {
            require_once base_path('/app/controllers/') . '/' . $controller . '.php';
            $controllerInstance = new $controller();
    
            call_user_func_array([$controllerInstance, $action], $params);
        }
    }
?>