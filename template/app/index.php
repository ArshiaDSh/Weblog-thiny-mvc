<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require BASE_PATH . "/template/app/layouts/head.php";
    ?>
    <title>salap</title>
</head>

<body>
    <?php require BASE_PATH . "/template/app/layouts/header.php"; ?>
    <div class="content-wrapper">
        <div class="container">
            <div class="row" data-aos="fade-up">
                <div class="col-xl-8 stretch-card grid-margin">
                    <div id="carouselExampleControls" class="carousel slide h-100 w-100 col-12 p-0" data-ride="carousel">
                        <div class="carousel-inner h-100 w-100">
                            <?php $counter = 0;

                            foreach ($breakingNewses as $breakingNews) {


                                $counter++; ?>
                                <div class="carousel-item h-100 w-100 <?php if ($counter == 1) {
                                                                            echo "active";
                                                                        } ?>">
                                    <a href="<?= url("show-post/" . $breakingNews['id']) ?>">
                                        <div class="position-relative h-100 w-100">
                                            <img src="<?= asset($breakingNews['image']) ?>" alt="banner" class="img-fluid h-100 w-100 p-0" />
                                            <div class="banner-content">
                                                <div class="badge badge-danger fs-12 font-weight-bold mb-3">
                                                    Breking newws
                                                </div>
                                                <h1 class="mb-0"><?= $breakingNews['title'] ?></h1>
                                                <h1 class="mb-2"><?= $breakingNews['summary'] ?></h1>
                                                <div class="fs-12">
                                                    <span class="mr-2"><?= $breakingNews['cat_name'] ?></span>
                                                    <?= date("y", strtotime($breakingNews['created_at'])) . date("M", strtotime($breakingNews['created_at'])) . date("d", strtotime($breakingNews['created_at'])) ?>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            <?php }
                            if (count($breakingNewses) == 0) { ?>
                                <div class="carousel-item active">
                                    <div class="position-relative">
                                        <img src="<?= asset("public/app/assets/images/dashboard/banner.jpg") ?>" alt="banner" class="img-fluid" />
                                        <div class="banner-content">
                                            <div class="badge badge-danger fs-12 font-weight-bold mb-3">
                                                Breking newws
                                            </div>
                                            <h1 class="mb-0">GLOBAL PANDEMIC</h1>
                                            <h1 class="mb-2">
                                                Coronavirus Outbreak LIVE Updates: ICSE, CBSE Exams
                                                Postponed, 168 Trains
                                            </h1>
                                            <div class="fs-12">
                                                <span class="mr-2">Photo </span>10 Minutes ago
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-4 stretch-card grid-margin">
                    <div class="card bg-dark text-white">
                        <div class="card-body overflow-scroll">
                            <h2 class="mb-5">Suggested news</h2>
                            <?php foreach ($suggesteds as $suggested) { ?>
                                <a href="<?= url("show-post/" . $suggested['id']) ?>">
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" data-aos="fade-up">
                <div class="col-lg-3 stretch-card grid-margin flex-column">
                    <div class="card flex-grow-1">
                        <div class="card bg-light text-Dark">
                            <div class="card-body overflow-scroll">
                                <h2 class="mb-5">Popular news</h2>
                                <?php foreach ($mostPopularposts as $mostPopularpost) { ?>
                                    <a href="<?= url("show-post/" . $mostPopularpost['id']) ?>">
                                        <div class="d-flex border-bottom-blue pt-3 pb-4 align-items-center justify-content-between">
                                            <div class="pr-3">
                                                <span>
                                                    <h5><?= $mostPopularpost['title'] ?></h5>
                                                    <span>
                                                        <i class="mdi mdi-eye mt-1">
                                                            <?= $mostPopularpost['view'] ?>
                                                        </i>

                                                    </span>
                                                </span>
                                                <div class="fs-12">
                                                    <span class="mr-2"><?= $mostPopularpost['cat_name'] ?></span>
                                                    <?= date("y", strtotime($mostPopularpost['created_at'])) . date("M", strtotime($mostPopularpost['created_at'])) . date("d", strtotime($mostPopularpost['created_at'])) ?>
                                                </div>
                                            </div>
                                            <div class="rotate-img col-5">
                                                <img src="<?= asset($mostPopularpost['image']) ?>" alt="thumb" class="img-fluid" />
                                            </div>
                                        </div>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php if (count($banners) > 0) { ?>
                        <div class="d-flex h-25">
                            <div id="carouselExampleControls" class="carousel slide h-100 w-100 col-12 p-0 pt-2" data-ride="carousel">
                                <div class="carousel-inner h-100 w-100">
                                    <?php $counter = 0;
                                    foreach ($banners as $banner) {
                                        $counter++; ?>
                                        <div class="carousel-item h-100 w-100 <?php if ($counter == 1) {
                                                                                    echo "active";
                                                                                } ?>">
                                            <a href="<?= $banner['url'] ?>">
                                                <div class="position-relative h-100 w-100">
                                                    <img src="<?= asset($banner['image']) ?>" alt="banner" class="rounded img-fluid h-100 w-100 p-0" />
                                                </div>
                                            </a>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-lg-9 stretch-card grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="mb-3">Lastet news</h2>
                            <?php foreach ($lastPosts as $lastPost) { ?>
                                <a href="<?= url("show-post/" . $lastPost['id']) ?>">
                                    <div class="row">
                                        <div class="col-sm-4 grid-margin">
                                            <div class="position-relative">
                                                <div class="rotate-img">
                                                    <img src="<?= asset($lastPost['image']) ?>" alt="thumb" class="img-fluid" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-8  grid-margin">
                                            <h2 class="mb-2 font-weight-600">
                                                <?= $lastPost['title'] ?>
                                            </h2>
                                            <div class="fs-13 mb-2">
                                                <span class="mr-2"><?= $lastPost['cat_name'] ?> </span>
                                                <?= date("y", strtotime($lastPost['created_at'])) . date("M", strtotime($lastPost['created_at'])) . date("d", strtotime($lastPost['created_at'])) ?>
                                            </div>
                                            <p class="mb-0">
                                                <?= $lastPost['summary'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            <?php } ?>
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