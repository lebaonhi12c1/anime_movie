<?php
    include '../model/user_model.php';

    $conn = new mysqli('localhost','root','','db_anime_movie');
    if($conn->connect_error){
        die("Connecttion fail".$conn->connect_error);
    }
    else{
        echo 'connect success';
    }
    var_dump($_POST);
    $adduser = 'INSERT INTO user (useremail,userpassword) VALUES ("'.$_POST['signup_email'].'","'.$_POST['signup_password'].'")';
    if($conn->query($adduser)==true){
        die(
            $conn->connect_error
        );
    }
    echo "insert success"
?>      