<!-- Blog -->
<section class="blog-section">
    <figure class="light-image mb-0">
        <img src="assets/images/top-lightimage.png" alt="" class="img-fluid">
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
        <style>
            .box-content {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                width: 100%;
                padding: 20px;
                background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.6) 100%);
                /* overflow: hidden ni olib tashladik */
            }

            .box-content h5 {
                margin-bottom: 8px;
                line-height: 1.4;
            }

            .box-content p {
                line-height: 1.5;
                /* Agar 3 qatorga cheklashni hohlasangiz */
                display: -webkit-box;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }
        </style>

        <div class="row">
            <div class="carousel-content">
                <div class="carousel-outer">
                    <div class="owl-carousel owl-theme">
                        <?php foreach ($categories as $category): ?>
                            <div class="item">
                                <div class="image">
                                    <figure class="mb-0">
                                        <img src="<?=$category->image?>" class="img-fluid" alt="">
                                    </figure>
                                    <div  class="box-content">
                                        <h5 class="text-white"><?=$category->{'title_' . Yii::$app->language}?></h5>
                                        <p class="text-size-18 mb-0"><?=$category->{'description_' . Yii::$app->language}?></p>
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