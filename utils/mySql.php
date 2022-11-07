<?php
    class mySql{
        private $hostname;
        private $username;
        private $password;
        private $dbname;
        public function __construct($hostname,$dbname,$username,$password)
        {
            $this->hostname = $hostname;
            $this->dbname = $dbname;
            $this->username = $username;
            $this->password = $password;
        }
        public function getConnect(){
            try {
                $conn = new PDO("mysql:host=$this->hostname;dbname=$this->dbname", $this->username, $this->password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "Connected successfully";
                return $conn;
              } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
              }
        }
    }

?>