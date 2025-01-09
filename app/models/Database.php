<?php 
    class Database {
        private static $instance = null;
        private $connection;

        public function __construct() {

            $host       =   config('database.host');
            $dbName     =   config('database.database');
            $username   =   config('database.username');
            $password   =   config('database.password');
            $port       =   config('database.port');
            $charset    =   config('database.charset');

            $dsn = "mysql:host={$host};dbname={$dbName};charset={$charset};port={$port}";

            try {
                $this->connection = new PDO($dsn, $username, $password);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Database failed: " . $e->getMessage());
            }
        }

        // Initialize the new instance
        public static function getInstance() {
            if(self::$instance == null ) {
                self::$instance = new Database();
            }
            return self::$instance;
        }

        public function getConnection() {
            return $this->connection;
        }

        private function __clone() {

        }

        public function __wakeup() {

        }
    }
?>