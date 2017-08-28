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
            <?php 
              $instagram = get_field('instagram', 'option');
              $linkedin = get_field('linkedin', 'option');
              $twitter = get_field('twitter', 'option');
              $facebook = get_field('facebook', 'option');
            ?>
            <div class="social">
              <?php if($instagram): ?>
                <a href="<?php echo $instagram; ?>"><i class="fa fa-instagram"></i></a>
              <?php endif; if($linkedin): ?>
                <a href="<?php echo $linkedin; ?>"><i class="fa fa-linkedin"></i></a>
              <?php endif; if($twitter): ?>
                <a href="<?php echo $twitter; ?>"><i class="fa fa-twitter"></i></a>
              <?php endif; if($facebook): ?>
                <a href="<?php echo $facebook; ?>"><i class="fa fa-facebook-official"></i></a>
              <?php endif; ?>
            </div>
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
          <?php
            $mobile_menu_fields = reveille_get_mobile_menu_fields(); 

            $header_nav_args = array(
              'theme_location' => 'header-nav',
              'menu' => '',
              'container' => '',
              'menu_class' => 'nav navbar-nav navbar-right',
              'menu_id' => '',
              'echo' => true,
              'fallback_cb' => 'reveille_header_nav_fallback_menu',
              'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s' . $mobile_menu_fields . '</ul>',
              'depth' => 2,
              'walker' => new wp_bootstrap_navwalker()
            );
            wp_nav_menu($header_nav_args);
          ?>
        </div>
      </div>
    </div>
  </nav>
