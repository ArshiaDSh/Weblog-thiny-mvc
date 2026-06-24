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
                            <div class="col-sm-12">
                                <h1 class="font-weight-600 mb-4 text-capitalize">
                                    <?= $category[0]['name'] ?>
                                </h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <?php foreach ($posts as $post) { ?>
                                    <a href="<?= url("show-post/" . $post['id']) ?>" class="text text-dark text-decoration-none">
                                        <div class="row">
                                            <div class="col-sm-4 grid-margin">
                                                <div class="rotate-img">
                                                    <img src="<?= asset($post['image']) ?>" alt="banner" class="img-fluid" />
                                                </div>
                                            </div>
                                            <div class="col-sm-8 grid-margin">
                                                <h2 class="font-weight-600 mb-2">
                                                    <?= $post['title'] ?>
                                                </h2>
                                                <p class="fs-13 text-muted mb-0">
                                                    <span class="mr-2"><?= $post['cat_name'] ?></span>
                                                    <?= date("y", strtotime($post['created_at'])) . date("M", strtotime($post['created_at'])) . date("d", strtotime($post['created_at'])) ?>
                                                </p>
                                                <p class="fs-15">
                                                    <?= $post['summary'] ?>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                <?php } ?>
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
    <?php require BASE_PATH . "/template/app/layouts/footer.php"; ?>

</body>
<?php require BASE_PATH . "/template/app/layouts/scripts.php"; ?>

</html>