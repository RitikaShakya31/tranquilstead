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
                                                <label class="form-label">Heading</label>
                                                <input class="form-control" type="text" name="heading" required
                                                    value="<?= $heading ?>">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">Sub Heading</label>
                                                <input class="form-control" type="text" name="sub_heading" required
                                                    value="<?= $sub_heading ?>">
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <label class="form-label">Description</label>
                                                <textarea name="description" id="editor"><?= $description ?></textarea>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">Banner Image</label>
                                                <input class="form-control" type="file" name="banner_image">
                                                <img class="temp_image"
                                                    src="<?= base_url('upload/category') . '/' . $banner_image ?>"
                                                    style="height: 100px;">
                                                <input type="hidden" value="<?= $banner_image ?>" name="banner_image">
                                            </div>

                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">Parallax Effect Image</label>
                                                <input class="form-control" type="file" name="effect_image">
                                                <img class="temp_image"
                                                    src="<?= base_url('upload/category') . '/' . $effect_image ?>"
                                                    style="height: 100px;">
                                                <input type="hidden" value="<?= $effect_image ?>" name="effect_image">
                                            </div>

                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">More Images</label>
                                                <input class="form-control" type="file" multiple name="moreimage[]">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <?php if ($image_all) {
                                                foreach ($image_all as $img) {
                                                    $numImage = getNumRows('nashik_images', "id = '" . decryptId($id) . "'");
                                                    $imgId = ($img['id']);
                                                    $imgData = $img['image'];
                                                    ?>
                                                    <div class="col-lg-4 mb-2">
                                                        <div style="width: 100%; border: 1px solid #aeaeae; border-radius: 5px">
                                                            <img src="<?= base_url("upload/subcat/") . $imgData ?>"
                                                                style="width: 100%; height: 180px; margin-top: 10px">
                                                            <div style="margin-top: 10px; text-align: center">
                                                                <?php if ($numImage != 1) { ?>
                                                                    <a class="btn btn-danger" style="margin-right: 5px"
                                                                        onclick="return confirm('Are you sure to delete this image?')"
                                                                        href="<?= base_url("ImageD/$imgId/$imgData") ?>">
                                                                        <i class="fa fa-trash"></i> Delete
                                                                    </a>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }
                                            } ?>
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
    <?php include('includes/footer-link.php'); ?>
    <script>
        $('.image').on('change', function () {
            $('.gallery').html('');
            imagesPreview(this, 'div.gallery');
        });
    </script>
</body>

</html>