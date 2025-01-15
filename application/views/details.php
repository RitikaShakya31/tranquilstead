<!-- contain main informative part of the site -->
<main id="main" role="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <!-- main-gallery of the page -->
                    <section class="main-banner post">
                        <div class="parallax-holder add-banner">
                            <div class="parallax-frame"><img src="<?= base_url('upload/subcat/') . $getSub['image'] ?>"
                                    height="1420" width="2000" alt="Image Description"></div>
                        </div>
                        <div class="post-over">
                            <div class="box">
                                <div class="block">
                                    <h1><a href="#"><?= $getSub['sub_category_name'] ?></a></h1>
                                    <ul class="add-nav list-inline">
                                        <li><a href="#"><?= $getCat['category_name'] ?></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <section class="post-info">
        <div class="progress-bar-holder">
            <div class="progressbar">&nbsp;</div>
            <span class="progress-info">&nbsp;</span>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <article class="main-post">
                        <div class="txt-box">
                            <p><?= $getSub['sub_category_heading'] ?> </p>
                        </div>
                        <div class="post-images">
                            <div class="row">
                                <div class="col-xs-4">
                                    <?php if ($allimg) {
                                        $count = 0;
                                        foreach ($allimg as $img) {
                                            if ($count < 2) { ?>
                                                <div class="img-box">
                                                    <img src="<?= base_url('upload/subcat/') . $img['image_path']?>" alt="image description">
                                                </div>
                                                <?php $count++;
                                            }
                                        }
                                    } ?>
                                </div>
                                <div class="col-xs-8">
                                    <?php if ($allimg && count($allimg) > 2) { ?>
                                        <div class="img-box2">
                                            <img src="<?= base_url('upload/subcat/') . $allimg[2]['image_path']?>" alt="image description">
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <p><?= $getSub['sub_category_description'] ?></p>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 fullwidth-post add">
                <div class="row">
                    <div class="banner-gallery parallax-holder">
                        <div class="parallax-frame"><img
                                src="<?= base_url('upload/subcat/') . $getSub['effect_image'] ?>" height="1333"
                                width="2000" alt="<?= $getSub['sub_category_name'] ?>"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>