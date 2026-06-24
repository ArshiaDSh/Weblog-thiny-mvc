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
                    <div class="col-12">
                        <div class="card mb-4 ">
                            <div class="d-flex">
                                <div class="icon icon-shape icon-lg bg-gradient-success shadow text-center border-radius-xl mt-n3 ms-4">
                                    <i class="fa fa-list" aria-hidden="true"></i>
                                    <i class="fa fa-plus fs-6" aria-hidden="true"></i>
                                </div>
                                <h6 class="mt-3 mb-2 ms-3 ">Add menus</h6>
                            </div>
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <form action="<?= url("admin/menu/create/store") ?>" method="POST">
                                            <div class="form-group mb-2">
                                                <label for="exampleFormControlInput1">Menu name</label>
                                                <input type="text" class="form-control alert-light p-3" name="menu-name" required id="exampleFormControlInput1" placeholder="Menu name" autofocus>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="exampleFormControlInput1">Menu URL</label>
                                                <input type="text" class="form-control alert-light p-3" name="menu-url" required id="exampleFormControlInput1" placeholder="Menu name" autofocus>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="exampleFormControlInput1">Parent menu</label>
                                                <select name="parent" class="form-control alert-light p-3">
                                                    <option value="" selected></option>
                                                    <?php foreach ($menus as $menu) { ?>
                                                        <option value="<?=$menu['id']?>"><?=$menu['name']?></option>
                                                    <?php } ?>
                                                </select>
                                                <!-- <input type="text" class="form-control alert-light p-3" name="menu-url" required id="exampleFormControlInput1" placeholder="Menu name" autofocus> -->
                                            </div>
                                            <button type="submit" class="btn btn-success mt-4">Add menu</button>
                                        </form>
                                    </div>
                                    <div class="col-lg-6 col-md-5">
                                        <div id="map" class="mt-0 mt-lg-n4"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <?php require BASE_PATH . "/template/admin/layouts/footer.php"; ?>
        </div>
    </main>
</body>

</html>