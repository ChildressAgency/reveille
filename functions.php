<?php

add_action('wp_footer', 'show_template');
function show_template() {
	global $template;
	print_r($template);
}

add_action('wp_enqueue_scripts', 'jquery_cdn');
function jquery_cdn(){
  if(!is_admin()){
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', false, null, true);
    wp_enqueue_script('jquery');
  }
}

add_action('wp_enqueue_scripts', 'reveille_scripts', 100);
function reveille_scripts(){
  wp_register_script(
    'bootstrap-script', 
    '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', 
    array('jquery'), 
    '', 
    true
  );

  wp_register_script(
    'fontawesome',
    '//use.fontawesome.com/004c3c54fb.js',
    array('jquery'),
    '',
    false
  );

  wp_register_script(
    'google-maps',
    '//maps.googleapis.com/maps/api/js?key=' . get_field('google_maps_api_key', 'option'),
    array('jquery'),
    '',
    false
  );

  wp_register_script(
    'reveille-scripts', 
    get_template_directory_uri() . '/js/reveille-scripts.js', 
    array('jquery'), 
    '', 
    true
  );
  
  wp_enqueue_script('bootstrap-script');
  wp_enqueue_script('fontawesome');
	wp_enqueue_script('google-maps');
  wp_enqueue_script('reveille-scripts');  
}

add_action('wp_enqueue_scripts', 'reveille_styles');
function reveille_styles(){
  wp_register_style('bootstrap-css', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
  wp_regsiter_style('google-fonts', '//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i|Patua+One')
  wp_register_style('reveille', get_template_directory_uri() . '/style.css');
  
  wp_enqueue_style('bootstrap-css');
  wp_enqueue_style('google-fonts');
  wp_enqueue_style('reveille');
}

register_nav_menu( 'header-nav', 'Header Navigation' );
/**
 * Class Name: wp_bootstrap_navwalker
 * GitHub URI: https://github.com/twittem/wp-bootstrap-navwalker
 * Description: A custom WordPress nav walker class to implement the Bootstrap 3 navigation style in a custom theme using the WordPress built in menu manager.
 * Version: 2.0.4
 * Author: Edward McIntyre - @twittem
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

class wp_bootstrap_navwalker extends Walker_Nav_Menu {

	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\">\n";
	}

	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		/**
		 * Dividers, Headers or Disabled
		 * =============================
		 * Determine whether the item is a Divider, Header, Disabled or regular
		 * menu item. To prevent errors we use the strcasecmp() function to so a
		 * comparison that is not case sensitive. The strcasecmp() function returns
		 * a 0 if the strings are equal.
		 */
		if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
		} else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
			$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
		} else {

			$class_names = $value = '';

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;

			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

			if ( $args->has_children )
				$class_names .= ' dropdown';

			if ( in_array( 'current-menu-item', $classes ) )
				$class_names .= ' active';

			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

			$output .= $indent . '<li' . $id . $value . $class_names .'>';

			$atts = array();
			$atts['title']  = ! empty( $item->title )	? $item->title	: '';
			$atts['target'] = ! empty( $item->target )	? $item->target	: '';
			$atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';

			// If item has_children add atts to a.
			if ( $args->has_children && $depth === 0 ) {
				$atts['href']   		= '#';
                                $atts['href'] = ! empty( $item->url ) ? $item->url : '';
				$atts['data-toggle']	= 'dropdown';
				$atts['class']			= 'dropdown-toggle';
				$atts['aria-haspopup']	= 'true';
			} else {
				$atts['href'] = ! empty( $item->url ) ? $item->url : '';
			}

			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}

			$item_output = $args->before;

			/*
			 * Glyphicons
			 * ===========
			 * Since the the menu item is NOT a Divider or Header we check the see
			 * if there is a value in the attr_title property. If the attr_title
			 * property is NOT null we apply it as the class name for the glyphicon.
			 */

			 $item_output .= '<a' . $attributes . '>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			if ( ! empty( $item->attr_title ) ){
				$item_output .= '&nbsp;<span class="' . esc_attr( $item->attr_title ) . '"></span>';
			}

			$item_output .= ( $args->has_children && 0 === $depth ) ? ' </a>' : '</a>';
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}

	/**
	 * Traverse elements to create list from elements.
	 *
	 * Display one element if the element doesn't have any children otherwise,
	 * display the element and its children. Will only traverse up to the max
	 * depth and no ignore elements under that depth.
	 *
	 * This method shouldn't be called directly, use the walk() method instead.
	 *
	 * @see Walker::start_el()
	 * @since 2.5.0
	 *
	 * @param object $element Data object
	 * @param array $children_elements List of elements to continue traversing.
	 * @param int $max_depth Max depth to traverse.
	 * @param int $depth Depth of current element.
	 * @param array $args
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return null Null on failure with no changes to parameters.
	 */
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
            return;

        $id_field = $this->db_fields['id'];

        // Display this element.
        if ( is_object( $args[0] ) )
           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

	/**
	 * Menu Fallback
	 * =============
	 * If this function is assigned to the wp_nav_menu's fallback_cb variable
	 * and a manu has not been assigned to the theme location in the WordPress
	 * menu manager the function with display nothing to a non-logged in user,
	 * and will add a link to the WordPress menu manager if logged in as an admin.
	 *
	 * @param array $args passed from the wp_nav_menu function.
	 *
	 */
	public static function fallback( $args ) {
		if ( current_user_can( 'manage_options' ) ) {

			extract( $args );

			$fb_output = null;

			if ( $container ) {
				$fb_output = '<' . $container;

				if ( $container_id )
					$fb_output .= ' id="' . $container_id . '"';

				if ( $container_class )
					$fb_output .= ' class="' . $container_class . '"';

				$fb_output .= '>';
			}

			$fb_output .= '<ul';

			if ( $menu_id )
				$fb_output .= ' id="' . $menu_id . '"';

			if ( $menu_class )
				$fb_output .= ' class="' . $menu_class . '"';

			$fb_output .= '>';
			$fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
			$fb_output .= '</ul>';

			if ( $container )
				$fb_output .= '</' . $container . '>';

			echo $fb_output;
		}
	}
}

if(function_exists('acf_add_options_page')){
  acf_add_options_page(array(
    'page_title' => 'General Info',
    'menu_title' => 'General Info',
    'menu_slug' => 'general-info',
    'capability' => 'edit_posts',
    'redirect' => false
  ));
}

add_action('init', 'reveille_create_post_types');
function reveille_create_post_types(){
  $services_labels = array(
    'name' => 'Services',
    'singular_name' => 'Service',
    'menu_name' => 'Services',
    'add_new_item' => 'Add New Service',
    'search_items' => 'Search Services',
    'edit_item' => 'Edit Service',
    'view_item' => 'View Service',
    'all_items' => 'All Services',
    'new_item' => 'New Service',
    'not_found' => 'Service Not Found'
  );
  $services_args = array(
    'labels' => $services_labels,
    'capability_type' => 'post',
    'public' => true,
    'menu_position' => 5.1,
    'query_var' => 'service',
    'supports' => array('title', 'editor', 'custom_fields', 'revisions')
  );
  register_post_type('service', $services_args);

  $case_study_labels = array(
    'name' => 'Case Studies',
    'singular_name' => 'case Study',
    'menu_name' => 'Case Studies',
    'add_new_item' => 'Add New Case Study',
    'search_items' => 'Search Case Studies',
    'edit_item' => 'Edit Case Study',
    'view_item' => 'View Case Study'
    'all_items' => 'All Case Studies',
    'new_item' => 'New Case Study',
    'not_found' => 'Case Study Not Found'
  );
  $case_study_args = array(
    'labels' => $case_study_labels,
    'capability_type' => 'post',
    'public' => true,
    'menu_position' => 5.2,
    'query_var' => 'case_studies',
    'supports' => array(
      'title',
      'editor',
      'custom_fields',
      'revisions'
    )
  );
  register_post_type('case_study', $case_study_args);
}

function reveille_header_nav_fallback_menu(){ ?>
  <ul class="nav navbar-nav navbar-right">
    <li<?php if(is_front_page()){ echo ' class="active"'; } ?>><a href="<?php echo home_url(); ?>">Home</a></li>
    <li<?php if(is_page('about')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('about'); ?>">About</a></li>
    <li class="dropdown<?php if(is_page('services') || is_singular('service')){ echo ' active'; } ?>">
      <a href="<?php echo home_url('services'); ?>">Services</a></li>
    <li><a href="#">Markets</a></li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Case Studies<i class="fa fa-caret-down"></i></a>
      <ul class="dropdown-menu">
        <li><a href="#">Virginia Cardiovascular</a></li>
        <li><a href="#">Commonwealth Internal Medicine</a></li>
        <li><a href="#">Intelliware Systems, Inc.</a></li>
        <li><a href="#">Universal Understanding, Inc.</a></li>
        <li><a href="#">Goodall, Pelt, and  &amp; Carper</a></li>
        <li><a href="#">Sutton &amp; Associates</a></li>
      </ul>
    </li>
    <li><a href="#">Providers</a></li>
    <li><a href="#">Blog</a></li>
    <li role="separator" class="divider"></li>
    <li class="quote visible-xs-block visible-sm-block"><a href="#">Request a quote</a></li>
    <li class="visible-xs-block visible-sm-block"><a href="#">Client Portal</a></li>
    <li class="visible-xs-block visible-sm-block"><a href="#">Careers</a></li>
    <li class="visible-xs-block visible-sm-block"><a href="#">Contact Us</a></li>
    <li class="visible-xs-block visible-sm-block">
      <div class="social">
        <a href="#"><i class="fa fa-instagram"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-facebook"></i></a>
      </div>
    </li>
  </ul>
<?php }

function reveille_get_mobile_menu_fields(){
  $mobile_menu_fields = '<li role="separator" class="divider"></li>';
  $mobile_menu_fields .= '<li class="quote visible-xs-block visible-sm-block"><a href="' . home_url('request-a-quote') . '">Request a quote</a></li>';
  $mobile_menu_fields .= '<li class="visible-xs-block visible-sm-block"><a href="' . get_field('client_portal_link', 'option') . '">Client Portal</a></li>';
  $mobile_menu_fields .= '<li class="visible-xs-block visible-sm-block"><a href="' . home_url('careers') . '">Careers</a></li>';
  $mobile_menu_fields .= '<li class="visible-xs-block visible-sm-block"><a href="' . home_url('contact-us') . '">Contact Us</a></li>';
  $mobile_menu_fields .= '<li class="visible-xs-block visible-sm-block"><div class="social">';
    if($instagram){ 
      $mobile_menu_fields .= '<a href="' . get_field('instagram', 'option') . '"><i class="fa fa-instagram"></i></a>';
    }
    if($linkedin){
      $mobile_menu_fields .= '<a href="' . get_field('linkedin', 'option') . '"><i class="fa fa-linkedin"></i></a>';
    }
    if($twitter){
      $mobile_menu_fields .= '<a href="' . get_field('twitter', 'option') . '"><i class="fa fa-twitter"></i></a>';
    }
    if($facebook){
      $mobile_menu_fields .= '<a href="' .get_field('facebook', 'option') . '"><i class="fa fa-facebook-official"></i></a>';
    }
  $mobile_menu_fields .= '</div></li>';  

  return $mobile_menu_fields;
}