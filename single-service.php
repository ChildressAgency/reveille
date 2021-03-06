<?php get_header(); ?>
  <section id="mainContent">
    <div class="container">
      <h1>Services</h1>
      <div class="content-offset-square-left extra-wide-square">
        <hr />
        <div class="row">
          <div class="col-sm-7">
            <?php if(get_field('intro_image')): ?>
              <img src="<?php the_field('intro_image'); ?>" class="img-responsive" alt="" />
            <?php endif; ?>
            <?php the_field('intro_content'); ?>
          </div>
          <div class="col-sm-5">
            <?php 
              $services = new WP_Query(array('post_type' => 'service', 'posts_per_page' => -1, 'post_status' => 'publish'));
              if($services->have_posts()): ?>
                <ul class="case-studies">
                  <?php while($services->have_posts()): $services->the_post(); ?>
                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                  <?php endwhile; ?>
                </ul>
            <?php endif; wp_reset_postdata(); ?>
          </div>
        </div>
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile; endif; ?>
      </div>
    </div>
  </section>
<?php get_footer(); ?>