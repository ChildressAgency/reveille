<?php if(have_rows('business_classifications', 'option')): ?>
  <section id="businessClassifications">
    <div class="container">
      <ul class="list-unstyled list-inline">
        <?php while(have_rows('business_classifications', 'option')): the_row(); ?>
          <li><img src="<?php the_sub_field('business_classification_logo'); ?>" class="img-responsive center-block" alt="" /></li>
        <?php endwhile; ?>
      </ul>
    </div>
  </section>
<?php endif; ?>