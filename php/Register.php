<?php
if(isset($_POST['loginButton'])){

}
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login to Kyrans Music Player</title>
    </head>
    <body>

        <div id="registerContainer">
            <form id="loginForm" action="register.php" method="POST">
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


            <form id="registerForm" action="register.php" method="POST">
                <h2>Create your free account:</h2>
                <p>
                    <label for="registerUsername">Username: </label>
                    <input id="registerUsername" name="registerUsername" type="text" required />
                </p>
                <p>
                    <label for="registerFirstName">First name: </label>
                    <input id="registerFirstName" name="registerFirstName" type="text" required />
                </p>
                <p>
                    <label for="registerLastName">Last name: </label>
                    <input id="registerLastName" name="registerLastName" type="text" required />
                </p>

                <p>
                    <label for="registerEmail">Email: </label>
                    <input id="registerEmail" name="registerEmail" type="email" required />
                </p>
                <p>
                    <label for="registerEmailConfirm">Confirm email: </label>
                    <input id="registerEmailConfirm" name="registerEmailConfirm" type="email" required />
                </p>

                <p>
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

    </body>
</html>