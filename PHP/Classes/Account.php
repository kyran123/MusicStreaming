<?php
    class Account {

        private $errorArray;
        private $con;

        public function __construct($con){
            $this->errorArray = array();
            $this->con = $con;
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
                return $this->insertUserDetails($username, $firstName, $lastName, $email, $password);
            } else {
                return false;
            }
        }

        public function login($username, $password){
            $encryptedPw = md5($password);

            $result = mysqli_query($this->con, "SELECT * FROM users WHERE username='$username' AND password='$encryptedPw'");

            if(mysqli_num_rows($result) == 1){
                return true;
            } else {
                array_push($this->errorArray, Constants::$loginFailed);
                return false;
            }
        }

        public function getError($error) {
            if(!in_array($error, $this->errorArray)){
                $error = "";
            }
            return "<span class='errorMessage'>$error</span>";
        }

        private function insertUserDetails($username, $firstName, $lastName, $email, $password){
            $encryptedPw = md5($password);
            $profilePic = "Assets/Image/ProfilePics/head_emerald.png";
            $date = date("Y-m-d");

            $result = mysqli_query($this->con, "INSERT INTO users (`username`, `firstname`, `lastname`, `email`, `password`, `signUpDate`, `profilePic`) VALUES ('$username', '$firstName', '$lastName', '$email', '$encryptedPw', '$date', '$profilePic')");

            return $result;
        }

        private function validateUsername($username){
            if(strlen($username) < 5 || strlen($username) > 25) {
                array_push($this->errorArray, Constants::$usernameCharacters);
                return;
            }

            $checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username='$username'");
            if(mysqli_num_rows($checkUsernameQuery) != 0){
                array_push($this->errorArray, Constants::$usernameTaken);
                return;
            }
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

            $checkEmailQuery = mysqli_query($this->con, "SELECT email FROM users WHERE email='$email'");
            if(mysqli_num_rows($checkEmailQuery) != 0){
                array_push($this->errorArray, Constants::$emailTaken);
                return;
            }
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