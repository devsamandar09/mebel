<!-- Blog -->
<section class="blog-section">
    <figure class="light-image mb-0">
        <img src="/images/top-lightimage.png" alt="" class="img-fluid">
    </figure>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="blog_content" data-aos="fade-up">
                    <h6>Latest News</h6>
                    <h2>Our Recent Blog Posts</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div  class="carousel-content">
                <div  class="carousel-outer">
                    <div  class="owl-carousel owl-theme">
                       <?php foreach ( $products as $product):?>
                        <div class="item" style="margin-right: 32px!important;">
                            <div class="image">
                                <figure style="background-color: #f8f8f8; width: 365px; height: 335px ; text-align: center"  class="mb-0">
                                    <img style="background-color: white; width: 300px; height: 280px; margin:  auto" src="<?=$product->image?>" class="img-fluid" alt="">
                                </figure>
                                <div class="box-content">
                                    <span class="text-size-16">June 22, 2021</span>
                                    <h5 class="text-white"><?=$product->{"title_".Yii::$app->language}?></h5>
                                    <p class="text-size-18 mb-0"><?=$product->{'description_'.Yii::$app->language}?></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>