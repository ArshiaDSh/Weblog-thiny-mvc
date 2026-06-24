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
                                    <i class="fa fa-user-edit" aria-hidden="true"></i>
                                </div>
                                <h6 class="mt-3 mb-2 ms-3 ">Edit users</h6>
                            </div>
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <form method="POST" action="<?= url("admin/user/update/" . $edit_user['id']) ?>">
                                            <div class="table-responsive">
                                                <table class="table align-items-center ">
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center">
                                                                <div class="text-center">
                                                                    <h6 class="text-xs font-weight-bold mb-0 ">#</h6>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="text-center">
                                                                    <h6 class="text-xs font-weight-bold mb-0 ">Usrename:</h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="text-center">
                                                                    <h6 class="text-xs font-weight-bold mb-0 ">email:</h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="text-center">
                                                                    <h6 class="text-xs font-weight-bold mb-0">Premission:</h6>
                                                                </div>
                                                            </td>
                                                            <td class="align-middle text-sm">
                                                                <div class="col text-center">
                                                                    <h6 class="text-xs font-weight-bold mb-0 ">Created at:</h6>
                                                                </div>
                                                            </td>
                                                            <td class="align-middle text-sm">
                                                                <div class="col text-center">
                                                                    <h6 class="text-xs font-weight-bold mb-0 ">Edit:</h6>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">
                                                                <div class="col text-center">
                                                                    <h6 class="text-sm font-weight-normal mb-0 ">#</h6>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="col text-center">
                                                                    <input type="text" class="form-control alert-light col-7 p-2" placeholder="username" value="<?= $edit_user['username'] ?>" name="username" autofocus>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="text-center">
                                                                    <input type="text" class="form-control alert-light col-7 p-2" placeholder="email" value="<?= $edit_user['email'] ?>" name="email">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="text-center">
                                                                    <select name="permission" class="form-control alert-light col-7 p-2">
                                                                        <option <?php if ($edit_user['permission'] == "ademin") {
                                                                                    echo "selected";
                                                                                } ?> value="admin">admin</option>
                                                                        <option <?php if ($edit_user['permission'] == "user") {
                                                                                    echo "selected";
                                                                                } ?> value="user">user</option>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                            <td class="align-middle text-sm">
                                                                <div class="col text-center">
                                                                    <h6 class="text-sm font-weight-normal mb-0 ">20 nov 22</h6>
                                                                </div>
                                                            </td>
                                                            <td class="align-middle text-sm">
                                                                <div class="col text-center">
                                                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
                                                                    <a href="<?= url("admin/user") ?>" class="btn btn-danger" onclick="return confirm('Are you sure? all changes will be elmenated');"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php $counter = 0;
                                                        foreach ($users as $user) {
                                                            $counter++; ?>
                                                            <tr>
                                                                <td class="text-center">
                                                                    <div class="col text-center">
                                                                        <h6 class="text-sm font-weight-normal mb-0 "><?= $counter ?></h6>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center">
                                                                    <div class="col text-center">
                                                                        <h6 class="text-sm font-weight-normal mb-0 "><?= $user['username'] ?></h6>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="text-center">
                                                                        <h6 class="text-sm font-weight-normal mb-0 "><?= $user['email'] ?></h6>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="text-center">
                                                                        <?php if ($user['permission'] == "admin") { ?>
                                                                            <h6 class="text-sm font-weight-normal mb-0 text-info">Admin</h6>
                                                                        <?php } else { ?>
                                                                            <h6 class="text-sm font-weight-normal mb-0 text-warning">user</h6>
                                                                        <?php } ?>
                                                                    </div>
                                                                </td>
                                                                <td class="align-middle text-sm">
                                                                    <div class="col text-center">
                                                                        <h6 class="text-sm font-weight-normal mb-0 ">
                                                                            <?= date("y", strtotime($user['created_at'])) . date("M", strtotime($user['created_at'])) . date("d", strtotime($user['created_at'])) ?>
                                                                        </h6>
                                                                    </div>
                                                                </td>
                                                                <td class="align-middle text-sm">
                                                                    <div class="col text-center">
                                                                        <h6 class="text-sm font-weight-normal mb-0 ">
                                                                            <a href="<?= url("admin/user/edit/" . $user['id']) ?>" class="btn btn-primary">Edit</a>
                                                                            <a href="<?= url("admin/user/delete/" . $user['id']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete <?= $user['username'] ?>?');">Remove</a>
                                                                        </h6>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
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