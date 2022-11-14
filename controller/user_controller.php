<?php
    include '../model/user_model.php';
    include '../utils/mySql.php';
    if(isset($_POST['signup_email'])){
           
    }
    if(isset($_POST['user_email_login'])){
        $conn = new mySql('localhost','anime_movie','root','');
        $conned = $conn->getConnect();
        $loginUser = new user($_POST['user_email_login'],$_POST['user_password_login']);
        try {
            $query = "SELECT * FROM user WHERE username = :username";
            $stmt = $conned ->prepare($query);
            $stmt ->execute([$loginUser->getEmail()]);
            $user = $stmt ->fetch();
            var_dump($user);
        } catch (Throwable $th) {
            echo 'select fail !!';
        }
    }
