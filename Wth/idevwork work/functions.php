<?php 
add_theme_support('post_thumbnails');
/*------------theme-setting-options---------------*/
add_action('admin_head', 'my_custom_css');
function my_custom_css() {
    echo '
    <style>
        .rAds {
            display: none !important;
            opacity: 0 !important;
        } 
    </style>
    <script>
        function home_header12() {
            if(jQuery(".rAds").length){
                jQuery(".rAds").remove();
                console.log("removing banner");
            }
        }
        jQuery(document).ready(function(e) {
            if(jQuery("#redux-header").length){
                setTimeout(home_header12, 3000);
            }
        });
    </script>
    ';
}
######################################################################################
//ADD custom logo on wordpress login page
######################################################################################
add_action( 'login_enqueue_scripts', 'my_login_logo' );
function my_login_logo() {
    global $fdata;
    //print_r($fdata['login-logo']);
    $logo_url = ( isset($fdata['login-logo']) ? $fdata['login-logo']['url'] : get_bloginfo('template_url').'/img/silverfox-logo.png' );
    $logo_height = ( isset($fdata['login-logo']) ? $fdata['login-logo']['height'] : '141' );
    ?>
    <style type="text/css">
        body.login {
            background-color:#fafafa;
        }
        body.login div#login h1 a {
            background-image: url(<?php echo $logo_url ?>);
            padding: 0px;
            margin:0 auto 25px;
            width:auto;
            height:<?=$logo_height?>px;
            background-position:center center;
            background-size:contain;
			}
    </style>
	<?php }

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );
function my_login_logo_url_title() {
    return get_bloginfo('name');//'Your Site Name and Info';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );
######################################################################################
//Redux framework for theme options
######################################################################################
if ( file_exists( get_template_directory() . '/inc/admin-folder/admin-init.php' ) ) {
	require get_template_directory() . '/inc/admin-folder/admin-init.php';
	
	
	function infloway_customize_css() {
		global $fdata;
		if(isset($fdata['opt-ace-editor-css'])) {
			echo '<style type="text/css">
			'.$fdata['opt-ace-editor-css'].'
			</style>
			';
		}
	}
	add_action( 'wp_head', 'infloway_customize_css', 100);
	function infloway_customize_js() {
		global $fdata;
		if(isset($fdata['opt-ace-editor-js'])) {
			echo '<script>
			'.$fdata['opt-ace-editor-js'].'
			</script>
			';
		}
	}
	add_action( 'wp_footer', 'infloway_customize_js', 100);
}
/*------------theme-setting-options-ended--------------*/
?>
<?php	
/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {
    return ',';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );
/*-----menus-with-extra-menu+location---------*/
function wpb_custom_new_menu() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Header Main Menu' ),
      'footer-menu-left' => __( 'Footer Menu Left' ),
	  'footer-menu-right' => __( 'Footer Menu right' ),
	  'copyright-menu' => __( 'Copy Right Menu' ),
	  'services-menu' => __( 'Services Menu' ),
    )
  );
}
add_action( 'init', 'wpb_custom_new_menu' );
/*--------menus-with-extra-menu+location-ended--------------*/
/*----jquery-migrate-------*/
add_action( 'wp_default_scripts', function( $scripts ) {
    if ( ! empty( $scripts->registered['jquery'] ) ) {
        $scripts->registered['jquery']->deps = array_diff( $scripts->registered['jquery']->deps, array( 'jquery-migrate' ) );
    }
} );
/*----jquery-migrate-----------*/
/*-----for-getting-alt-image-------------*/	
 function get_image_with_alt($imagefield, $postID, $imagesize = 'full'){
	$imageID = get_field($imagefield, $postID); 
	$image = wp_get_attachment_image_src( $imageID, $imagesize ); 
	$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true); 
return '<img src="' . $image[0] . '" alt="' . $alt_text . '" />';
}
/*-----for-gettingalt-image------------*/
/*---custom-images-size---*/
add_action( 'after_setup_theme', 'ja_theme_setup' );
function ja_theme_setup() {
    add_theme_support( 'post-thumbnails');
}
/* in use del all */
add_image_size( 'gallery-full', 361, 361, array( 'center', 'center' ) );
add_image_size( 'thumbnail-all-single-blog-post', 267, 257, array( 'center', 'center' ) );
/* in use del all */


/*-----in use--*/

add_image_size( 'recent-blog-image', 170, 122, array( 'center', 'center' ) );

/*--gallery-sizes--*/
add_image_size( 'small-preview', 90, 90, array( 'center', 'center' ) );
add_image_size( 'gallery-square', 356, 357, array( 'center', 'center' ) );
add_image_size( 'gallery-horizontal', 739, 358, array( 'center', 'center' ) );
add_image_size( 'gallery-vertical', 356, 730, array( 'center', 'center' ) );

/*--gallery-sizes--*/


/*------custom-images-size-------*/
/*------all-about-pages-----------------*/
/*-----assigning.php-page-by-slug-name---------------*/
function get_home($atts) {
    include(WP_CONTENT_DIR . '/themes/waqartheme/home-page.php');
}
/*---short codes of page like [homePage]-----*/
add_shortcode( 'homePage', 'get_home');
/*------all-about-pages-----------------*/
/*----get-the-excerpt----*/
function get_testimonial__excerpt($count){
	$permalink = get_permalink($post->ID);
	$excerpt = get_the_content();
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, $count);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	//$excerpt = $excerpt.' <a href="'.$permalink.'">......</a>';
	return $excerpt;
}
function get_blog__excerpt($count){
	$permalink = get_permalink($post->ID);
	$excerpt = get_the_content();
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, $count);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = $excerpt/*.' <a href="'.$permalink.'">......</a>'*/;
	return $excerpt;
}
/*----get-the-excerpt-ended---*/
/*------Calling image in widget--------------*/
// Enable the use of shortcodes within widgets.
add_filter( 'widget_text', 'do_shortcode' ); 
// Assign the tag for our shortcode and identify the function that will run. 
add_shortcode( 'template_directory_uri', 'wpse61170_template_directory_uri' );
// Define function 
function wpse61170_template_directory_uri() {
    return get_template_directory_uri();
}
/* use like :   [template_directory_uri]/images/image.jpg */
/*-----Calling image in widget-Ended-----*/
/*-----------*/
include('shortcodes.php');
include('numeric-pagination.php');
/*---------*/
/*-----------------------------------------------------------------------------------*/
/* Activate sidebar for Wordpress use
/*-----------------------------------------------------------------------------------*/
function naked_register_sidebars() {
	register_sidebar(array(					// Start a series of sidebars to register
		'id' => 'sidebar', 					// Make an ID
		'name' => 'Sidebar',				// Name it
		'description' => 'Take it on the side...', // Dumb description for the admin side
		'before_widget' => '<div class="widget">',	// What to display before each widget
		'after_widget' => '</div>',	// What to display following each widget
		'before_title' => '<span class="title-side-bar">',	// What to display before each widget's title
		'after_title' => '</span>',		
		'empty_title'=> '',					// What to display in the case of no title defined for a widget
	));
} 
add_action( 'widgets_init', 'naked_register_sidebars' );
/*-----------------------------------------------------------------------------------*/
/*---------copies-from-old-theme-------------------*/
register_sidebar( array (
'name' => __( 'Sidebar Widget Area', 'blankslate' ),
'id' => 'primary-widget-area',
'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
'after_widget' => "</div>",
'before_title' => '<h3 class="widget-title"><span>',
'after_title' => '</span></h3>',
) );

/*------------------------------------------*/

/*----self-created-post-type-Testimonail---------------------*/
add_action( 'init', 'create_testimonials' );
function create_testimonials() {
  register_post_type( 'testimonials',	
	 array(
      'labels' => array(
        'name' => __( 'Testimonials' ),
        'singular_name' => __( 'Testimonial' ),
		'add_new'            => _( 'Add New Testimonials'),
		'add_new_item'       => __( 'Add New Testimonials'),
		'new_item'           => __( 'New Testimonial'),
		'edit_item'          => __( 'Edit Testimonial'),
		'view_item'          => __( 'View Testimonial'),
		'all_items'          => __( 'All Testimonials'),
		'search_items'       => __( 'Search Testimonial')
      ),		
		'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
	 	'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title','editor','thumbnail','excerpt'),
		'menu_icon'           => 'dashicons-testimonial',
		'menu_position' => 52
	 )	
  );
}
/*--------self-created-post-type-testimonail-ended------------*/
/*----self-created-post-type-gallery--------------*/
add_action( 'init', 'create_gallery_post_type' );
function create_gallery_post_type() {
  register_post_type( 'gallries',
    array(
		'labels' => array(
        'name' => __( 'Galleries' ),
        'singular_name' => __( 'Gallery' ),
		'add_new'            => _( 'Add New Gallery'),
		'add_new_item'       => __( 'Add New Gallery'),
		'new_item'           => __( 'New Gallery'),
		'edit_item'          => __( 'Edit Gallery'),
		'view_item'          => __( 'View Gallery'),
		'all_items'          => __( 'All Galleries'),
		'search_items'       => __( 'Search Gallery')
      ),			
		'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
	 	'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title'),
		'menu_icon' => get_template_directory_uri() . '/img/gallery.png',
		'menu_position' => 52
    )
  );	
  
}
/*--------self-created-post-type-gallery------------*/
/* Custom Post Type Service */
add_action( 'init', 'create_service' );
function create_service() {
  register_post_type( 'services',	
	 array(
      'labels' => array(
        'name' => __( 'Services' ),
        'singular_name' => __( 'Service' ),
		'add_new'            => _( 'Add New Service'),
		'add_new_item'       => __( 'Add New Service'),
		'new_item'           => __( 'New Service'),
		'edit_item'          => __( 'Edit Service'),
		'view_item'          => __( 'View Service'),
		'all_items'          => __( 'All Service'),
		'search_items'       => __( 'Search Service')
      ),
		'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
	 	'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title','editor','thumbnail','excerpt'),
	    //'menu_icon'           => 'dashicons-groups',
		'menu_icon'           => get_template_directory_uri() . '/img/services.png',
		'menu_position' => 50
    )	
  );
   flush_rewrite_rules();
}
/* Custom Post Type Service Ended */