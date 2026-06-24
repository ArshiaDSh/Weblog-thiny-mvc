<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <?php require "layouts/head.php" ?>
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('<?= asset("public/auth/images/bg-01.jpg") ?>');">
            <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
                <form class="login100-form validate-form flex-sb flex-w" method="POST" action="<?= url("register/store") ?>">
                    <span class="login100-form-title p-b-30">
                        sing up
                    </span>

                    <div class="p-t-31 p-b-9">
                        <span class="txt1">
                            Username
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input <?= flash('username_validation') ? 'alert-validate' : '' ?>" data-validate="<?= flash('username_validation') ?>">
                        <input class="input100" type="text" name="username">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="p-t-31 p-b-9">
                        <span class="txt1">
                            Email
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input <?= flash('email_validation') ? 'alert-validate' : '' ?>" data-validate="<?= flash('email_validation') ?>">
                        <input class="input100" type="email" name="email">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="p-t-13 p-b-9">
                        <span class="txt1">
                            Password
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input <?= flash('password_validation') ? 'alert-validate' : '' ?>" data-validate="<?= flash('password_validation') ?>">
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="p-t-13 p-b-9">
                        <span class="txt1">
                            Password confirm
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input <?= flash('match_password_validation') ? 'alert-validate' : '' ?>" data-validate="<?= flash('match_password_validation') ?>">
                        <input class="input100" type="password" name="password-confirm">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-login100-form-btn m-t-17">
                        <button class="login100-form-btn" type="submit">
                            Sing up
                        </button>
                    </div>

                    <div class="w-full text-center p-t-55">
                        <span class="txt2">
                            have an account?
                        </span>

                        <a href="<?= url("login") ?>" class="txt2 bo1">
                            Sign in now
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>



</body>
<?php require "layouts/scripts.php" ?>

</html>