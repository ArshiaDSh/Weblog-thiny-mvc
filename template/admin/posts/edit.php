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
                                    <i class="fa fa-receipt" aria-hidden="true"></i><i class="fa fa-plus fs-5 m-1"></i>
                                </div>
                                <h6 class="mt-3 mb-2 ms-3 ">Posts</h6>
                            </div>
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <form class="row g-3" enctype="multipart/form-data" action="<?= url("admin/post/update/" . $post['id']) ?>" method="POST">
                                            <div class="col-md-6">
                                                <label for="inputTitile" class="form-label">Title</label>
                                                <input type="text" placeholder="title" value="<?= $post['title'] ?>" class="p-2 form-control alert-light" required autofocus id="inputTitile" name="title">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputCat" class="form-label">Category</label>
                                                <select id="inputCat" class="p-2 form-control alert-light" name="cat" required>
                                                    <?php foreach ($cats as $cat) { ?>
                                                        <option <?php if ($post['cat_id'] == $cat['id']) {
                                                                    echo 'selected';
                                                                } ?>value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-7">
                                                <label for="inputImg" class="form-label">Image</label>
                                                <input type="file" class="p-2 form-control alert-light" id="inputImg" name="img">
                                            </div>
                                            <div class="col-md-5">
                                                <label for="inputDate" class="form-label">Punished at</label>
                                                <input type="date" class="p-2 form-control alert-light" required value="<?= date("Y-m-d", strtotime($post['published_at'])) ?>" id="inputDate" name="published-at">
                                            </div>
                                            <div class="col-md-7">
                                                <img src="<?= asset($post['image']) ?>" alt="" class="col-4">
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="inputSammmery" class="form-label">Sammary text</label>
                                                <textarea name="summary-text" id="inputSammmery" class="m-4"><?= $post['summary'] ?></textarea>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label for="inputText" class="form-label">Body text</label>
                                                <textarea name="body-text" id="inputText" class="m-4"><?= $post['body'] ?></textarea>
                                            </div>
                                            <button class="btn btn-success col-2 mt-6" type="submit">Save Changes</button>
                                        </form>
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
<script>
    CKEDITOR.replace('summary-text');
    CKEDITOR.replace('body-text');
</script>

</html>