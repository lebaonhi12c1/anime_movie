<?php
    
    class user
    {
        public $user_password;
        public $user_email;
        public function __construct($useremail,$password)
        {
            $this->user_email = $useremail;
            $this->user_password = $password;
        }
        public function setpassword($value){
            $this->user_password = $value;
        }
        public function setEmail($value){
            $this->user_email = $value;
        }
        public function getpassword(){
            return $this->user_password;
        }
        public function getEmail(){
            return $this->user_email;
        }
    }
    
?>