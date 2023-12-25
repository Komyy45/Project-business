<?php

    $db = new PDO("mysql: host=localhost; dbname=products;" , "root" , "");

    
    if(isset($_POST['send'])){

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $check = $db->prepare("SELECT * FROM customer WHERE  email='$email'");
        $check->execute();
        $rowCount = $check->rowCount();



        if($rowCount == 0){
        $sql = $db->prepare("INSERT INTO customer(username , email , password) VALUES('$username' , '$email' , '$password')");
        $sql->execute();
        session_start();
        $_SESSION['username'] = $username; 
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        header("location: ../mainpage.html"); 
        }
        else{
            echo <<<here
                <div class="alert alert-danger" role="alert">
                Sorry, This user already exists.
                </div>
            here;
        }
    }






    if(isset($_GET['login'])){

        
        
        $emailCheck = $_GET['email'];
        $passwordCheck = $_GET['password'];
        
        $login = $db->prepare("SELECT * FROM customer WHERE  email='$emailCheck' AND password='$passwordCheck' ");
        $login->execute();
        $rowCount = $login->rowCount();
        
        if($rowCount > 0){
            session_start();
            $_SESSION['email'] = $emailCheck;
            $_SESSION['password'] = $passwordCheck;
            header("location: ../mainpage.html"); 
            }
            else{
                echo <<<here
                    <div class="alert alert-danger" role="alert">
                    Sorry, This user doesn't exist please sign in first.
                    </div>
                here;
            }


    }
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="master.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="website icon" type="png" href="./pngtree-shop-logo-design-with-a-handshake-in-bag-png-image_4749125.png">
    <link rel="stylesheet" href="all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
    <div class="regiteration">
        <form action="" class="login" id="login" method="GET">
            <h2 class="title">sign in</h2>
            <div class="socials">
                <p><i class='bx bxl-facebook'></i></p>
                <p><i class='bx bxl-google-plus' ></i></p>
                <p><i class='bx bxl-linkedin' ></i></p>
            </div>
            <p>or use your accounts</p>
            <input type="email" name="email" placeholder="email">
            <input type="password" name="password" placeholder="password">
            <p>forgot password?</p>
            <div class="confirm">
                <button type="submit" id="worng" name="login">sign in</button>
            </div>
        </form>




        <div class="layout" id="layout">
            <div class="login" id="log">
                <h2>Welcome back</h2>
                <p>to   keep connected with us please login with your personal info</p>    
                <button id="right">sign in</button>
            </div>


            <div class="signup" id="sign">
                <h2>hello ,friend!</h2>
                <p>enter your personal details to start the journey</p>    
                <button id="left">sign up</button>
            </div>

        </div>





        <form action=""  class="signup" id="sign-up" method="POST">
            <h2 class="title">create account</h2>

            <div class="socials">
                <p><i class='bx bxl-facebook'></i></p>
                <p><i class='bx bxl-google-plus' ></i></p>
                <p><i class='bx bxl-linkedin' ></i></p>
            </div>

            <p>or use your email for registeration</p>
            <input type="email" name="email" placeholder="email" id="email">
            <input type="text" name="username" placeholder="username" id="username"/>

            <input type="password" name="password" placeholder="password" id="password"/>
<div class="confirm">
    
                <button type="submit" id="wrong" name="send">sign up</button>
</div>
        </form>
    </div>

    
</body>
<script src="main.js"></script>
</html>