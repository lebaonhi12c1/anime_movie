<?php
    include '../model/user_model.php';
    include '../utils/mySql.php';
    $conn = new mySql('localhost','anime_movie','root','');
    $conned = $conn->getConnect();
    if($_POST['signup_email']){
        $newUser = new user($_POST['signup_email'],$_POST['signup_password']);
        try {
            $sql = "INSERT INTO user (email, password) VALUES (?,?)";
            $stmt= $conned->prepare($sql);
            $stmt->execute([$newUser->getEmail(), md5( $newUser->getpassword())]);
            echo "New record created successfully";
        } catch (PDOException $e) {
           echo $sql . "<br>" . $e->getMessage();
        }
    }
?>      