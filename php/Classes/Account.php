<?php
    class Account {

        private $errorArray;

        public function __construct(){
            $this->errorArray = array();
        }

        public function register($username, $firstName, $lastName, $email, $password){
            //Check if username is correct
            $this->validateUsername($username);
            //Check if firstname is correct
            $this->validateFirstname($firstName);
            //Check if lastname is correct
            $this->validateLastname($lastName);
            //Check if Email is correct
            $this->validateEmail($email);
            //Check if Password is correct
            $this->validatePassword($password);
        }

        private function validateUsername($username){
            if(strlen($username) < 5 || strlen($username) > 25) {
                array_push($this->errorArray, "Your username must be between 5 and 25 characters!");
                return;
            }

            //TODO: Check if user already exists
        }

        private function validateFirstname($firstname){
            if(strlen($firstname) < 2 || strlen($firstname) > 25) {
                array_push($this->errorArray, "Your first name must be between 2 and 25 characters!");
                return;
            }
        }

        private function validateLastname($lastname){
            if(strlen($lastname) < 2 || strlen($lastname) > 25) {
                array_push($this->errorArray, "Your last name must be between 2 and 25 characters!");
                return;
            }
        }

        private function validateEmail($email){
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                array_push($this->errorArray, "Email is invalid");
                return;
            }

            //TODO: check if email already exists
        }

        private function validatePassword($password){
            if(strlen($password) < 5 || strlen($password) > 30) {
                array_push($this->errorArray, "Your password must be between 5 and 25 characters!");
                return;
            }

            if(preg_match('/[^A-Za-z0-9]/', $password)){
                array_push($this->errorArray, "Password is invalid, can only contain letters and numbers");
                return;
            }
        }
    }
?>