<div id="focusContainer">
    <div id="registerContainer">
        <form id="loginForm" action="index.php" method="POST" style="display:none;">
            <h2>Login to your account:</h2>
            <p>
                <?php echo $account->getError(Constants::$loginFailed); ?>
                <label for="loginUsername">Username: </label>
                <input id="loginUsername" name="loginUsername" type="text" value="<?php getInputValue('loginUsername'); ?>" required />
            </p>
            <p>
                <label for="loginPassword">Password: </label>
                <input id="loginPassword" name="loginPassword" type="password" required />
            </p>

            <button type="submit" name="loginButton">Login</button>
            <p>Don't have an account yet? Click <a onclick="showRegisterForm()">here</a></p>

            <div id="AdView">
                <h2>Get great music, right now</h2>
                <ul>
                    <li>Discover music you'll fall in love with</li>
                    <li>Create your own playlists</li>
                    <li>Follow artists to keep up to date</li>
                </ul>
            </div>
        </form>


        <form id="registerForm" action="index.php" method="POST" style="display:none;">
            <h2>Create your free account:</h2>
            <p>
                <?php echo $account->getError(Constants::$usernameCharacters); ?>
                <?php echo $account->getError(Constants::$usernameTaken); ?>
                <label for="registerUsername">Username: </label>
                <input id="registerUsername" name="registerUsername" type="text" value="<?php getInputValue('registerUsername'); ?>" required />
            </p>
            <p>
                <?php echo $account->getError(Constants::$firstnameCharacters); ?>
                <label for="registerFirstName">First name: </label>
                <input id="registerFirstName" name="registerFirstName" type="text" value="<?php getInputValue('registerFirstName'); ?>" required />
            </p>
            <p>
                <?php echo $account->getError(Constants::$lastnameCharacters); ?>
                <label for="registerLastName">Last name: </label>
                <input id="registerLastName" name="registerLastName" type="text" value="<?php getInputValue('registerLastName'); ?>" required />
            </p>

            <p>
                <?php echo $account->getError(Constants::$emailsDontMatch); ?>
                <?php echo $account->getError(Constants::$emailInvalid); ?>
                <?php echo $account->getError(Constants::$emailTaken); ?>
                <label for="registerEmail">Email: </label>
                <input id="registerEmail" name="registerEmail" type="email" value="<?php getInputValue('registerEmail'); ?>" required />
            </p>
            <p>
                <label for="registerEmailConfirm">Confirm email: </label>
                <input id="registerEmailConfirm" name="registerEmailConfirm" type="email" value="<?php getInputValue('registerEmailConfirm'); ?>" required />
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
            <p>If you want to login click <a onclick="showLoginForm()">here</a></p>
        </form>
    </div>
</div>