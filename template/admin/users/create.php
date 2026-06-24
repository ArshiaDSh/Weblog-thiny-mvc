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
                                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                                </div>
                                <h6 class="mt-3 mb-2 ms-3 ">Add user</h6>
                            </div>
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="table-responsive">
                                            <form action="<?= url("admin/user/create/store") ?>" method="POST">
                                                <div class="form-group col-md-12 mb-2">
                                                    <label for="inputEmail4">Username</label>
                                                    <input type="text" class="form-control p-3 alert-light" id="inputEmail4" required placeholder="username" name="username" autofocus>
                                                </div>
                                                <div class="form-group col-md-12 mb-2">
                                                    <label for="inputPassword4">Password</label>
                                                    <input type="password" class="form-control p-3 alert-light" id="inputPassword4" required placeholder="Password" name="password">

                                                </div>
                                                <div class="form-row d-flex justify-content-between">
                                                    <div class="form-group col-md-5 mb-2">
                                                        <label for="inputCity">Email</label>
                                                        <input type="email" class="form-control p-3 alert-light" id="inputEmail" required name="email" placeholder="email">
                                                    </div>
                                                    <div class="form-group col-md-6 mb-2">
                                                        <label for="inputPer">Premission</label>
                                                        <select required id="inputPer" class="form-control p-3 alert-light ml-2" name="premission">
                                                            <option value="user" selected>user</option>
                                                            <option value="admin">admin</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary mt-4">Add user</button>
                                            </form>
                                        </div>
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