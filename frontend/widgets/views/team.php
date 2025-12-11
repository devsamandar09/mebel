<section class="team-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="subheading" data-aos="fade-right">
                    <h6>Our Workers</h6>
                    <h2>Meet Our Team Members</h2>
                </div>
            </div>
        </div>
        <div class="row" data-aos="fade-up">
        <?php  foreach ($managers as $manager):?>
            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="team-box">
                    <figure>
                        <img style="height: 320px; width: 250px; object-fit: cover" src="<?=$manager->image?>" alt="" class="img-fluid">
                    </figure>
                    <div class="content">
                        <h5><?=$manager->full_name?></h5>
                        <span class="text-size-16"><?=$manager->position?></span>
                        <ul class="list-unstyled mb-0 p-0 position-relative">
                            <li><a href="#" class="text-decoration-none"><i class="fa-brands fa-facebook social-networks"></i></a></li>
                            <li><a href="#" class="text-decoration-none"><i class="fa-brands fa-twitter social-networks"></i></a></li>
                            <li><a href="#" class="text-decoration-none"><i class="fa-brands fa-instagram social-networks"></i></a></li>
                            <li><a href="#" class="text-decoration-none"><i class="fa-brands fa-linkedin social-networks"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
        </div>
    </div>
</section>