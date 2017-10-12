<?php
    class Account {

        private $errorArray;

        public function __construct(){
            $this->errorArray = array();
        }

        public function register($username, $firstName, $lastName, $email, $email2, $password, $password2){
            //Check if username is correct
            $this->validateUsername($username);
            //Check if firstname is correct
            $this->validateFirstname($firstName);
            //Check if lastname is correct
            $this->validateLastname($lastName);
            //Check if Email is correct
            $this->validateEmail($email, $email2);
            //Check if Password is correct
            $this->validatePassword($password, $password2);

            if(empty($this->errorArray)){
                //TODO: Insert into DB
                return true;
            } else {
                return false;
            }
        }

        public function getError($error) {
            if(!in_array($error, $this->errorArray)){
                $error = "";
            }
            return "<span class='errorMessage'>$error</span>";
        }

        private function validateUsername($username){
            if(strlen($username) < 5 || strlen($username) > 25) {
                array_push($this->errorArray, Constants::$usernameCharacters);
                return;
            }

            //TODO: Check if user already exists
        }

        private function validateFirstname($firstname){
            if(strlen($firstname) < 2 || strlen($firstname) > 25) {
                array_push($this->errorArray, Constants::$firstnameCharacters);
                return;
            }
        }

        private function validateLastname($lastname){
            if(strlen($lastname) < 2 || strlen($lastname) > 25) {
                array_push($this->errorArray, Constants::$lastnameCharacters);
                return;
            }
        }

        private function validateEmail($email, $email2){
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                array_push($this->errorArray, Constants::$emailInvalid);
                return;
            }

            if($email != $email2){
                array_push($this->errorArray, Constants::$emailsDontMatch);
                return;
            }

            //TODO: check if email already exists
        }

        private function validatePassword($password, $password2){
            if($password != $password2){
                array_push($this->errorArray, Constants::$passwordDoNotMatch);
                return;
            }

            if(strlen($password) < 5 || strlen($password) > 30) {
                array_push($this->errorArray, Constants::$passwordCharacters);
                return;
            }

            if(preg_match('/[^A-Za-z0-9]/', $password)){
                array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
                return;
            }
        }
    }
?>