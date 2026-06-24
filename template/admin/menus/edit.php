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
                                    <i class="fa fa-list" aria-hidden="true"></i>
                                </div>
                                <h6 class="mt-3 mb-2 ms-3 ">Menus</h6>
                            </div>
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="table-responsive">
                                            <form action="<?= url('admin/menu/update/' . $edit_menu['id']) ?> " method="POST">
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
                                                                    <h6 class="text-xs font-weight-bold mb-0 ">Name</h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="text-center">
                                                                    <h6 class="text-xs font-weight-bold mb-0">URL</h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="text-center">
                                                                    <h6 class="text-xs font-weight-bold mb-0">Parent name</h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="text-center">
                                                                    <h6 class="text-xs font-weight-bold mb-0">Created at</h6>
                                                                </div>
                                                            </td>

                                                            <td class="align-middle text-sm">
                                                                <div class="col text-center">
                                                                    <h6 class="text-xs font-weight-bold mb-0 ">Edit</h6>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">
                                                                <div class="col text-center">
                                                                    <h6 class="text-sm font-weight-normal mb-0 ">#</h6>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="col text-center">
                                                                    <input type="text" class="form-control alert-light col-7 p-2" value="<?= $edit_menu['name'] ?>" name="menu-name" placeholder="name" autofocus>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="col text-center">
                                                                    <input type="text" class="form-control alert-light col-7 p-2" value="<?= $edit_menu['url'] ?>" name="menu-url" placeholder="URL" autofocus>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="col text-center">
                                                                    <select name="parent" class="form-control alert-light col-7">
                                                                        <option value="" selected></option>
                                                                        <?php
                                                                        foreach ($menus as $menu) {
                                                                            if ($menu['parent_name'] == null) { ?>
                                                                                <option <?= $edit_menu['parent_id'] == $menu['id'] ? "selected" : '' ?> value="<?= $menu['id'] ?>"><?= $menu['name'] ?></option>
                                                                        <?php }
                                                                        } ?>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="text-center">
                                                                    <h6 class="text-sm font-weight-normal mb-0 ">20nov22</h6>
                                                                </div>
                                                            </td>
                                                            <td class="align-middle text-sm">
                                                                <div class="col text-center">
                                                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
                                                                    <a href="<?= url("admin/menu") ?>" class="btn btn-danger" onclick="return confirm('Are you sure? all changes will be elmenated');"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        $counter = 0;
                                                        foreach ($menus as $menu) {
                                                            $counter++; ?>
                                                            <tr>
                                                                <td class="text-center">
                                                                    <div class="col text-center">
                                                                        <h6 class="text-sm font-weight-normal mb-0 "><?= $counter ?></h6>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center">
                                                                    <div class="col text-center">
                                                                        <h6 class="text-sm font-weight-normal mb-0 "><?= $menu['name'] ?></h6>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center">
                                                                    <div class="col text-center">
                                                                        <h6 class="text-sm font-weight-normal mb-0 "><a href="<?= $menu['url'] ?>"><?= $menu['url'] ?></a></h6>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center">
                                                                    <div class="col text-center">
                                                                        <?php if ($menu['parent_id'] == NULL) { ?>
                                                                            <h6 class="text-sm font-weight-normal mb-0 text-primary">main menu</h6>
                                                                        <?php } else { ?>
                                                                            <h6 class="text-sm font-weight-normal mb-0 text-info"><?= $menu['parent_name'] ?></h6>
                                                                        <?php } ?>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="text-center">
                                                                        <h6 class="text-sm font-weight-normal mb-0 "><?= date("y", strtotime($menu['created_at'])) . date("M", strtotime($menu['created_at'])) . date("d", strtotime($menu['created_at'])) ?></h6>
                                                                    </div>
                                                                </td>
                                                                <td class="align-middle text-sm">
                                                                    <div class="col text-center">
                                                                        <h6 class="text-sm font-weight-normal mb-0 ">
                                                                            <a href="<?= url("admin/menu/edit/{$menu['id']}") ?>" class="btn btn-primary">Edit</a>
                                                                            <a href="<?= url("admin/menu/delete/" . $menu['id']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete <?= $menu['name'] ?>?');">remove</a>
                                                                        </h6>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </form>
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