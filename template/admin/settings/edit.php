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
                                    <i class="fa fa-gear" aria-hidden="true"></i>
                                </div>
                                <h6 class="mt-3 mb-2 ms-3 ">Setting</h6>
                            </div>
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <form action="<?= url("admin/setting/update") ?>" method="POST" enctype="multipart/form-data">
                                            <div class="table-responsive">
                                                <table class="table align-items-center ">
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center">
                                                                <div class="col text-center">
                                                                    <h6 class="text-sm font-weight-normal mb-0 ">title</h6>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="col text-center">
                                                                    <input type="text" class="form-control input-group-text alert-light" value="<?=$setting['title']?>" name="title" autofocus>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">
                                                                <div class="col text-center">
                                                                    <h6 class="text-sm font-weight-normal mb-0 ">Icon</h6>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="col text-center">
                                                                    <input type="file" class="form-control input-group-text alert-light mb-3" name="icon">
                                                                    <h6 class="text-sm font-weight-normal mb-0 "><img class="col-md-2" src="<?=asset($setting['icon'])?>" alt="icon"></h6>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">
                                                                <div class="col text-center">
                                                                    <h6 class="text-sm font-weight-normal mb-0 ">Logo</h6>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="col text-center">
                                                                    <input type="file" class="form-control input-group-text alert-light mb-3" name="logo">
                                                                    <h6 class="text-sm font-weight-normal mb-0 "><img class="col-md-2" src="<?=asset($setting['logo'])?>" alt="icon"></h6>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">
                                                                <div class="col text-center">
                                                                    <h6 class="text-sm font-weight-normal mb-0 ">Descreption</h6>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="col text-center">
                                                                    <input type="text" class="form-control input-group-text alert-light" value="<?=$setting['description']?>" name="description">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">
                                                                <div class="col text-center">
                                                                    <h6 class="text-sm font-weight-normal mb-0 ">Key words</h6>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="col text-center">
                                                                    <input type="text" class="form-control input-group-text alert-light" value="<?=$setting['keywords']?>" name="keywords">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <button type="submit" class="btn btn-success">Save changes</button>
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