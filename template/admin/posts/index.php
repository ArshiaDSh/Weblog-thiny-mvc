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
                                    <i class="fa fa-receipt" aria-hidden="true"></i>
                                </div>
                                <h6 class="mt-3 mb-2 ms-3 ">Posts</h6>
                            </div>
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
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
                                                                <h6 class="text-xs font-weight-bold mb-0">Tetx</h6>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-sm">
                                                            <div class="col text-center">
                                                                <h6 class="text-xs font-weight-bold mb-0 ">Cat name</h6>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-sm">
                                                            <div class="col text-center">
                                                                <h6 class="text-xs font-weight-bold mb-0 ">Cat name</h6>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-sm">
                                                            <div class="col text-center">
                                                                <h6 class="text-xs font-weight-bold mb-0 ">Status</h6>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-sm">
                                                            <div class="col text-center">
                                                                <h6 class="text-xs font-weight-bold mb-0 ">Edit</h6>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $counter = 0;
                                                    foreach ($posts as $post) {
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
                                                                    <h6 class="text-sm font-weight-normal mb-0 cursor-pointer" title="<?= htmlentities($post['summary']) ?>"><?= substr(htmlentities($post['summary']), 0, 10) . "..." ?></h6>
                                                                </div>
                                                            </td>
                                                            <td class="align-middle text-sm">
                                                                <div class="col text-center">
                                                                    <h6 class="text-sm font-weight-normal mb-0 "><?= $post['username'] ?></h6>
                                                                </div>
                                                            </td>
                                                            <td class="align-middle text-sm">
                                                                <div class="col text-center">
                                                                    <h6 class="text-sm font-weight-normal mb-0 "><?= $post['name'] ?></h6>
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
                                                            <td class="align-middle text-sm">
                                                                <div class="col text-center">
                                                                    <h6 class="mt-4">
                                                                        <?php if ($post['breaking_news'] == 1) { ?>
                                                                            <a href="<?= url("admin/post/breaking-news/" . $post['id']) ?>" title="Add to breaking news" class="p-2 text-md btn btn-primary">
                                                                                <i class="fa fa-shipping-fast"></i>
                                                                            <?php } else { ?>
                                                                                <a href="<?= url("admin/post/breaking-news/" . $post['id']) ?>" title="Remove from breaking news" class="p-1 text-md btn btn-primary">
                                                                                    <span class="fa-stack fa-2x fs-6">
                                                                                        <i class="fas fa-shipping-fast fa-stack"></i>
                                                                                        <i class="fas fa-slash fa-stack-1x" style="transform:rotate(100deg) translate(1.5px);"></i>
                                                                                    </span>
                                                                                <?php } ?>
                                                                                </a>
                                                                                <?php if ($post['selected'] == 1) { ?>
                                                                                    <a href="<?= url("admin/post/selected/" . $post['id']) ?>" title="Add to suggested news" class="p-2 text-md btn btn-success">
                                                                                        <i class="fa fa-star"></i>
                                                                                    <?php } else { ?>
                                                                                        <a href="<?= url("admin/post/selected/" . $post['id']) ?>" title="Remove from suggested news" class="p-1 text-md btn btn-success">
                                                                                            <span class="fa-stack fa-2x fs-6">
                                                                                                <i class="fas fa-star fa-stack"></i>
                                                                                                <i class="fas fa-slash fa-stack-1x" style="transform:rotate(100deg) translate(1.5px);"></i>
                                                                                            </span>
                                                                                        <?php } ?>
                                                                                        </a>
                                                                                        <a href="<?= url("admin/post/change-status/" . $post['id']) ?>" title="change status" class="p-2 text-md btn btn-warning"><i class="fa fa-exchange-alt"></i></a>
                                                                                        <a href="<?= url("admin/post/edit/" . $post['id']) ?>" title="edit" class="p-2 text-md btn btn-info"><i class="fa fa-edit"></i></a>
                                                                                        <a href="<?= url("admin/post/delete/" . $post['id']) ?>" title="reomove" class="p-2 text-md btn btn-danger" onclick="return confirm('Are you sure to delete <?= $post['title'] ?>?')"><i class="fa fa-trash-alt"></i></a>
                                                                    </h6>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <a href="<?= url("admin/post/create") ?>" class="btn btn-success col-3">Add new post</a>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

</html>