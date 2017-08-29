<?php get_header(); ?>
  <section id="mainContent">
    <div class="container container-sm-height">
      <div class="row row-sm-height">
        <div class="col-sm-6 col-sm-height">
          <h1>Reveille Systems, Inc</h1>
          <div class="content-offset-square-left">
            <hr />
            <?php the_field('intro_content'); ?>
          </div>
        </div>
        <div class="col-sm-6 col-sm-height">
          <img src="<?php the_field('intro_image'); ?>" class="img-responsive center-block" alt="" />
        </div>
      </div>
    </div>
  </section>
  <?php if(get_field('black_callout_text')): ?>
    <section id="slogan">
      <div class="container">
        <div class="black-bg-callout">
          <h2><?php the_field('black_callout_text'); ?></h2>
        </div>
      </div>
    </section>
  <?php endif; ?>
  <section id="leadershipTeam">
    <div class="container">
      <h1>Leadership Team</h1>
      <div class="content-offset-square-left wide-square">
        <hr />
        <?php the_field('leadership_intro_text'); ?>
        <div class="row">
          <?php if(have_rows('team_members')): $i=0; while(have_rows('team_members')): the_row(); ?>
            <?php if($i%2==0){ echo '<div class="clearfix visible-xs-block"></div>'; } ?>
            <?php if($i%3==0){ echo '<div class="clearfix hidden-xs"></div>'; } ?>
            <div class="col-xs-6 col-sm-4">
              <a href="#" class="team-member" data-toggle="modal" data-target="#teamMemberBio" data-team_member_name="<?php the_sub_field('team_member_name'); ?>" data-team_member_image="<?Php the_sub_field('team_member_image'); ?>" data-team_member_title="<?php the_sub_field('team_member_title'); ?>" data-team_member_bio="<?php the_sub_field('team_member_bio'); ?>">
                <img src="<?php the_sub_field('team_member_image'); ?>" class="img-responsive center-block" alt="<?php the_sub_field('team_member_name'); ?>" />
                <h4><?php the_sub_field('team_member_name'); ?></h4>
                <span class="team-member-title"><?php the_sub_field('team_member_title'); ?></span>
              </a>
            </div>
          <?php endwhile; endif; ?>
        </div>
      </div>
    </div>
  </section>
  <?php if(have_rows('quick_facts')): ?>
    <section id="quickFacts">
      <div class="container">
        <div class="row">
          <div class="col-sm-7 col-sm-offset-5">
            <h1 class="text-right">Quick Facts</h1>
            <div class="content-offset-square-right">
              <hr />
              <ul class="quick-facts list-unstyled">
                <?php while(have_rows('quick_facts')): the_row(); ?>
                  <li><?php the_sub_field('fact'); ?></li>
                <?php endwhile; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>
  <section id="whyChoose">
    <div class="container">
      <h2>Why Choose Us</h2>
      <div class="content-offset-square-left wide-square">
        <hr />
        <?php the_field('why_choose_us_content'); ?>
      </div>
    </div>
  </section>
<?php get_footer(); ?>