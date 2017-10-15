<?php

    function sanitizeForm($inputText, $bool) {
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ", "", $inputText);
        if($bool === true){
            $inputText = ucfirst(strtolower($inputText));
        }
        return $inputText;
    }

   function checkRegistration($account){
        if($account === null){
            echo "error0!";
        }

        //Get and clean USERNAME variable
        $username = sanitizeForm($_POST['registerUsername'], false);
        //get and clean FIRSTNAME variable
        $firstName = sanitizeForm($_POST['registerFirstName'], true);
        //get and clean LASTNAME variable
        $lastName = sanitizeForm($_POST['registerLastName'], true);
        //get and clean EMAIL variable
        $email = sanitizeForm($_POST['registerEmail'], false);
        $email2 = sanitizeForm($_POST['registerEmailConfirm'], false);
        //get and clean PASSWORD variable
        $password = sanitizeForm($_POST['registerPassword'], false);
        $password2 = sanitizeForm($_POST['registerPasswordConfirm'], false);

        //Call register function and store result
        $result = $account->register($username, $firstName, $lastName, $email, $email2, $password, $password2);

        if($result){
            //Take to index page
            $_SESSION['user'] = $username;
            header("Location: index.php");
        }
    }
?>