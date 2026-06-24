<footer>
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <img src="assets/images/logo.svg" class="footer-logo" alt="" />
                    <h5 class="font-weight-normal mt-4 mb-5">
                        Newspaper is your news, entertainment, music fashion website. We
                        provide you with the latest breaking news and videos straight from
                        the entertainment industry.
                    </h5>
                </div>
                <div class="col-sm-4">
                    <h3 class="font-weight-bold mb-3">RECENT POSTS</h3>
                    <? foreach ($lastPosts as $lastPost) { ?>
                        <a href="<?= url("show-post/" . $lastPost['id']) ?>">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="footer-border-bottom pb-2">
                                        <div class="row">
                                            <div class="col-3">
                                                <img src="<?= asset($lastPost['image']) ?>" alt="thumb" class="img-fluid" />
                                            </div>
                                            <div class="col-9">
                                                <h5 class="font-weight-600">
                                                    <?= $lastPost['title'] ?>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <? } ?>
                </div>
                <div class="col-sm-3">
                    <h3 class="font-weight-bold mb-3">CATEGORIES</h3>
                    <? foreach ($cats as $cat) { ?>
                        <a href="<?= url("categories/" . $cat['id']) ?>">
                            <div class="footer-border-bottom pb-2 pt-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0 font-weight-600"><?= $cat['name'] ?></h5>
                                </div>
                            </div>
                        </a>
                    <? } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="d-sm-flex justify-content-between align-items-center">
                        <div class="fs-14 font-weight-600">
                            © 2020 @ <a href="<?= url("/home") ?>" target="_blank" class="text-white"> Salap</a>. All rights reserved.
                        </div>
                        <div class="fs-14 font-weight-600">
                            Handcrafted by <a href="<?= url("/home") ?>" target="_blank" class="text-white">Salap</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- partial -->
</div>
</div>