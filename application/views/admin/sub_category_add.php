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
                                                <textarea name="heading" id="editor"></textarea>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label for="example-text-input" class="col-md-3 col-form-label">Sub
                                                    Category Image</label>
                                                <div class="col-md-12">
                                                    <input class="form-control subcategory_image" type="file"
                                                        name="image" <?= $image == "" ? 'required' : '' ?>>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label for="example-text-input" class="col-md-3 col-form-label">Parallax
                                                    Effect Image</label>
                                                <div class="col-md-12">
                                                    <input class="form-control subcategory_image" type="file"
                                                        name="image" <?= $image == "" ? 'required' : '' ?>>
                                                </div>
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