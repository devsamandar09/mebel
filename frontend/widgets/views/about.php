<section class="about-section">
    <figure class="light-image mb-0">
        <img src="/images/top-lightimage.png" alt="" class="img-fluid">
    </figure>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 order-md-1 order-2">
                <div class="about_wrapper">
                    <figure class="about-image1 mb-0" data-aos="fade-up">
                        <img src="/images/about-image1.png" alt="" class="img-fluid">
                    </figure>
                    <div class="badge c-black" id="badge">
                        <span class="badge__char"> </span>
                        <span class="badge__char">B</span>
                        <span class="badge__char">R</span>
                        <span class="badge__char">R</span>
                        <span class="badge__char">A</span>
                        <span class="badge__char">U</span>
                        <span class="badge__char">F</span>
                        <span class="badge__char"></span>
                        <span class="badge__char">A</span>
                        <span class="badge__char">C</span>
                        <span class="badge__char">A</span>
                        <span class="badge__char">D</span>
                        <span class="badge__char">E</span>
                        <span class="badge__char">M</span>
                        <span class="badge__char">Y</span>
                        <figure class="about-logoimage mb-0">
                            <img src="/images/IMG_0052.png" alt="" class="img-fluid">
                        </figure>
                    </div>
                </div>
            </div>
            <?php foreach ($abouts as $about):?>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12 order-md-2 order-3">
                <div class="about_content" data-aos="fade-right">
                    <h6>About Company</h6>
                    <h2><?= $about->title_uz?></h2>
                    <p> <?= $about->description_uz?> </p>
                    <div class="about-button">
                        <a class="read_more text-decoration-none" href="about.html">Read More</a>
                        <a class="image-button text-decoration-none" href="about.html">
                            <figure class="arrow mb-0">
                                <img src="/images/arrow.png" alt="" class="img-fluid">
                            </figure>
                        </a>
                    </div>
                </div>
            </div>

            <?php endforeach;?>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 order-md-3 order-2">
                <div class="about_wrapper">
                    <figure class="about-image2 mb-0" data-aos="fade-up">
                        <img src="/images/about-image2.png" alt="" class="img-fluid">
                    </figure>
                </div>
            </div>
        </div>
    </div>
</section>