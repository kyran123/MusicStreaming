<?php
    include("PHP/Classes/Account.php");
    include("PHP/Classes/Constants.php");
    //Create new Account Class object
    $account = new Account();
    include("PHP/Handlers/register-handler.php");
    include("PHP/Handlers/login-handler.php");
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