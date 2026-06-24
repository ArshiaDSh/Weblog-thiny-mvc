<!DOCTYPE html>
<html lang="en">

<head>
    <?php require BASE_PATH . "/template/app/layouts/head.php"; ?>
    <title>salap</title>
</head>

<body>
    <?php require BASE_PATH . "/template/app/layouts/header.php"; ?>
    <div class="content-wrapper">
        <div class="container">
            <div class="col-sm-12">
                <div class="card" data-aos="fade-up">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8">
                                <div>
                                    <h1 class="font-weight-600 mb-1">
                                        <?= $post['title'] ?>
                                    </h1>
                                    <p class="fs-13 text-muted mb-0">
                                        <span class="mr-2">Photo </span>
                                        <?= date("y", strtotime($post['created_at'])) . date("M", strtotime($post['created_at'])) . date("d", strtotime($post['created_at'])) ?>
                                        <span class="d-flex align-content-center">
                                            <i class="mdi mdi-eye mr-1"></i>
                                            <?= $post['view'] ?>
                                        </span>
                                    </p>
                                    <p class="mb-4 fs-15">
                                        <?= $post['summary'] ?>
                                    </p>
                                    <div class="rotate-img">
                                        <img src="<?= asset($post['image']) ?>" alt="banner" class="img-fluid mt-4 mb-4" />
                                    </div>
                                </div>
                                <div>
                                    <p class="mb-4 fs-15">
                                        <?= $post['body'] ?>
                                    </p>
                                </div>
                                <div class="post-comment-section">
                                    <div class="row">
                                        <?php if (count($banners) > 0) { ?>
                                            <div class="d-flex w-100" style="height: 300px;">
                                                <div id="carouselExampleControls" class="carousel slide h-100 w-100 col-12 p-0 pt-2 flex-shrink-1" data-ride="carousel">
                                                    <div class="carousel-inner h-100 w-100">
                                                        <?php $counter = 0;
                                                        foreach ($banners as $banner) {
                                                            $counter++; ?>
                                                            <div class="carousel-item h-75 w-100 <?php if ($counter == 1) {
                                                                                                        echo "active";
                                                                                                    } ?>">
                                                                <a href="<?= $banner['url'] ?>" class="h-100 d-block">
                                                                    <div class="position-relative h-100 w-100 pt-5 pb-5">
                                                                        <img src="<?= asset($banner['image']) ?>" alt="banner" class="rounded h-100 w-100 p-0" />
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        <?php } ?>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="comment-section">
                                        <h5 class="font-weight-600">Comments</h5>
                                        <?php foreach ($comments as $comment) {
                                        ?>
                                            <div class="comment-box">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <p class="fs-12 mb-1 line-height-xs">
                                                            <?= date("y", strtotime($comment['created_at'])) . date("M", strtotime($comment['created_at'])) . date("d", strtotime($comment['created_at'])) ?>
                                                        </p>
                                                        <p class="fs-16 font-weight-600 mb-0 line-height-xs">
                                                            <?= $comment['username'] ?>
                                                        </p>
                                                    </div>
                                                </div>

                                                <p class="fs-12 mt-3">
                                                    <?= $comment['comment'] ?>
                                                </p>
                                            </div>
                                        <?php } ?>
                                        <?php if (isset($_SESSION['user'])) { ?>
                                            <h2 class="mt-5">Add comment</h2>
                                            <form action="<?= url('show-post/' . $id . '/comment-store') ?>" method="POST">
                                                <div class="form-outline">
                                                    <textarea class="form-control" id="comment" name="comment" rows="2"></textarea>
                                                </div>
                                                <div class="d-flex justify-content-between mt-3">
                                                    <button type="submit" class="btn btn-danger">
                                                        Send <i class="mdi mdi-arrow"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        <?php } else { ?>
                                            <h2 class="mt-5">Add comment</h2>
                                            You need to <a href="<?= url("login") ?>" class="text-link">login</a> first
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h2 class="mb-5">Suggested news</h2>
                                <?php foreach ($suggesteds as $suggested) { ?>
                                    <a href="#">
                                        <div class="d-flex border-bottom-blue pt-3 pb-4 align-items-center justify-content-between">
                                            <div class="pr-3">
                                                <h5><?= $suggested['title'] ?></h5>
                                                <div class="fs-12">
                                                    <span class="mr-2"><?= $suggested['cat_name'] ?></span>
                                                    <?= date("y", strtotime($suggested['created_at'])) . date("M", strtotime($suggested['created_at'])) . date("d", strtotime($suggested['created_at'])) ?>
                                                </div>
                                            </div>
                                            <div class="rotate-img col-5">
                                                <img src="<?= asset($suggested['image']) ?>" alt="thumb" width="20px" class="img-fluid col-12" />
                                            </div>
                                        </div>
                                    </a>
                                <?php } ?>
                                <div class="trending">
                                    <h2 class="mb-4 text-primary font-weight-600">
                                        Popular
                                    </h2>
                                    <?php foreach ($mostPopularposts as $mostPopularpost) { ?>
                                        <a href="<?= url("show-post/" . $mostPopularpost['id']) ?>">
                                            <div class="mb-4">
                                                <div class="rotate-img">
                                                    <img src="<?= asset($mostPopularpost['image']) ?>" alt="banner" class="img-fluid" />
                                                </div>
                                                <h3 class="mt-3 font-weight-600">
                                                    <?= $mostPopularpost['title'] ?>
                                                </h3>
                                                <p class="fs-13 text-muted mb-0">
                                                    <span class="mr-2"><?= $mostPopularpost['cat_name'] ?></span>
                                                    <?= date("y", strtotime($mostPopularpost['created_at'])) . date("M", strtotime($mostPopularpost['created_at'])) . date("d", strtotime($mostPopularpost['created_at'])) ?>
                                                </p>
                                            </div>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php require BASE_PATH . "/template/app/layouts/footer.php"; ?>
</body>
<?php require BASE_PATH . "/template/app/layouts/scripts.php"; ?>

</html>