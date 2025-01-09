<?php 
    class UserController {
        private $userModel;

        public function __construct() {
            $this->userModel = new User();
        }

        // GET METHOD
        public function showRegisterForm() {
            render('user/register');
        }

        // POST METHOD
        public function register() {
            $user = new User();
            // Retrieve the POSTS DATA
            $user -> username = $_POST['username'];
            $user -> email = $_POST['email'];
            $user -> password = $_POST['password'];

            if($user->store()) {
                redirect('/');
            } else {
                echo "There was an error";
            }
        }

        // GET METHOD
        public function showProfile() {
            $userId = $_SESSION['user_id'];
            
            $data = [
                'title' => "Profile",
            ];

            render('admin/users/profile', $data, 'layouts/admin_layout');
        }

        // GET METHOD
        public function showLoginForm() {
            render('user/login');
        }
        // POST METHOD
        public function login() {
            $this->userModel->email = $_POST['email'];
            $this->userModel->password = $_POST['password'];

            if($this->userModel->login()) {
                $_SESSION['user_id'] = $this-> userModel -> id;
                $_SESSION['username'] = $this-> userModel -> username;
                $_SESSION['first_name'] = $this-> userModel -> first_name;
                $_SESSION['last_name'] = $this-> userModel -> last_name;

                redirect('/dashboard');
            } else {
                echo "There was an error";
            }
        }

        // POST METHOD
        public function logout() {
            $_session = [];
            session_destroy();
            redirect('user/login');
        }
    }
?>