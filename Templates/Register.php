<?php
    include_once($_SERVER['DOCUMENT_ROOT'] . "/Courses/MusicStreaming/PHP/Classes/Account.php");
    include_once($_SERVER['DOCUMENT_ROOT'] . "/Courses/MusicStreaming/PHP/Handlers/register-handler.php");
    include_once($_SERVER['DOCUMENT_ROOT'] . "/Courses/MusicStreaming/PHP/Handlers/login-handler.php");

    if(isset($_POST['registerButton'])){
        global $account;
        if(empty($account)){
            $account = new Account();
        }

        checkRegistration($account);
    }
?>

<div id="registerContainer">
    <form id="loginForm" action="./Register.php" method="POST">
        <h2>Login to your account:</h2>
        <p>
            <label for="loginUsername">Username: </label>
            <input id="loginUsername" name="loginUsername" type="text" placeholder="Username" required />
        </p>
        <p>
            <label for="loginPassword">Password: </label>
            <input id="loginPassword" name="loginPassword" type="password" placeholder="Password" required />
        </p>

        <button type="submit" name="loginButton">Login</button>
    </form>


    <form id="registerForm" action="./Register.php" method="POST">
        <h2>Create your free account:</h2>
        <p>
            <?php echo $account->getError(Constants::$usernameCharacters); ?>
            <label for="registerUsername">Username: </label>
            <input id="registerUsername" name="registerUsername" type="text" required />
        </p>
        <p>
            <?php echo $account->getError(Constants::$firstnameCharacters); ?>
            <label for="registerFirstName">First name: </label>
            <input id="registerFirstName" name="registerFirstName" type="text" required />
        </p>
        <p>
            <?php echo $account->getError(Constants::$lastnameCharacters); ?>
            <label for="registerLastName">Last name: </label>
            <input id="registerLastName" name="registerLastName" type="text" required />
        </p>

        <p>
            <?php echo $account->getError(Constants::$emailsDontMatch); ?>
            <?php echo $account->getError(Constants::$emailInvalid); ?>
            <label for="registerEmail">Email: </label>
            <input id="registerEmail" name="registerEmail" type="email" required />
        </p>
        <p>
            <label for="registerEmailConfirm">Confirm email: </label>
            <input id="registerEmailConfirm" name="registerEmailConfirm" type="email" required />
        </p>

        <p>
            <?php echo $account->getError(Constants::$passwordDoNotMatch); ?>
            <?php echo $account->getError(Constants::$passwordCharacters); ?>
            <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
            <label for="registerPassword">Password: </label>
            <input id="registerPassword" name="registerPassword" type="password" required />
        </p>
        <p>
            <label for="registerPasswordConfirm">Confirm password: </label>
            <input id="registerPasswordConfirm" name="registerPasswordConfirm" type="password" required />
        </p>

        <button type="submit" name="registerButton">SIGN UP</button>
    </form>
</div>