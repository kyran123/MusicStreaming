<?php

    function sanitizeForm($inputText, $bool) {
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ", "", $inputText);
        if($bool === true){
            $inputText = ucfirst(strtolower($inputText));
        }
        return $inputText;
    }

    if(isset($_POST['registerButton'])){
        include("../Classes/Account.php");
        //Create new Account Class object
        $account = new Account();

        if(
            $_POST['registerEmail'] == $_POST['registerEmailConfirm'] ||
            $_POST['registerPassword'] == $_POST['registerPasswordConfirm']
        ){
            //Get and clean USERNAME variable
            $username = sanitizeForm($_POST['registerUsername'], false);
            //get and clean FIRSTNAME variable
            $firstName = sanitizeForm($_POST['registerFirstName'], true);
            //get and clean LASTNAME variable
            $lastName = sanitizeForm($_POST['registerLastName'], true);
            //get and clean EMAIL variable
            $email = sanitizeForm($_POST['registerEmail'], false);
            //get and clean PASSWORD variable
            $password = sanitizeForm($_POST['registerPassword'], false);

            //Call register function and store result
            $result = $account->register($username, $firstName, $lastName, $email, $password);

            if($result){
                //Take to index page
                header("Location: ../../index.php");
            } else {
                header("Location: ../../index.php");
            }
        }
    }
?>