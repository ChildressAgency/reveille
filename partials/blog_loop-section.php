<?php
  $paged = get_query_var('paged') ? get_query_var('paged') : 1;
  $wp_query = new WP_query(array('posts_per_page' => 5, 'paged' => $paged));
  if($wp_query->have_posts()): ?>
    <section id="hp-blog">
      <div class="container">
        <h1 class="text-center">Our Blog</h1>
        <div class="row">
          <div class="col-sm-5">
            <ul class="list-unstyled blog-tabs">
              <?php $t=0; while($wp_query->have_posts()): $wp_query->the_post(); ?>
                <li<?php if($t==0){ echo ' class="active"'; } ?>>
                  <a href="#<?php echo sanitize_title(get_the_title()); ?>" class="blog-tab" aria-controls="<?php echo sanitize_title(get_the_title()); ?>" role="tab" data-toggle="tab">
                    <span class="title"><?php the_title(); ?></span>
                    <span class="author"><?php the_author(); ?></span>
                    <span class="date"><?php echo get_the_date('F j, Y'); ?></span>
                  </a>
                </li>
              <?php $t++; endwhile; ?>
            </ul>
            <?php if(is_front_page()): ?>
              <a href="<?php echo home_url('blog'); ?>" class="btn-main">View More</a>
            <?php else: ?>
              <?php wp_pagenavi(array('wp_query' => $wp_query)); ?>
            <?php endif; ?>
          </div>

          <?php $wp_query->rewind_posts(); ?>

          <div class="col-sm-7">
            <div class="tab-content">
              <?php $t=0; while($wp_query->have_posts()): $wp_query->the_post(); ?>
                <div role="tabpanel" class="tab-pane fade<?php if($t==0){ echo ' in active'; } ?>" id="<?php echo sanitize_title(get_the_title()); ?>">
                  <?php 
                    $featured_image = get_stylesheet_directory_uri() . '/images/featured-image-placeholder.png';
                    if(get_field('featured_image')){
                      $featured_image = get_field('featured_image');
                    }
                  ?>
                  <img src="<?php echo $featured_image; ?>" class="img-responsive center-block" alt="" />
                  <div class="blog-summary">
                    <div class="summary-header">
                      <h3><?php the_title(); ?></h3>
                      <span class="author"><?php the_author(); ?></span>
                      <span class="date"><?php echo get_the_date('F j, Y'); ?></span>
                    </div>
                    <?php the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>" class="read-more">Read Full Article</a>
                  </div>
                </div>
              <?php $t++; endwhile; ?>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php endif; wp_reset_postdata(); ?>