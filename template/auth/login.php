<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <?php require "layouts/head.php" ?>
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('<?= asset("public/auth/images/bg-01.jpg") ?>');">
            <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
                <form class="login100-form validate-form flex-sb flex-w" method="POST" action="<?= url("check-admin") ?>">
                    <span class="login100-form-title p-b-30">
                        Sing in
                    </span>
                    <?php if (flash("login_validate") != null) { ?>
                        <span class="alert alert-danger col-12"><?=flash("login_validate")?></span>
                    <?php } ?>
                    <div class="p-t-31 p-b-9">
                        <span class="txt1">
                            Email
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input <?= flash('login_email_validate') ? 'alert-validate' : '' ?>" data-validate="<?= flash('login_email_validate') ?>">
                        <input class="input100" type="email" name="email" required>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="p-t-13 p-b-9">
                        <span class="txt1">
                            Password
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input <?= flash('login_password_validate') ? 'alert-validate' : '' ?>" data-validate="<?= flash('login_password_validate') ?>">
                        <input class="input100" type="password" name="password" required>
                        <span class="focus-input100"></span>
                    </div>


                    <div class="container-login100-form-btn m-t-17">
                        <button class="login100-form-btn" type="submit">
                            Sing in
                        </button>
                    </div>

                    <div class="w-full text-center p-t-55">
                        <span class="txt2">
                            Don't you have an account?
                        </span>

                        <a href="<?=url("register")?>" class="txt2 bo1">
                            Sign up now
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