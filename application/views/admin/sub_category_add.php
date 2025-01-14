<?php include('includes/header.php'); ?>

<body data-sidebar="dark">
    <div id="layout-wrapper">
        <?php include('includes/top-header.php'); ?>
        <?php include('includes/menu.php'); ?>
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h2 class="mb-sm-0 "><?= $title ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">Category Name</label>
                                                <select class="form-control select" name="category_id">
                                                    <option>Select Category</option>
                                                    <?php
                                                    $c = getRowsByMoreIdWithOrder('category', "is_delete = '1'", "category_name", 'ASC');
                                                    foreach ($c as $cate) {
                                                        ?>
                                                        <option value="<?= $cate['category_id'] ?>" <?php if ($category_id == $cate['category_id']) {
                                                              echo 'selected';
                                                          } ?>><?= ucwords($cate['category_name']) ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">Sub Category Name</label>
                                                <input class="form-control" type="text" name="sub_category_name"
                                                    required value="<?= $sub_category_name ?>">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">Sub Category Heading</label>
                                                <input class="form-control" type="text" name="sub_category_heading"
                                                    required value="<?= $sub_category_heading ?>">
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <label class="form-label">Sub Category Description</label>
                                                <textarea name="sub_category_description" id="editor"><?= $sub_category_description?></textarea>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label for="example-text-input" class="col-md-3 col-form-label">Sub
                                                    Category Image</label>
                                                <div class="col-md-12">
                                                    <input class="form-control" type="file"
                                                        name="image" <?= $image == "" ? 'required' : '' ?>>
                                                </div>
                                                <img class="temp_image" src="<?= base_url('upload/subcat') . '/' . $image ?>"
                                            style=" height: 300px;">
                                        <input type="hidden" value="<?= $image ?>" name="temp_image">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label for="example-text-input" class="col-md-3 col-form-label">Parallax
                                                    Effect Image</label>
                                                <div class="col-md-12">
                                                    <input class="form-control " type="file"
                                                        name="effect_image" <?= $image == "" ? 'required' : '' ?>>
                                                </div>
                                                <img class="temp_image" src="<?= base_url('upload/subcat') . '/' . $effect_image ?>"
                                            style=" height: 300px;">
                                        <input type="hidden" value="<?= $image ?>" name="temp_image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary w-md">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('includes/footer.php') ?>
    </div>
    </div>
    <?php include('includes/footer-link.php'); ?>
    <script>
        $('.image').on('change', function () {
            $('.gallery').html('');
            imagesPreview(this, 'div.gallery');
        });
    </script>
</body>

</html>