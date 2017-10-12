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
       $userLoggedIn = $_SESSION['user'];
    } else {
        //Pop up Register / login pop up!
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kyrans Music Player</title>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <?php include("Templates/Register.php"); ?>
</body>
</html>