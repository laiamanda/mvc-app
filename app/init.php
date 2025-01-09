<?php 
    session_start();
    $config = require_once __DIR__ . "/../config/config.php";

    if(!defined('BASE_URL')) {
        define('BASE_URL', $config['app']['base_url']);
    }

    require_once __DIR__ . "/../config/database.php";
    require_once __DIR__ . "/helpers.php";

    spl_autoload_register(function($class_name){
        $paths = [
            __DIR__ . '/controllers/',
            __DIR__ . '/models/',
            __DIR__ . '/middlewares/',
        ];

        foreach($paths as $path) {
            $file = $path . $class_name . ".php";
            // Check if the file exists
            if (file_exists($file)) {
                require_once $file;
                return;
            }
        }
    });
?>