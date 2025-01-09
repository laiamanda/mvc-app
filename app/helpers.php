<?php 

    // Base URL
    function base_url($path='') {
        if(defined('BASE_URL')) {
            return BASE_URL . ltrim($path, '/');
        }
        
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT']  === 443 ? "https://" : "http://";
        $host = $_SERVER['HTTP_HOST'];
        // Error: Something is wrong with $base
        $base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '');
        // $base = str_replace('\\', '/', rtrim(dirname($_SERVER['SCRIPT_NAME']), '')); 

        // Should return http://mvc-app.local/ but it's not...TO DO: FIX THIS $BASE
        return $protocol . $host . $base . '/' . ltrim($path, '/');
    }

    function base_path($path='') {
        return realpath(__DIR__ . '/../' . '/' . ltrim($path, '/'));
    }

    function views_path($path='') {
        return base_path('app/views/'. ltrim($path, '/'));
    }

    // Redirect the user
    function redirect($path='', $queryParams = []) {
        $url = base_url('/' . $path);

        if(!empty($queryParams)){
            $url .= "?" . http_build_query($queryParams);
        }

        header("Location: " . $url);
        exit();
    }

    // Render the web page
    function render($view, $data = [], $layout = 'layout') {
        // Extra the data
        extract($data);
        // Temporary container. Output buffering
        ob_start();

        // require __DIR__ . '/views/' . $view . '.php'; // - Hardcoded
        require views_path($view . '.php');

        // Get the output buffering
        $content = ob_get_clean();

        // require __DIR__ . "/views/" . $layout . ".php";  // - Hardcoded
        require views_path($layout .'.php');
    }

    function config($key) {
        $config = require base_path('config/config.php');
        $keys = explode('.', $key);

        $value = $config;

        foreach ($keys as $k) {
            if(!isset($value[$k])) {
                throw new Exception("Config key '{$k}' not found");
            } 
            $value = $value[$k];
        }
        return $value;
    }

    function sanitize($values) {
        return htmlspecialchars(strip_tags($values));
    }

    function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    function getUserFullName() {
        if(isset($_SESSION['first_name']) && (isset($_SESSION['first_name']))) {
            return $_SESSION['first_name'] . ' ' . $_SESSION['last_name'];
        } else {
            return $_SESSION['username']; 
        }
    }
?>