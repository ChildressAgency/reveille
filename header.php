<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="">

  <meta http-equiv="cache-control" content="public">
  <meta http-equiv="cache-control" content="private">

  <title>Reveille Systems, Inc.</title>

  <?php wp_head(); ?>
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <nav id="header-nav">
    <div class="masthead">
      <div class="container">
        <div class="row">
          <div class="col-sm-4 col-md-3">
            <a href="#" class="radio-ad" data-toggle="modal" data-target="#radioAdModal" data-radio_ad="<?php the_field('radio_ad', 'option'); ?>">Listen to our radio ad!</a>
          </div>
          <div class="col-sm-3 hidden-xs hidden-sm">
            <?php get_template_part('partials/social', 'section'); ?>
          </div>
          <div class="col-sm-6 hidden-xs hidden-sm">
            <ul class="nav navbar-nav navbar-right">
              <li class="quote"><a href="<?php echo home_url('request-a-quote'); ?>">Request a Quote</a></li>
              <li><a href="<?php the_field('client_portal_link', 'option'); ?>">Client Portal</a></li>
              <li><a href="<?php echo home_url('careers'); ?>">Careers</a></li>
              <li><a href="<?php echo home_url('contact-us'); ?>">Contact Us</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="lower-menu">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo home_url(); ?>" class="header-logo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-white.png" class="img-responsive" alt="Reveille Systems, Inc. Logo" /></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="expanded" aria-controls="navbar">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <?php get_search_form(); ?>
          <div class="clearfix"></div>
          <ul class="nav navbar-nav navbar-right">
            <li<?php if(is_front_page()){ echo ' class="active"'; } ?>><a href="<?php echo home_url(); ?>">Home</a></li>
            <li<?php if(is_page('about')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('about'); ?>">About</a></li>
            <?php 
              if(is_page('services') || is_singular('service')){
                echo '<li class="active"><a href="' . home_url('services') . '">Services</a></li>';
                $services = new WP_Query(array('post_type' => 'service', 'posts_per_page' => -1, 'post_status' => 'publish'));
                global $post;
                $post_slug = $post->post_name; // use this to test if current page is active
                if($services->have_posts()){
                  echo '<ul class="mobile-sub-menu visible-xs-block visible-sm-block">';
                  while($services->have_posts()){
                    $services->the_post();
                    $cur_loop_slug = $post->post_name;
                    $active = ($cur_loop_slug == $post_slug) ? ' class="active"' : '';
                    echo '<li' . $active . '><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                  }
                  echo '</ul>';
                }
                wp_reset_postdata();
              }
              else{
                echo '<li><a href="' . home_url('services') . '">Services</a></li>';
              }
            ?>
            <li<?php if(is_page('markets')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('markets'); ?>">Markets</a></li>
            <?php
              if(is_page('case-studies') || is_singular('case_study')){
                echo '<li class="active"><a href="' . home_url('case-studies') . '">Case Studies</a></li>';
                $case_studies = new WP_Query(array('post_type' => 'case_study', 'posts_per_page' => -1, 'post_status' => 'publish'));
                global $post;
                $post_slug = $post->post_name;
                if($case_studies->have_posts()){
                  echo '<ul class="mobile-sub-menu visible-xs-block visible-sm-block">';
                  while($case_studies->have_posts()){
                    $case_studies->the_post();
                    $cur_loop_slug = $post->post_name;
                    $active = ($cur_loop_slug == $post_slug) ? ' class="active"' : '';
                    echo '<li' . $active . '><a href="' .get_permalink() . '">' . get_the_title() . '</a></li>';
                  }
                  echo '</ul>';
                }
                wp_reset_postdata();
              }
              else{
                echo '<li><a href="' .home_url('case-studies') . '">Case Studies</a></li>';
              }
            ?>
            <li<?php if(is_page('providers')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('providers'); ?>">Providers</a></li>
            <li<?php if(is_home() || is_single()){ echo ' class="active"'; } ?>><a href="<?php echo home_url('blog'); ?>">Blog</a></li>
            <li role="separator" class="divider"></li>
            <li class="quote visible-xs-block visible-sm-block"><a href="<?php echo home_url('request-a-quote'); ?>">Request a quote</a></li>
            <li class="visible-xs-block visible-sm-block"><a href="<?php the_field('client_portal', 'option'); ?>">Client Portal</a></li>
            <li class="visible-xs-block visible-sm-block"><a href="<?php echo home_url('careers'); ?>">Careers</a></li>
            <li class="visible-xs-block visible-sm-block"><a href="<?php echo home_url('contact-us'); ?>">Contact Us</a></li>
            <li class="visible-xs-block visible-sm-block">
              <?php get_template_part('partials/social', 'section'); ?>
            </li>
          </ul>
          <?php
            if(is_page('services') || is_singular('service')){
              $services = new WP_Query(array('post_type' => 'service', 'posts_per_page' => -1, 'post_status' => 'publish'));
              global $post;
              $post_slug = $post->post_name; // use this to test if current page is active
              if($services->have_posts()){
                echo '<div class="clearfix"></div><ul class="sub-menu hidden-xs hidden-sm">';
                while($services->have_posts()){
                  $services->the_post();
                  $cur_loop_slug = $post->post_name;
                  $active = ($cur_loop_slug == $post_slug) ? ' class="active"' : '';
                  echo '<li' . $active . '><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                }
                echo '</ul>';
              }
              wp_reset_postdata();
            }
            elseif(is_page('case-studies') || is_singular('case_study')){
              $case_studies = new WP_Query(array('post_type' => 'case_study', 'posts_per_page' => -1, 'post_status' => 'publish'));
              global $post;
              $post_slug = $post->post_name;
              if($case_studies->have_posts()){
                echo '<div class="clearfix"></div><ul class="sub-menu hidden-xs hidden-sm">';
                while($case_studies->have_posts()){
                  $case_studies->the_post();
                  $cur_loop_slug = $post->post_name;
                  $active = ($cur_loop_slug == $post_slug) ? ' class="active"' : '';
                  echo '<li' . $active . '><a href="' .get_permalink() . '">' . get_the_title() . '</a></li>';
                }
                echo '</ul>';
              }
              wp_reset_postdata();                
            }
          ?>
        </div>
      </div>
    </div>
  </nav>
