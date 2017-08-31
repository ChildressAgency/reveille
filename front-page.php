<?php get_header(); ?>
  <section id="hp-intro">
    <div class="container container-sm-height">
      <div class="row row-sm-height">
        <div class="col-sm-6 col-sm-push-6 col-sm-height">
          <h1>Reveille Systems, Inc</h1>
          <?php the_field('intro_content'); ?>
          <?php if(get_field('intro_link')): ?>
            <a href="<?php the_field('intro_link'); ?>" class="btn-main"><?php the_field('intro_link_text'); ?></a>
          <?php endif; ?>
        </div>
        <div class="col-sm-6 col-sm-pull-6 col-sm-height">
          <?php if(get_field('intro_image')): ?>
            <img src="<?php the_field('intro_image'); ?>" class="img-responsive center-block" alt="" />
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
  <section id="hp-why">
    <div class="container container-sm-height">
      <div class="row row-sm-height">
        <div class="col-sm-6 col-sm-height pull-left">
          <h1>Why Us</h1>
          <div class="content-offset-square-left">
            <hr />
            <?php the_field('why_us_content'); ?>
            <?php if(get_field('why_us_link')): ?>
              <a href="<?php the_field('why_us_link'); ?>" class="btn-main"><?php the_field('why_us_link_text'); ?></a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php if(have_rows('featured_services')): ?>
    <section id="hp-services">
      <div class="container container-sm-height">
        <div class="row row-sm-height">
          <div class="col-sm-5 col-sm-height">
            <div class="row">
              <?php $i=0; while(have_rows('featured_services')): the_row(); ?>
                <?php if($i%2==0){ echo '<div class="clearfix"></div>'; } ?>
                <div class="col-xs-6">
                  <?php $featured_service_id = get_sub_field('featured_service'); ?>
                  <a href="#<?php echo sanitize_title(get_the_title($featured_service_id)); ?>" class="service-tab" aria-controls="<?php echo sanitize_title(get_the_title($featured_service_id)); ?>" role="tab" data-toggle="tab">
                    <img src="<?php the_sub_field('featured_service_image'); ?>" class="img-responsive center-block" alt="" />
                    <span><?php echo get_the_title($featured_service_id); ?></span>
                  </a>
                </div>
              <?php $i++; endwhile; reset_rows(); ?>
            </div>
          </div>
          <div class="col-sm-7 col-sm-height">
            <h1 class="text-right">Our Services</h1>
            <div class="tab-content content-offset-square-right">
              <hr />
              <?php $i=0; while(have_rows('featured_services')): the_row(); ?>
                <?php $featured_service_id = get_sub_field('featured_service'); ?>
                <div role="tabpanel" class="tab-pane fade<?php if($i==0){ echo ' in active'; } ?>" id="<?php echo sanitize_title(get_the_title($featured_service_id)); ?>">
                  <h2><?php echo get_the_title($featured_service_id); ?></h2>
                  <?php the_sub_field('featured_service_summary') ?>
                  <a href="<?php echo get_permalink($featured_service_id); ?>" class="btn-main">Read More</a>
                  <a href="<?php echo home_url('services'); ?>" class="btn-main">All Services</a>
                </div>
              <?php $i++; endwhile; ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>
  <?php
    $testimonials_page = get_page_by_path('testimonials');
    $testimonials_page_id = $testimonials_page->ID;
    $testimonials = get_field('testimonials', $testimonials_page_id);
    $random_testimonial = $testimonials[array_rand($testimonials)];
    if(!empty($random_testimonial)): ?>
      <section id="hp-testimonials">
        <div class="container container-sm-height">
          <div class="row row-sm-height">
            <div class="col-sm-6 col-sm-height">
              <h1>What Others Say</h1>
              <div class="content-offset-square-left">
                <hr />
                <p><?php echo $random_testimonial['testimonial']; ?></p>
                <div class="testimonial-footer">
                  <p class="author"><?php echo $random_testimonial['testimonial_author']; ?></p>
                  <p class="company"><?php echo $random_testimonial['testimonial_company']; ?></p>
                  <p class="city"><?php echo $random_testimonial['testimonial_city']; ?></p>
                </div>
                <a href="<?php echo home_url('testimonials'); ?>" class="btn-main">View More</a>
                <a href="<?php echo home_url('testimonials'); ?>" class="btn-main">Write A Review</a>
              </div>
            </div>
            <div class="col-sm-6 col-sm-height">
              <img src="<?php the_field('testimonial_section_image'); ?>" class="img-responsive center-block" alt="" />
            </div>
          </div>
        </div>
      </section>
  <?php endif; ?>
<?php get_footer(); ?>