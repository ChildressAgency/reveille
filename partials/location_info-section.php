<section id="locationInfo">
  <div class="container">
    <div class="row">
      <div class="col-sm-5">
        <div class="contact-info">
          <h4>Reveille Systems, Inc.</h4>
          <p><?php the_field('hq_address_1', 'option'); ?><br /><?php the_field('hq_address_2', 'option'); ?><br /><?php the_field('hq_city_state_zip', 'option'); ?></p>
          <p><span>P</span><?php the_field('hq_phone_number', 'option'); ?><br /><span>F</span><?php the_field('hq_fax_number', 'option'); ?></p>
          <p><strong>MAILING ADDRESS</strong><br />Reveille Systems, Inc.<br /><?php the_field('mailing_address', 'option'); ?><br /><?php the_field('mailing_city_state_zip', 'option'); ?></p>
          <?php if(have_rows('branch_offices', 'option')): while(have_rows('branch_offices', 'option')): the_row(); ?>
            <p><strong><?php the_sub_field('branch_office_name'); ?></strong><br /><?php the_sub_field('branch_address_1'); ?><br /><?php echo get_sub_field('branch_address_2') ? get_sub_field('branch_address_2') . '<br />' : ''; ?><?php the_sub_field('branch_city_state_zip'); ?></p>
            <?php if(get_sub_field('branch_phone_number')): ?>
              <p><span>P</span><?php the_sub_field('branch_phone_number'); ?><?php echo get_sub_field('branch_fax_number') ? '<br /><span>F</span>' . get_sub_field('branch_fax_number') : ''; ?></p>
            <?php endif; ?>
          <?php endwhile; endif; ?>
          <?php get_template_part('partials/social', 'section'); ?>
        </div>
      </div>
      <div class="col-sm-7">
        <?php
          $location = get_field('location', 'option');
          if(!empty($location)): ?>
            <div class="acf-map">
              <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
            </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>