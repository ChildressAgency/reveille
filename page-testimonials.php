<?php get_header(); ?>
<section id="mainContent">
  <div class="container">
    <h1>Testimonials</h1>
    <div class="content-offset-square-left extra-wide-square">
      <hr />
      <?php if(have_rows('testimonials')): while(have_rows('testimonials')): the_row(); ?>
        <div class="testimonial">
          <?php the_sub_field('testimonial'); ?>
          <div class="testimonial-footer">
            <p class="author"><?php the_sub_field('testimonial_author'); ?></p>
            <p class="company"><?php the_sub_field('testimonial_company'); ?></p>
            <p class="city"><?php the_sub_field('testimonial_city'); ?></p>
          </div>
        </div>
      <?php endwhile; endif; ?>
    </div>
  </div>
</section>
<section id="writeAReview">
  <div class="container">
    <h1>Write A Review</h1>
    <div class="content-offset-square-left wide-square">
      <hr />
      <?php echo do_shortcode('[contact-form-7 id="212" title="Write A Review"]'); ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>