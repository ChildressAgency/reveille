<?php get_header(); ?>
  <section id="mainContent">
    <div class="container">
      <h1>Markets</h1>
      <div class="content-offset-square-left extra-wide-square">
        <hr />
        <div class="row">
          <div class="col-sm-7">
            <?php the_field('intro_content'); ?>
          </div>
          <div class="col-sm-5">
            <img src="<?php the_field('intro_image'); ?>" class="img-responsive center-block" alt="" />
            <?php
              $markets = get_field('markets');
              $markets_count = count($markets);
              $half_markets_count = ceil($markets_count/2);

              if(!empty($markets)): ?>
                <ul class="markets list-unstyled list-inline">
                  <?php foreach($markets as $market): ?>
                    <li><span><?php echo $market['market_name']; ?></span></li>
                  <?php endforeach; ?>
                </ul>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php if(have_rows('markets')): ?>
    <section id="markets">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <?php $i=1; while(have_rows('markets')): the_row(); ?>
              <div class="market">
                <h2><?php the_sub_field('market_name'); ?></h2>
                <hr />
                <?php if(get_sub_field('market_image')): ?>
                  <img src="<?php the_sub_field('market_image'); ?>" class="img-responsive center-block" alt="" />
                <?php endif; ?>
                <?php the_sub_field('market_content'); ?>
              </div>
              <?php if($i == $half_markets_count){ echo '</div><div class="col-sm-6">'; } ?>
            <?php $i++; endwhile; ?>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>
<?php get_footer(); ?>