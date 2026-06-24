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
                                            Post Statics
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row col-12">

                        <div class="col-12">
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
                                                            <td class="align-middle text-sm">
                                                                <div class="col text-center">
                                                                    <h6 class="text-xs font-weight-bold mb-0 ">Status</h6>
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
                                                                        <h6 class="text-sm font-weight-normal mb-0 "><?= $post['comment_q'] != null ? $post['comment_q'] : 0 ?></h6>
                                                                    </div>
                                                                </td>
                                                                <td class="align-middle text-sm">
                                                                    <div class="col text-center">
                                                                        <h6 class="text-sm font-weight-normal mb-0 ">
                                                                            <?php if ($post['status'] == "disable") { ?>
                                                                                <span class="p-2 text-md alert text-dark alert-danger">disable</span>
                                                                            <?php } else { ?>
                                                                                <span class="p-2 text-md alert text-dark alert-success">enable</span>
                                                                            <?php }
                                                                            if ($post['selected'] != 1) { ?>
                                                                                <span class="p-2 text-md alert text-dark alert-success">suggested</span>
                                                                            <?php }
                                                                            if ($post['breaking_news'] != 1) { ?>
                                                                                <span class="p-2 text-md alert text-dark alert-primary">breaking news</span>
                                                                            <?php } ?>
                                                                        </h6>
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
                        </div>
                    </div>

                    <a href="<?=url("admin/post")?>" class="btn btn-link">Go to post settigs</a>
                </div>
            </div>
        </div>
        <?php require BASE_PATH . "/template/admin/layouts/footer.php"; ?>
        </div>
    </main>
</body>

</html>