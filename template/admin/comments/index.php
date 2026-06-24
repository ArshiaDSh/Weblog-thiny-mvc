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
                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                </div>
                                <h6 class="mt-3 mb-2 ms-3 ">Comments</h6>
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
                                                                <h6 class="text-xs font-weight-bold mb-0 ">Usrename</h6>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="text-center">
                                                                <h6 class="text-xs font-weight-bold mb-0 ">Posts</h6>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="text-center">
                                                                <h6 class="text-xs font-weight-bold mb-0">Text</h6>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-sm">
                                                            <div class="col text-center">
                                                                <h6 class="text-xs font-weight-bold mb-0 ">Created at</h6>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-sm">
                                                            <div class="col text-center">
                                                                <h6 class="text-xs font-weight-bold mb-0 ">Approvment</h6>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php $counter = 0;
                                                    foreach ($comments as $comment) {
                                                        $counter++; ?>
                                                        <tr>
                                                            <td class="text-center">
                                                                <div class="col text-center">
                                                                    <h6 class="text-sm font-weight-normal mb-0 "><?= $counter ?></h6>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="col text-center">
                                                                    <h6 class="text-sm font-weight-normal mb-0 "><?= $comment['username'] ?></h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="text-center">
                                                                    <h6 class="text-sm font-weight-normal mb-0 cursor-pointer" title="<?= $comment['title'] ?>"><?= substr($comment['title'], 0, 20) ?><?php if (strlen($comment['title']) > 21) {
                                                                                                                                                                                                            echo "...";
                                                                                                                                                                                                        } ?></h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="text-center">
                                                                    <h6 class="text-sm font-weight-normal mb-0 cursor-pointer" title="<?= $comment['comment'] ?>"><?= substr($comment['comment'], 0, 20) ?><?php if (strlen($comment['comment']) > 21) {
                                                                                                                                                                                                                echo "...";
                                                                                                                                                                                                            } ?></h6>
                                                                </div>
                                                            </td>
                                                            <td class="align-middle text-sm">
                                                                <div class="col text-center">
                                                                    <h6 class="text-sm font-weight-normal mb-0">
                                                                        <?= date("y", strtotime($comment['created_at'])) . date("M", strtotime($comment['created_at'])) . date("d", strtotime($comment['created_at'])) ?>
                                                                    </h6>
                                                                </div>
                                                            </td>
                                                            <td class="align-middle text-sm">
                                                                <div class="col text-center">
                                                                    <h6 class="text-sm font-weight-normal mb-0 ">
                                                                        <?php if ($comment['status'] == "approved") { ?>
                                                                            <a href="<?= url("admin/comment/change-status/" . $comment['id']) ?>" class="btn btn-warning">UnApprove</a>
                                                                        <?php } else { ?>
                                                                            <a href="<?= url("admin/comment/change-status/" . $comment['id']) ?>" class="btn btn-success">Approve</a>
                                                                        <?php } ?>
                                                                        <a href="<?= url("admin/comment/delete/" . $comment["id"]) ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this comment?');">Remove</a>
                                                                    </h6>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
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