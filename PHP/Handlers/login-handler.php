<?php

    if(isset($_POST['loginButton'])){
        //Check login
        $username = $_POST['loginUsername'];
        $password = $_POST['loginPassword'];

        // login function
        $result = $account->login($username, $password);

        if($result) {
            $_SESSION['user'] = $username;
            header("location: index.php");
        } else {
            echo "error";
        }
    }

?>