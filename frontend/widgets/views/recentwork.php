<section class="recentwork-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="recentwork_content" data-aos="fade-up">
                    <h6><?=Yii::t('app', 'recentwork1')?></h6>
                    <h2><?=Yii::t('app', 'recentwork2')?></h2>
                </div>
            </div>
        </div>

        <div class="recentwork-carousel owl-carousel">
        <?php foreach ($productions as $production):?>
            <div class="item">
                <div class="image">
                    <figure class="recentwork-image mb-0">
                        <img src="<?= $production->image?> " style="height: 600px; object-fit: cover" class="img-fluid" alt="">
                    </figure>
                    <div  class="box-content">
                        <div class="content">
                            <h4 class="text-white"><?= $production->{'title_' . Yii::$app->language} ?></h4>
                            <a class="text-decoration-none" href="portfolio.html">
                                <figure style="" class="arrow mb-0">
                                    <img src="/images/arrow.png" alt="" class="img-fluid">
                                </figure>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
        </div>
    </div>
</section>
<style>
    /* Box-content yashirin bo'lsin */
    .recentwork-section .item .image {
        position: relative;
        overflow: hidden;
    }

    .recentwork-section .item .box-content {
opacity: 0;
    }

    /* Hover bo'lganda ko'rinsin */
    .recentwork-section .item .image:hover .box-content {
        opacity: 1;
        visibility: visible;
    }


</style>