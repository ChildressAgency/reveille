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
          <?php $i++; endwhile; endif; ?>
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
  <div class="modal fade" id="teamMemberBio" tab-index="-1" role="dialog" aria-labelledby="teamMemberName">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <button type="button" class="close hide-modal" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">X</span>
        </button>
        <div class="row">
          <div class="col-sm-3">
            <img src="" id="teamMemberImage" class="img-responsive center-block" alt="" />
          <!--
            <div class="team-member-nav">
              <a href="#" id="prevTeamMember"><i class="fa fa-angle-left"></i></a>
              <a href="#" id="nextTeamMember"><i class="fa fa-angle-right"></i></a>
            </div>
          -->
          </div>
          <div class="col-sm-9">
            <div class="modal-header">
              <h2 id="teamMemberName" class="modal-title"></h2>
              <span id="teamMemberTitle" class="team-member-title"></span>
            </div>
            <div class="clearfix"></div>
            <div class="modal-body"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php get_footer(); ?>