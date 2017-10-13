<?php
    include_once($_SERVER['DOCUMENT_ROOT'] . "/Courses/MusicStreaming/PHP/Config.php");

    include_once($_SERVER['DOCUMENT_ROOT'] . "/Courses/MusicStreaming/PHP/Classes/Account.php");
    include_once($_SERVER['DOCUMENT_ROOT'] . "/Courses/MusicStreaming/PHP/Classes/Constants.php");

    $account = new Account($con);

    include_once($_SERVER['DOCUMENT_ROOT'] . "/Courses/MusicStreaming/PHP/Handlers/register-handler.php");
    include_once($_SERVER['DOCUMENT_ROOT'] . "/Courses/MusicStreaming/PHP/Handlers/login-handler.php");

    if(isset($_POST['registerButton'])){
        global $account;
        if(empty($account)){
            $account = new Account();
        }

        checkRegistration($account);
    }

    function getInputValue($name){
        if(isset($_POST[$name])){
            echo $_POST[$name];
        }
    }

    if(isset($_SESSION['user'])){
        setcookie("userLoggedIn", $_SESSION['user'], time() + 60);
        $_COOKIE['userLoggedIn'] = $_SESSION['user'];
        $userLoggedIn = $_SESSION['user'];
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Kyrans Music Player</title>

        <link rel="stylesheet" type="text/css" href="Style/Register.css">
        <link rel="stylesheet" type="text/css" href="Style/Theme.css">

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="JS/Includes/js.cookie.js"></script>
    </head>
    <body>
        <?php include("Templates/Register.php"); ?>
    </body>
    <script>
        $(document).ready(function(){
            if(Cookies.get("userLoggedIn").length > 4){
                document.querySelector("#focusContainer").style.display = "none";
                Cookies.remove("userLoggedIn");
            }
        });

        function showLoginForm(){
            document.querySelector("#loginForm").style.display = "block";
            document.querySelector("#registerForm").style.display = "none";
        }

        function showRegisterForm() {
            document.querySelector("#loginForm").style.display = "none";
            document.querySelector("#registerForm").style.display = "block";
        }
    </script>
</html>