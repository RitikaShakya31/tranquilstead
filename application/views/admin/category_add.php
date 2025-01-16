<?php include('includes/header.php'); ?>

<body data-sidebar="dark">
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->
    <!-- Begin page -->
    <div id="layout-wrapper">
        <?php include('includes/top-header.php'); ?>
        <?php include('includes/menu.php'); ?>
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
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
                        <div class="col-8 offset-2">
                            <div class="card">
                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-12 mb-3">
                                                <div class="row">
                                                    <label for="example-text-input"
                                                        class="col-md-3 col-form-label">Category
                                                        Name</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" type="text" name="category_name"
                                                            required value="<?= $category_name ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <div class="row">
                                                    <label for="example-text-input"
                                                        class="col-md-3 col-form-label">Category Sub Name</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" type="text" name="sub_name" required
                                                            value="<?= $category_name ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <div class="row">
                                                    <label for="example-text-input"
                                                        class="col-md-3 col-form-label">Category banner
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input class="form-control " type="file" name="banner">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="col-lg-12 mb-3 d-none">
                                                <div class="row">
                                                    <label for="example-text-input"
                                                        class="col-md-3 col-form-label">Slider Images
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input class="form-control category_image" type="file" multiple
                                                            <?= isset($id) ? '' : 'required' ?> name="image[]">
                                                    </div>
                                                </div>
                                            </div>                                           -->
                                        </div>
                                        <!-- <div class="col-lg-12  mt-2 d-none">
                                            <div class="row">
                                                <?php
                                                if ($image_all) {
                                                    foreach ($image_all as $img) {
                                                        $numImage = getNumRows('slider_image', "category_id = '" . decryptId($id) . "'");
                                                        $imgId = ($img['category_id']);
                                                        $imgData = $img['image_path'];
                                                        ?>
                                                        <div class="col-lg-4 mb-2">
                                                            <div
                                                                style="width: 100%; border: 1px solid #aeaeae; border-radius: 5px">
                                                                <img src="<?= base_url("upload/category/") . $imgData ?>"
                                                                    style="width: 100%;height: 180px; margin-top: 10px">
                                                                <div style="margin-top: 10px; text-align: center">
                                                                    <?php
                                                                    if ($numImage != 1) {
                                                                        ?>
                                                                        <a class="btn btn-danger" style="margin-right: 5px"
                                                                            onclick="return confirm('Are you sure to delete this image?')"
                                                                            href="<?= base_url("productImageD/$imgId/$imgData") ?>">
                                                                            <i class="fa fa-trash"></i> Delete
                                                                        </a>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div> -->
                                        <div class="text-center">
                                            <button type="submit" id="save" class="btn btn-primary w-md">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('includes/footer.php') ?>
    </div>
    <!-- end main content-->
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