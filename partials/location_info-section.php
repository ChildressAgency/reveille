<section id="locationInfo">
  <div class="container">
    <div class="row">
      <div class="col-sm-5">
        <div class="contact-info">
          <h4>Reveille Systems, Inc.</h4>
          <p><?php the_field('street_address', 'option'); ?><br /><?php the_field('address_2', 'option'); ?><br /><?php the_field('city_state_zip', 'option'); ?></p>
          <p><span>P</span><?php the_field('phone_number', 'option'); ?><br /><span>F</span><?php the_field('fax_number', 'option'); ?></p>
          <p><strong>MAILING ADDRESS</strong><br />Reveille Systems, Inc.<br /><?php the_field('po_box', 'option'); ?><br /><?php the_field('po_box_city_state_zip', 'option'); ?></p>
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