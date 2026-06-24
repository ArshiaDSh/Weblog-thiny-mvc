<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require BASE_PATH . "/template/admin/layouts/head.php";
    ?>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <?php require BASE_PATH . "/template/admin/layouts/aside.php" ?>

    <main class="main-content border-radius-lg ">
        <?php require BASE_PATH . "/template/admin/layouts/navbar.php"; ?>
        <div class="container-fluid py-4">
            <div class="row">

                <div class="row mt-4">
                    <div class="d-flex mb-3">
                        <div class="icon icon-shape icon-lg bg-gradient-success shadow text-center border-radius-xl mt-n3 ms-4">
                            <i class="fa fa-folder-open" aria-hidden="true"></i>
                        </div>
                        <h6 class="mt-3 mb-2 ms-3 ">Categories</h6>
                    </div>
                    <div class="col-12">
                        <form action="<?= url("admin/category/create/store") ?>" method="POST">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Cetgory name</label>
                                <input type="text" class="form-control alert-light p-3" name="cat-name" id="exampleFormControlInput1" placeholder="Cetgory name" autofocus>
                            </div>
                            <button type="submit" class="btn btn-success mt-4">Add category</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php require BASE_PATH . "/template/admin/layouts/footer.php"; ?>
        </div>
    </main>
</body>

</html>