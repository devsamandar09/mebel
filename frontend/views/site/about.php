<!-- Header  -->
<?php foreach ($abouts as $about):?>
    <div class="sub-banner">
        <figure class="light-image mb-0">
            <img src="/images/top-lightimage.png" alt="" class="img-fluid">
        </figure>

        <section class="banner-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 col-md-12 col-sm-12 col-12 order-lg-1 order-2 banner-column">
                        <div class="banner_content" data-aos="fade-left">
                            <div class="content">
                                <h1><?=$about->{'title_' . Yii::$app->language}?></h1>
                                <p><?=$about->{'description_' . Yii::$app->language}?></p>
                                <div class="box">
                                    <span class="mb-0">Home</span>
                                    <span class="mb-0 dash">-</span>
                                    <span class="mb-0 box_span">About</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12 col-sm-12 col-12 order-lg-2 order-1">
                        <div class="banner_wrapper">
                            <figure class="sub-bannerimage mb-0" data-aos="fade-up">
                                <img src="<?=$about->image?>" alt="" class="img-fluid">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php endforeach;?>
<!-- About us page -->
<?php foreach ($histories as $history):?>
    <section class="aboutpage-section about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="aboutpage_wrapper">
                        <figure class="aboutpage-image1 mb-0" data-aos="fade-down">
                            <img src="<?=$history->image?>" alt="" class="img-fluid">
                        </figure>
                        <div class="badge c-black" id="badge">
                            <span class="badge__char"> </span>
                            <span class="badge__char badge__char1">.</span>
                            <span class="badge__char"> </span>
                            <span class="badge__char">B</span>
                            <span class="badge__char">R</span>
                            <span class="badge__char">R</span>
                            <span class="badge__char">A</span>
                            <span class="badge__char">U</span>
                            <span class="badge__char">F</span>
                            <span class="badge__char"> </span>
                            <span class="badge__char"> - </span>

                            <span class="badge__char"> </span>

                            <span class="badge__char">M</span>
                            <span class="badge__char">E</span>
                            <span class="badge__char">B</span>
                            <span class="badge__char">E</span>
                            <span class="badge__char">L</span>

                            <figure class="about-logoimage mb-0">
                                <img src="/images/about-logoimage.png" alt="" class="img-fluid">
                            </figure>
                        </div>
                        <figure class="aboutpage-image2 mb-0" data-aos="fade-up">
                            <img src="<?=$history->image2?>" style="width: 300px; height: 380px; object-fit: cover" alt="" class="img-fluid">
                        </figure>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="aboutpage_content" data-aos="fade-right">
                        <h6><?=$history->{'title_' . Yii::$app->language}?></h6>
                        <h2><?=$history->{'title_' . Yii::$app->language}?></h2>
                        <p><?=$history->{'description_' . Yii::$app->language}?></p>
                        <div class="progress-outer">
                            <div class="progress-inner">
                                <div class="box">
                                    <div class="chart" data-percent="85" data-scale-color="#ffffff">85%</div>
                                    <h6>Interior Design</h6>
                                </div>
                                <div class="box">
                                    <div class="chart" data-percent="78" data-scale-color="#ffffff">78%</div>
                                    <h6>Architec Services</h6>
                                </div>
                                <div class="box">
                                    <div class="chart" data-percent="64" data-scale-color="#ffffff">64%</div>
                                    <h6>Idea & Planning</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endforeach;?>