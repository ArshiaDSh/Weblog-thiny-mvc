<div class="container-scroller">
    <div class="main-panel">
        <!-- partial:partials/_navbar.html -->
        <header id="header">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="navbar-top">
                        <div class="d-flex justify-content-between align-items-center">
                            <ul class="navbar-top-left-menu">
                                <?php if ($isadmin) { ?>
                                    <li class="nav-item">
                                        <a href="<?= url("admin") ?>" class="nav-link" target="_blank">Admin Panel</a>
                                    </li>
                                <?php } ?>
                                <?php foreach ($menus as $menu) { ?>
                                    <li class="nav-item">
                                        <a href="<?= $menu['url'] ?>" class="nav-link"><?= $menu['name'] ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                            <ul class="navbar-top-right-menu">

                                <?php if (!isset($_SESSION["user"])) { ?>
                                    <li class="nav-item">
                                        <a href="<?= url("login") ?>" class="nav-link">Log in</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= url("register") ?>" class="nav-link">Register</a>
                                    </li>
                                <?php } else { ?>
                                    <li class="nav-item">
                                        <a href="<?= url("logout") ?>" class="nav-link"><i class="fa-classic fa-solid fa-right-from-bracket"></i></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="navbar-bottom">
                        <div class="d-flex justify-content-start align-items-center">
                            <div class="col-1 p-0">
                                <a class="navbar-brand col-11 pt-0 pb-0" href="<?= url("home") ?>">
                                    <img src="<?= asset($setting["logo"]) ?>" alt="logo" height="35px" class="w-100" />
                                </a>
                            </div>
                            <div>
                                <button class="navbar-toggler" type="button" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="navbar-collapse justify-content-center collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav d-lg-flex justify-content-between align-items-center">
                                        <li>
                                            <button class="navbar-close">
                                                <i class="mdi mdi-close"></i>
                                            </button>
                                        </li>
                                        <?php foreach ($cats as $cat) { ?>
                                            <li class="nav-item active">
                                                <a class="nav-link" href="<?= url("categories/" . $cat['id']) ?>"><?= $cat['name'] ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>