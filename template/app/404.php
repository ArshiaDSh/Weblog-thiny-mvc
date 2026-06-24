<!DOCTYPE html>
<html lang="en">

<head>
    <?php require BASE_PATH . "/template/app/layouts/head.php"; ?>
    <title>salap</title>
</head>

<body>
    <? require BASE_PATH . "/template/app/layouts/header.php"; ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="error-wrap">
                    <div class="error-title">
                        404 • Page not found
                    </div>
                    <p class="fs-15">
                        Oops! The page you are looking for does not exist. It might have
                        been moved or deleted. Try a search below...
                    </p>
                </div>
            </div>
        </div>
    </div>
    <? require BASE_PATH . "/template/app/layouts/footer.php"; ?>

</body>
<?php require BASE_PATH . "/template/app/layouts/scripts.php"; ?>

</html>