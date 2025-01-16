<main id="main" role="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <!-- main-gallery of the page -->
                    <section class="main-banner post">
                        <div class="parallax-holder add-banner">
                            <div class="parallax-frame"><img
                                    src="<?= base_url('upload/category/') . $nashik['banner_image'] ?>" height="1420"
                                    width="2000" alt="Image Description"></div>
                        </div>
                        <div class="post-over">
                            <div class="box">
                                <div class="block">
                                    <h1><a href="#"><?= $nashik['heading'] ?></a></h1>
                                    <ul class="add-nav list-inline">
                                        <!-- <li>by <a href="#">Admin</a></li>
                                        <li><time datetime="2024-01-08">Aug 01, 2024</time></li> -->
                                        <li><a href="#"><?= $nashik['sub_heading'] ?></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!-- post-info of the page -->
    <section class="post-info">
        <div class="progress-bar-holder">
            <div class="progressbar">&nbsp;</div>
            <span class="progress-info">&nbsp;</span>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <article class="main-post">
                    <div class="post-images">
                            <div class="row">
                                <div class="col-xs-4">
                                    <?php if ($allimg) {
                                        $count = 0;
                                        foreach ($allimg as $img) {
                                            if ($count < 2) { ?>
                                                <div class="img-box">
                                                    <a href="">
                                                        <img src="<?= base_url('upload/subcat/') . $img['image']?>" alt="image description">
                                                    </a>
                                                </div>
                                                <?php $count++;
                                            }
                                        }
                                    } ?>
                                </div>
                                <div class="col-xs-8">
                                    <?php if ($allimg && count($allimg) > 2) { ?>
                                        <div class="img-box2">
                                        <a href="">
                                            <img src="<?= base_url('upload/subcat/') . $allimg[2]['image']?>" alt="image description">
                                        </a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <p><?= $nashik['description'] ?></p>
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
                        <div class="parallax-frame"><img src="<?= base_url('upload/category/') . $nashik['effect_image'] ?>" height="1333" width="2000"
                                alt="Image Description"></div>
                        <div class="post-over">
                            <div class="box">
                                <div class="block">
                                    <h2><a href="#">NASHIK</a></h2>
                                    <h3>The Treasure Of Paradise.</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</main>