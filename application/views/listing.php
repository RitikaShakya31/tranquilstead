<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <section class="main-gallery">
                    <div class="mask">
                        <div class="slideset">
                            <div class="slide">
                                <div class="bg-stretch">
                                    <img src="<?= base_url('upload/category/') . $getCat['banner'] ?>" alt="image description" />

                                    <img src="<?= !empty($getCat['banner']) ? base_url('upload/category/') . $getCat['banner'] : base_url('assets/images/default.jpg'); ?>"
													alt="<?= $c['category_name']; ?>" />
                                </div>
                                <div class="post-over">
                                    <div class="box">
                                        <div class="block">
                                            <h1 class="heading"><a href="#"><?= $getCat['category_name'] ?></a></h1>
                                            <ul class="add-nav list-inline">
                                                <li><a href="#"><?= $getCat['sub_name'] ?></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row rs-box" style=" display: flex;">
   
        <?php if($allsub) {
            foreach($allsub as $cat) {
                ?>
              <div class="col-sm-4 col-xs-12 three-cols" style="margin: 10px ;">
            <div class="row">
                <section class="main-gallery">
                    <div class="mask"></div>
                </section>
                <article class="banner-gallery">
                    <div class="bg-stretch"><img src="<?= base_url('upload/subcat/'). $cat['image']?>" alt="image description" /></div>
                    <div class="post-over">
                        <div class="box">
                            <div class="block">
                                <h3><a href="<?= base_url('datails/') . $cat['sub_category_id']?>"><?= $cat['sub_category_name']?></a></h3>
                                <ul class="add-nav list-inline">
                                    <li><?= $getCat['sub_name'] ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
                <?php
            }
        } ?>

    </div>
</div>
</main>
</div>
</div>