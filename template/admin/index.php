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
                <div class="col-lg-12 position-relative z-index-2">
                    <div class="card card-plain mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="d-flex flex-column h-100">
                                        <h2 class="font-weight-bolder mb-0">
                                            General Statistics
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row col-12">
                        <div class="col-lg-3 col-sm-3">
                            <div class="card mb-2">
                                <a href="<?= url("admin/post") ?>">
                                    <div class="card-header p-3 pt-2">
                                        <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                                            <i class="fa fa-receipt" aria-hidden="true"></i>
                                        </div>
                                        <div class="text-end pt-1">
                                            <p class="text-sm mb-0 text-capitalize">Posts</p>
                                            <h4 class="mb-0"><?= $posts_q ?></h4>
                                        </div>
                                    </div>

                                    <hr class="dark horizontal my-0" />
                                    <div class="card-footer p-3">
                                        <p class="mb-0">Just updated</p>
                                    </div>
                                </a>

                            </div>

                            <div class="card mb-2">
                                <a href="<?= url("admin/comment") ?>">
                                    <div class="card-header p-3 pt-2">
                                        <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary shadow text-center border-radius-xl mt-n4 position-absolute">
                                            <i class="fa fa-comments"></i>
                                        </div>
                                        <div class="text-end pt-1">
                                            <p class="text-sm mb-0 text-capitalize">Avg comments</p>
                                            <h4 class="mb-0"><?= $comments ?></h4>
                                        </div>
                                    </div>

                                    <hr class="dark horizontal my-0" />
                                    <div class="card-footer p-3">
                                        <p class="mb-0">Just updated</p>
                                    </div>
                                </a>

                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 mt-sm-0 mt-4">
                            <div class="card mb-2">
                                <a href="<?= url("admin/post-statics") ?>">
                                    <div class="card-header p-3 pt-2 bg-transparent">
                                        <div class="icon icon-lg icon-shape bg-gradient-success shadow-info text-center border-radius-xl mt-n4 position-absolute">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <div class="text-end pt-1">
                                            <p class="text-sm mb-0 text-capitalize">Avg Views</p>
                                            <h4 class="mb-0"><?= $views ?></h4>
                                        </div>
                                    </div>

                                    <hr class="horizontal my-0 dark" />
                                    <div class="card-footer p-3">
                                        <p class="mb-0">Just updated</p>
                                    </div>
                                </a>
                            </div>
                            <div class="card mb-2">
                                <a href="<?= url("admin/user") ?>">
                                    <div class="card-header p-3 pt-2 bg-transparent">
                                        <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                                            <i class="fa fa-users"></i>
                                        </div>
                                        <div class="text-end pt-1">
                                            <p class="text-sm mb-0 text-capitalize">Users</p>
                                            <h4 class="mb-0"><?= $users ?></h4>
                                        </div>
                                    </div>

                                    <hr class="horizontal my-0 dark" />
                                    <div class="card-footer p-3">
                                        <p class="mb-0">Just updated</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-6">
                            <a href="<?= url("admin/post-statics") ?>">
                                <div class="card mb-4">
                                    <div class="d-flex mb-2">
                                        <div class="icon icon-shape icon-lg bg-gradient-success shadow text-center border-radius-xl mt-n3 ms-4">
                                            <i class="fa fa-receipt"></i>
                                        </div>
                                        <h6 class="mt-3 mb-2 ms-3">Most Popular Posts</h6>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table align-items-center">
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center">
                                                                    <div class="text-center">
                                                                        <h6 class="text-xs font-weight-bold mb-0 ">#</h6>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center">
                                                                    <div class="text-center">
                                                                        <h6 class="text-xs font-weight-bold mb-0 ">Image</h6>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="text-center">
                                                                        <h6 class="text-xs font-weight-bold mb-0 ">Title</h6>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="text-center">
                                                                        <h6 class="text-xs font-weight-bold mb-0">Views</h6>
                                                                    </div>
                                                                </td>
                                                                <td class="align-middle text-sm">
                                                                    <div class="col text-center">
                                                                        <h6 class="text-xs font-weight-bold mb-0 ">Comments</h6>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            $counter = 0;
                                                            foreach ($post_views as $post) {
                                                                $counter++; ?>
                                                                <tr>
                                                                    <td class="text-center">
                                                                        <div class="col text-center">
                                                                            <h6 class="text-sm font-weight-normal mb-0 "><?= $counter; ?></h6>
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <div class="col text-center">
                                                                            <img src="<?= asset($post['image']) ?>" alt="image" class="mw-100" width="29px" height="30px">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="text-center">
                                                                            <h6 class="text-sm font-weight-normal mb-0 "><?= $post['title'] ?></h6>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="text-center">
                                                                            <h6 class="text-sm font-weight-normal mb-0 cursor-pointer"><?= $post['view'] ?></h6>
                                                                        </div>
                                                                    </td>
                                                                    <td class="align-middle text-sm">
                                                                        <div class="col text-center">
                                                                            <h6 class="text-sm font-weight-normal mb-0 "><?= $post['comment_q'] ?></h6>
                                                                        </div>
                                                                    </td>


                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>

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