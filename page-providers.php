<?php get_header(); ?>
  <section id="mainContent">
    <div class="container">
      <h1>Providers</h1>
      <div class="content-offset-square-left extra-wide-square">
        <hr />
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile; endif; ?>

        <?php if(have_rows('partners')): ?>
          <ul class="vendors list-unstyled list-inline">
            <?php while(have_rows('partners')): the_row(); ?>
              <li>
                <a href="<?php the_sub_field('partner_link'); ?>">
                  <img src="<?php the_sub_field('partner_logo'); ?>" class="img-responsive center-block" alt="<?php the_sub_field('partner_name'); ?>" />
                </a>
              </li>
            <?php endwhile; ?>
          </ul>
        <?php endif; ?>
        
      </div>
    </div>
  </section>
<?php get_footer(); ?>