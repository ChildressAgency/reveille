<?php get_template_part('partials/contact_form', 'section'); ?>

<?php if(is_front_page()): ?>
  <?php get_template_part('partials/blog_loop', 'section'); ?>
<?php endif; ?>

<?php if(!is_page('contact-us')): ?>
  <?php get_template_part('partials/location_info', 'section'); ?>
  <?php get_template_part('partials/business_classifications', 'section'); ?>
<?php endif; ?>

  <footer>
    <div class="container container-sm-height">
      <div class="row row-sm-height">
        <div class="col-sm-2 col-sm-height footer-divider">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>?images/logo-small-white.png" class="img-responsive" alt="" />
        </div>
        <div class="col-sm-4 col-sm-height footer-divider">
          <div class="footer-nav">
            <ul class="list-unstyled">
              <li><a href="<?php echo home_url('about'); ?>">About</a></li>
              <li><a href="<?php echo home_url('services'); ?>">Services</a></li>
              <li><a href="<?php echo home_url('markets'); ?>">Markets</a></li>
              <li><a href="<?php echo home_url('case-studies'); ?>">Case Studies</a></li>
              <li><a href="<?php echo home_url('request-a-quote'); ?>">Request A Quote</a></li>
              <li><a href="<?php echo home_url('providers'); ?>">Providers</a></li>
              <li><a href="<?php echo home_url('blog'); ?>">Blog</a></li>
              <li><a href="<?php the_field('client_portal', 'option'); ?>">Client Portal</a></li>
              <li><a href="<?php echo home_url('careers'); ?>">Careers</a></li>
              <li><a href="<?php echo home_url('contact-us'); ?>">Contact</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-3 col-sm-height footer-divider">
          <p><a href="tel:<?php the_field('phone_number', 'option'); ?>"><strong><?php the_field('phone_number', 'option'); ?></strong></a></p>
          <p><?php the_field('street_address', 'option'); ?><br /><?php the_field('address_2', 'option'); ?><br /><?php the_field('city_state_zip', 'option'); ?></p>
        </div>
        <div class="col-sm-3 col-sm-height">
          <?php get_template_part('partials/social', 'section'); ?>
        </div>
      </div>
    </div>
    <div class="copyright">
      <p>&copy;<?php echo date('Y'); ?> Reveille Systems, Inc.</p>
      <p>website created by <a href="https://childressagency.com">The Childress Agency</a></p>
    </div>
  </footer>
  <?php wp_footer(); ?>
</body>

</html>