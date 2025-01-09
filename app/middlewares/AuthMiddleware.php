<?php 
    class AuthMiddleware {
        public static function isAuthenticated() {
            if(session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            return isset($_SESSION['id']) && !empty($_SESSION['id']);
        }

        public static function requiredLogin() {
            // Check if user is authenticated
            if(!self::isAuthenticated()) {
                // Else, redirect to the user login page
                redirect('/user/login');
            }
        }
    }
?>