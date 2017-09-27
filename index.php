<?php get_header(); ?>
<section id="mainContent">
  <div class="container">
    <?php if(have_posts()): while(have_posts()): the_post(); ?>
      <?php if(is_archive() || is_search()): ?>
        <div class="loop-summary">
          <h3><?php the_title(); ?></h3>
          <span class="author"><?php the_author(); ?></span>
          <span class="date"><?php echo get_the_date('F j, Y'); ?></span>
          <?php the_excerpt(); ?>
          <a href="<?php the_permalink(); ?>" class="read-more">Read Full Article</a>
        </div>
      <?php else: ?>
        <h1><?php the_title(); ?></h1>
        <div class="content-offset-square-left extra-wide-square">
          <hr />
          <?php the_content(); ?>
        </div>
      <?php endif; ?>
    <?php endwhile; else: ?>
      <p>Sorry, nothing found.</p>
    <?php endif; ?>
  </div>
</section>
<?php get_footer(); ?>