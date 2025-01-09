<?php 
    class HomeController {
        public function index() {
            // $database = Database::getInstance();
            // $conn = $database->getConnection();

            $data = [
                'title' => 'Home Page',
                'message' => 'Welcome to the Home Page',
            ];

            render('home/index', $data, 'layouts/hero_layout');
            // echo($_SESSION['id']);
            // require_once __DIR__ . "/../views/home/index.php"; // Hard-coded
        }
        public function about() {
            $data = [
                'title' => 'About Page',
                'message' => 'Welcome to the About Page',
            ];

            render('home/about', $data);
        }
        public function contact() {
            $data = [
                'title' => 'Contact Page',
                'message' => 'Welcome to the About Page',
            ];

            render('home/contact', $data);
        }
    }
?>