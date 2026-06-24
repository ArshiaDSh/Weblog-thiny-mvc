<!-- aside start -->
<?php

use database\Database;

$db = new Database();
$logoImg = $db->select("SELECT * FROM setting")[0]['logo']; ?>
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">

    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
            <img src="<?=asset($logoImg)?>" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">Material Dashboard 2</span>
        </a>
    </div>


    <hr class="horizontal light mt-0 mb-2">

    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">



            <li class="nav-item">
                <a class="nav-link text-white " href="<?= url("admin") ?>">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-solar-panel"></i>
                    </div>

                    <span class="nav-link-text ms-1">Home</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link text-white " href="<?= url("admin/category") ?>">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-folder-open"></i>
                    </div>

                    <span class="nav-link-text ms-1">Ctegories</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link text-white " href="<?= url("admin/post") ?>">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-receipt"></i>
                    </div>

                    <span class="nav-link-text ms-1">Posts</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link text-white " href="<?= url("admin/banner") ?>">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-images"></i>
                    </div>

                    <span class="nav-link-text ms-1">Banners</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="<?= url("admin/comment") ?>">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-comments"></i>
                    </div>

                    <span class="nav-link-text ms-1">Comments</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="<?= url("admin/menu") ?>">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-list"></i>
                    </div>

                    <span class="nav-link-text ms-1">Menus</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="<?= url("admin/user") ?>">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-users"></i>
                    </div>

                    <span class="nav-link-text ms-1">Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="<?= url("admin/setting") ?>">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-gear"></i>
                    </div>

                    <span class="nav-link-text ms-1">Setting</span>
                </a>
            </li>
        </ul>
    </div>



</aside>
<!-- aside end -->