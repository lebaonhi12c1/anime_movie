<?php
    include '/wamp/www/anime_movie/model/user_model.php';
    include '/wamp/www/anime_movie/utils/mySql.php';
    $users = new user(null,null,0);
    $userArray = $users->getAlluser();
    if(isset($_POST['signup_email'])){
        if($_POST['signup_password'] != $_POST['signup_pre_password']){
            echo "not match !!";
            header("Location: http://localhost/anime_movie/signup.php");
        }else{
            try {
                $user = new user($_POST['signup_email'],md5($_POST['signup_password']),0);
                $user->getInsert();
                header("Location: http://localhost/anime_movie/login.php");
            } catch (\Throwable $th) {
                echo $th;
            }
        }
    }
    if(isset($_POST['user_email_login'])){
        try {
            $user = new user($_POST['user_email_login'],$_POST['user_password_login'],0);
            $dbuser = $user->getUser();
            if(!isset($dbuser)){
                echo 'user not found!! ';
                header("Location: http://localhost/anime_movie/login.php");
            }
            elseif(md5($user->user_password) == $dbuser['password']){
                echo 'login successfully !!';
                if($dbuser['isAdmin'] == '1'){
                    header("Location: http://localhost/anime_movie/sneat-1.0.0/html/index.html");
                    session_start();
                    $_SESSION['user'] = $user;
                    var_dump($_SESSION);
                   
                }
                else{
                    header("Location: http://localhost/anime_movie/index.php");
                    session_start();
                    $_SESSION['user'] = $user;
                    var_dump($_SESSION);
                }
                
            }
            else{
                echo 'wrong password !!!';
                header("Location: http://localhost/anime_movie/login.php");
            }
        } catch (Throwable $th) {
            echo 'select fail !!';
        }
    }
    if(isset($_POST['admin_create_email'])){
        if($_POST['admin_create_password'] == $_POST['admin_create_prepassword']){
            $user = new user($_POST['admin_create_email'],md5($_POST['admin_create_password']),isset($_POST['admin_create_isadmin'])?1:0);
            $user->getInsert();
            header('Location: http://localhost/anime_movie/sneat-1.0.0/html/manager_user.php');
        }
    }
    if(isset($_GET['delete'])){
        $userDelete = new user($_GET['delete'],null,0);
        $userDelete->getDeleteUser();
        header('Location: http://localhost/anime_movie/sneat-1.0.0/html/manager_user.php');
    }
?>
