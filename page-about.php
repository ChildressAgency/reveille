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
        <p>Reveille Systems delivers a combination of experience, integrity, performance, and partnerships to every client engagement. These principles ensure you receive maximum return on your investment, whether we are supporting a specific project or a long-term IT services contract. If you want the benefits of maximizing your financial investment and increasing organizational performance, then give us a call and let our team rise to serve your technology needs!</p>
        <dl>
          <dt>EXPERIENCE</dt>
            <dd>80+ years of combined management and leadership experience delivering management and technical solutions</dd>
            <dd>Our team holds degrees in business and computer information systems, providing both the insight and ability to solve complex technology challenges</dd>
            <dd>Certifications from CompTIA, Microsoft, Project Management Institute (PMI)</dd>
            <dd>Information Technology Information Library (ITIL), and (ISC)2</dd>
          <dt>INTEGRITY</dt>
            <dd>With Federal market experience, we understand challenges with confidentiality and security of proprietary client information</dd>
            <dd>Solutions compy with regulatory and accrediting authorities to ensure data protection and network security standards are met</dd>
            <dd>We ensure members of our staff undergo a background check prior to employment and receive annual security awareness training.</dd>
          <dt>PERFORMANCE</dt>
            <dd>We repeatedly demonstrate our ability to deliver solutions that exceed client expectations</dd>
            <dd>Rapid identification of customer requirements and development of solutions aligning to our customers' business strategies - resulting in increased productivity and efficiency</dd>
          <dt>PARTNERSHIPS</dt>
            <dd>We partner with industry-leading technology companies - Microsoft, Dell, HP, Lenovo, Symantec, Cisco, and Cbeyond - to offer a full complement of systems and data solutions. Cost effective solutions with technical support and training from each vendor.</dd>
        </dl>
      </div>
    </div>
  </section>
<?php get_footer(); ?>