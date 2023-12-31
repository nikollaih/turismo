<?php
/**
 * Theme functions: init, enqueue scripts and styles, include required files and widgets
 *
 * @package WordPress
 * @subpackage UNITRAVEL
 * @since UNITRAVEL 1.0
 */
// CUSTOM FUNCTIONS AND IMPORTS
require_once get_template_directory() . '/includes/helpers/index.php';

function cargar_archivo_js_del_tema() {
	wp_enqueue_style('sweetalert2-css', get_template_directory_uri() . '/css/sweetalert2.min.css');
    wp_enqueue_script('register-page', get_template_directory_uri() . '/js/pages/register.js', array('jquery'), '1.0', true);
	wp_enqueue_script('collaborators-page', get_template_directory_uri() . '/js/pages/collaborators.js', array('jquery'), '1.0', true);
	wp_enqueue_script('sweetalert2-js', get_template_directory_uri() . '/js/sweetalert2.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('custom-fetch', get_template_directory_uri() . '/js/custom_fetch.js', array('jquery'), '1.0', true);
	wp_enqueue_script('general-js', get_template_directory_uri() . '/js/general.js', array('jquery'), '1.0', true);
	wp_enqueue_script('activities-js', get_template_directory_uri() . '/js/pages/activities.js', array('jquery'), '1.0', true);
	wp_enqueue_script('routes-js', get_template_directory_uri() . '/js/pages/routes.js', array('jquery'), '1.0', true);
	wp_localize_script('custom-fetch', 'customFetch', array(
        'home_url' => home_url(),
    ));
}
add_action('wp_enqueue_scripts', 'cargar_archivo_js_del_tema');

// Cambiar texto de formulario de login
function cambiar_label_form_inicio_sesion( $translated_text, $text, $domain ) {
    if ($text === 'Username or Email Address') { // Cambia este texto al que desees cambiar
        $translated_text = 'Documento ó correo electrónico';
    }
    return $translated_text;
}
add_filter( 'gettext', 'cambiar_label_form_inicio_sesion', 20, 3 );

// Cambiar enlace de "Has olvidado tu contraseña"
function cambiar_enlace_recuperar_contrasena() {
    return home_url()."/wp-login.php?action=lostpassword"; // Reemplaza con tu nueva URL
}
add_filter('lostpassword_url', 'cambiar_enlace_recuperar_contrasena');

function prevent_caching() {
    header("Cache-Control: no-cache, must-revalidate");
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
}
add_action('init', 'prevent_caching');

if (!defined("UNITRAVEL_THEME_DIR")) define("UNITRAVEL_THEME_DIR", trailingslashit( get_template_directory() ));
if (!defined("UNITRAVEL_CHILD_DIR")) define("UNITRAVEL_CHILD_DIR", trailingslashit( get_stylesheet_directory() ));

// Theme storage
$UNITRAVEL_STORAGE = array(
	// Theme required plugin's slugs
	'required_plugins' => array(

		// Required plugins
		// DON'T COMMENT OR REMOVE NEXT LINES!
		'trx_addons',

		// Recommended (supported) plugins
		// If plugin not need - comment (or remove) it
			'booked',
			'elegro-payment',
			'essential-grid',
			'contact-form-7',
			'js_composer',
			'mailchimp-for-wp',
			'revslider',
			'vc-extensions-bundle',
			'woocommerce',
			'room-plugin',
			'trx_updater',
			'trx_socials',
			'wp-gdpr-compliance',
			'wp-review',
			'instagram-feed'
	),
	'theme_demo_url' => '//unitravel.ancorathemes.com'
);

//-------------------------------------------------------
//-- Theme init
//-------------------------------------------------------

// Theme init priorities:
// 1 - register filters to add/remove lists items in the Theme Options
// 2 - create Theme Options
// 3 - add/remove Theme Options elements
// 5 - load Theme Options
// 9 - register other filters (for installer, etc.)
//10 - standard Theme init procedures (not ordered)

if ( !function_exists('unitravel_theme_setup1') ) {
	add_action( 'after_setup_theme', 'unitravel_theme_setup1', 1 );
	function unitravel_theme_setup1() {
		// Make theme available for translation
		// Translations can be filed in the /languages directory
		// Attention! Translations must be loaded before first call any translation functions!
		load_theme_textdomain( 'unitravel', unitravel_get_folder_dir('languages') );

		// Set theme content width
		$GLOBALS['content_width'] = apply_filters( 'unitravel_filter_content_width', 1170 );
	}
}

if ( !function_exists('unitravel_theme_setup') ) {
	add_action( 'after_setup_theme', 'unitravel_theme_setup' );
	function unitravel_theme_setup() {

		// Add default posts and comments RSS feed links to head 
		add_theme_support( 'automatic-feed-links' );
		
		// Enable support for Post Thumbnails
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size(370, 0, false);
		
		// Add thumb sizes
		// ATTENTION! If you change list below - check filter's names in the 'trx_addons_filter_get_thumb_size' hook
		$thumb_sizes = apply_filters('unitravel_filter_add_thumb_sizes', array(
			'unitravel-thumb-huge'		=> array(1170, 658, true),
			'unitravel-thumb-big' 		=> array(1170, 666, true),
			'unitravel-thumb-team' 		=> array( 540, 662, true),
			'unitravel-thumb-med' 		=> array( 370, 208, true),
			'unitravel-thumb-hot-spot'	=> array( 308, 128, true),
			'unitravel-thumb-tiny' 		=> array(  90,  90, true),
			'unitravel-thumb-testimonials'=> array( 322, 322, true),
			'unitravel-thumb-blogger'     => array( 740, 402, true),
			'unitravel-thumb-team-short'        => array( 360, 360, true),
			'unitravel-thumb-masonry-big' => array( 760,   0, false),		// Only downscale, not crop
			'unitravel-thumb-masonry'		=> array( 370,   0, false),		// Only downscale, not crop
			)
		);
		$mult = unitravel_get_theme_option('retina_ready', 1);
		if ($mult > 1) $GLOBALS['content_width'] = apply_filters( 'unitravel_filter_content_width', 1170*$mult);
		foreach ($thumb_sizes as $k=>$v) {
			// Add Original dimensions
			add_image_size( $k, $v[0], $v[1], $v[2]);
			// Add Retina dimensions
			if ($mult > 1) add_image_size( $k.'-@retina', $v[0]*$mult, $v[1]*$mult, $v[2]);
		}
		
		// Custom header setup
		add_theme_support( 'custom-header', array(
			'header-text'=>false,
			'video' => true
			)
		);

		// Custom backgrounds setup
		add_theme_support( 'custom-background', array()	);
		
		// Supported posts formats
		add_theme_support( 'post-formats', array('gallery', 'video', 'audio', 'link', 'quote', 'image', 'status', 'aside', 'chat') ); 
 
 		// Autogenerate title tag
		add_theme_support('title-tag');
 		
		// Add theme menus
		add_theme_support('nav-menus');
		
		// Switch default markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support( 'html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption') );
		
		// WooCommerce Support
		add_theme_support( 'woocommerce', array( 'product_grid' => array( 'max_columns' => 4 ) ) );

		// Next setting from the WooCommerce 3.0+ enable built-in image zoom on the single product page
		add_theme_support( 'wc-product-gallery-zoom' );

		// Next setting from the WooCommerce 3.0+ enable built-in image slider on the single product page
		add_theme_support( 'wc-product-gallery-slider' );

		// Next setting from the WooCommerce 3.0+ enable built-in image lightbox on the single product page
		add_theme_support( 'wc-product-gallery-lightbox' );
		
		// Editor custom stylesheet - for user
		add_editor_style( array_merge(
			array(
				'css/editor-style.css',
				unitravel_get_file_url('css/fontello/css/fontello-embedded.css')
			),
			unitravel_theme_fonts_for_editor()
			)
		);	
	
		// Register navigation menu
		register_nav_menus(array(
			'menu_main' => esc_html__('Main Menu', 'unitravel'),
			'menu_mobile' => esc_html__('Mobile Menu', 'unitravel'),
			'menu_footer' => esc_html__('Footer Menu', 'unitravel')
			)
		);

		// Excerpt filters
		add_filter( 'excerpt_length',						'unitravel_excerpt_length' );
		add_filter( 'excerpt_more',							'unitravel_excerpt_more' );
		
		// Add required meta tags in the head
		add_action('wp_head',		 						'unitravel_wp_head', 0);
		
		// Add custom inline styles
		add_action('wp_footer',		 						'unitravel_wp_footer');
		add_action('admin_footer',	 						'unitravel_wp_footer');

		// Enqueue scripts and styles for frontend
		add_action('wp_enqueue_scripts', 					'unitravel_wp_scripts', 1000);			//priority 1000 - load styles before the plugin's support custom styles (priority 1100)
		add_action('wp_footer',		 						'unitravel_localize_scripts');
		add_action('wp_enqueue_scripts', 					'unitravel_wp_scripts_responsive', 2000);	//priority 2000 - load responsive after all other styles
		
		// Add body classes
		add_filter( 'body_class',							'unitravel_add_body_classes' );

		// Register sidebars
		add_action('widgets_init',							'unitravel_register_sidebars');

		// Set options for importer (before other plugins)
		add_filter( 'trx_addons_filter_importer_options',	'unitravel_importer_set_options', 9 );

        add_filter( 'comment_form_fields', 'unitravel_move_comment_field_to_bottom' );
	}

}


//-------------------------------------------------------
//-- Thumb sizes
//-------------------------------------------------------
if ( !function_exists('unitravel_image_sizes') ) {
	add_filter( 'image_size_names_choose', 'unitravel_image_sizes' );
	function unitravel_image_sizes( $sizes ) {
		$thumb_sizes = apply_filters('unitravel_filter_add_thumb_sizes', array(
			'unitravel-thumb-huge'		=> esc_html__( 'Fullsize image', 'unitravel' ),
			'unitravel-thumb-big'			=> esc_html__( 'Large image', 'unitravel' ),
			'unitravel-thumb-med'			=> esc_html__( 'Medium image', 'unitravel' ),
			'unitravel-thumb-tiny'		=> esc_html__( 'Small square avatar', 'unitravel' ),
			'unitravel-thumb-masonry-big'	=> esc_html__( 'Masonry Large (scaled)', 'unitravel' ),
			'unitravel-thumb-masonry'		=> esc_html__( 'Masonry (scaled)', 'unitravel' ),
			'unitravel-thumb-hot-spot'		=> esc_html__( 'Hot-spot', 'unitravel' ),
			)
		);
		$mult = unitravel_get_theme_option('retina_ready', 1);
		foreach($thumb_sizes as $k=>$v) {
			$sizes[$k] = $v;
			if ($mult > 1) $sizes[$k.'-@retina'] = $v.' '.esc_html__('@2x', 'unitravel' );
		}
		return $sizes;
	}
}


if ( !function_exists( 'unitravel_move_comment_field_to_bottom' ) ) {
    function unitravel_move_comment_field_to_bottom( $fields ) {
        $comment_field = $fields['comment'];
        unset( $fields['comment'] );
        $fields['comment'] = $comment_field;
        return $fields;
    }
}


//-------------------------------------------------------
//-- Theme scripts and styles
//-------------------------------------------------------

// Load frontend scripts
if ( !function_exists( 'unitravel_wp_scripts' ) ) {
	
	function unitravel_wp_scripts() {
		
		// Enqueue styles
		//------------------------
		
		// Links to selected fonts
		$links = unitravel_theme_fonts_links();
		if (count($links) > 0) {
			foreach ($links as $slug => $link) {
				wp_enqueue_style( sprintf('unitravel-font-%s', $slug), $link );
			}
		}
		
		// Fontello styles must be loaded before main stylesheet
		// This style NEED the theme prefix, because style 'fontello' in some plugin contain different set of characters
		// and can't be used instead this style!
		wp_enqueue_style( 'fontello-style',  unitravel_get_file_url('css/fontello/css/fontello-embedded.css') );

        // Merged styles
        if ( unitravel_is_off(unitravel_get_theme_option('debug_mode')) )
            wp_enqueue_style( 'unitravel-styles', unitravel_get_file_url('css/__styles.css') );

		// Load main stylesheet
		$main_stylesheet = get_template_directory_uri() . '/style.css';
		wp_enqueue_style( 'unitravel-main', $main_stylesheet, array(), null );

		// Load child stylesheet (if different) after the main stylesheet and fontello icons (important!)
		$child_stylesheet = get_stylesheet_directory_uri() . '/style.css';
		if ($child_stylesheet != $main_stylesheet) {
			wp_enqueue_style( 'unitravel-child', $child_stylesheet, array('unitravel-main'), null );
		}

		// Add custom bg image for the body_style == 'boxed'
		if ( unitravel_get_theme_option('body_style') == 'boxed' && ($bg_image = unitravel_get_theme_option('boxed_bg_image')) != '' )
			wp_add_inline_style( 'unitravel-main', '.body_style_boxed { background-image:url('.esc_url($bg_image).') }' );

		// Custom colors
		if ( !is_customize_preview() && !isset($_GET['color_scheme']) && unitravel_is_off(unitravel_get_theme_option('debug_mode')) )
			wp_enqueue_style( 'unitravel-colors', unitravel_get_file_url('css/__colors.css') );
		else
			wp_add_inline_style( 'unitravel-main', unitravel_customizer_get_css() );

		// Add post nav background
		unitravel_add_bg_in_post_nav();

		// Disable loading JQuery UI CSS
		wp_deregister_style('jquery_ui');
		wp_deregister_style('date-picker-css');


		// Enqueue scripts	
		//------------------------
		
		// Modernizr will load in head before other scripts and styles
		if ( in_array(substr(unitravel_get_theme_option('blog_style'), 0, 7), array('gallery', 'portfol', 'masonry')) )
			wp_enqueue_script( 'modernizr', unitravel_get_file_url('js/theme.gallery/modernizr.min.js'), array(), null, false );

		// Superfish Menu
		// Attention! To prevent duplicate this script in the plugin and in the menu, don't merge it!
		wp_enqueue_script( 'superfish', unitravel_get_file_url('js/superfish.js'), array('jquery'), null, true );
		
		// Merged scripts
		if ( unitravel_is_off(unitravel_get_theme_option('debug_mode')) )
			wp_enqueue_script( 'unitravel-init', unitravel_get_file_url('js/__scripts.js'), array('jquery'), null, true );
		else {
			// Skip link focus
			wp_enqueue_script( 'skip-link-focus-fix', unitravel_get_file_url('js/skip-link-focus-fix.js'), null, true );
			// Background video
			$header_video = unitravel_get_header_video();
			if (!empty($header_video) && !unitravel_is_inherit($header_video))
				wp_enqueue_script( 'bideo', unitravel_get_file_url('js/bideo.js'), array(), null, true );
			// Theme scripts
			wp_enqueue_script( 'unitravel-utils', unitravel_get_file_url('js/_utils.js'), array('jquery'), null, true );
			wp_enqueue_script( 'unitravel-init', unitravel_get_file_url('js/_init.js'), array('jquery'), null, true );	
		}
		
		// Comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// Media elements library	
		if (unitravel_get_theme_setting('use_mediaelements')) {
			wp_enqueue_style ( 'mediaelement' );
			wp_enqueue_style ( 'wp-mediaelement' );
			wp_enqueue_script( 'mediaelement' );
			wp_enqueue_script( 'wp-mediaelement' );
		}
	}
}

// Add variables to the scripts in the frontend
if ( !function_exists( 'unitravel_localize_scripts' ) ) {
	
	function unitravel_localize_scripts() {

		$video = unitravel_get_header_video();

		wp_localize_script( 'unitravel-init', 'UNITRAVEL_STORAGE', apply_filters( 'unitravel_filter_localize_script', array(
			// AJAX parameters
			'ajax_url' => esc_url(admin_url('admin-ajax.php')),
			'ajax_nonce' => esc_attr(wp_create_nonce(admin_url('admin-ajax.php'))),
			
			// Site base url
			'site_url' => get_site_url(),
						
			// Site color scheme
			'site_scheme' => sprintf('scheme_%s', unitravel_get_theme_option('color_scheme')),
			
			// User logged in
			'user_logged_in' => is_user_logged_in() ? true : false,
			
			// Window width to switch the site header to the mobile layout
			'mobile_layout_width' => 767,
						
			// Sidemenu options
			'menu_side_stretch' => unitravel_get_theme_option('menu_side_stretch') > 0 ? true : false,
			'menu_side_icons' => unitravel_get_theme_option('menu_side_icons') > 0 ? true : false,

			// Video background
			'background_video' => unitravel_is_from_uploads($video) ? $video : '',

			// Video and Audio tag wrapper
			'use_mediaelements' => unitravel_get_theme_setting('use_mediaelements') ? true : false,

			// Messages max length
			'message_maxlength'	=> intval(unitravel_get_theme_setting('message_maxlength')),

			
			// Internal vars - do not change it!
			
			// Flag for review mechanism
			'admin_mode' => false,

			// E-mail mask
			'email_mask' => '^([a-zA-Z0-9_\\-]+\\.)*[a-zA-Z0-9_\\-]+@[a-z0-9_\\-]+(\\.[a-z0-9_\\-]+)*\\.[a-z]{2,6}$',
			
			// Strings for translation
			'strings' => array(
					'ajax_error'		=> esc_html__('Invalid server answer!', 'unitravel'),
					'error_global'		=> esc_html__('Error data validation!', 'unitravel'),
					'name_empty' 		=> esc_html__("The name can't be empty", 'unitravel'),
					'name_long'			=> esc_html__('Too long name', 'unitravel'),
					'email_empty'		=> esc_html__('Too short (or empty) email address', 'unitravel'),
					'email_long'		=> esc_html__('Too long email address', 'unitravel'),
					'email_not_valid'	=> esc_html__('Invalid email address', 'unitravel'),
					'text_empty'		=> esc_html__("The message text can't be empty", 'unitravel'),
					'text_long'			=> esc_html__('Too long message text', 'unitravel')
					)
			))
		);
	}
}

// Load responsive styles (priority 2000 - load it after main styles and plugins custom styles)
if ( !function_exists( 'unitravel_wp_scripts_responsive' ) ) {
	
	function unitravel_wp_scripts_responsive() {
		wp_enqueue_style( 'unitravel-responsive', unitravel_get_file_url('css/responsive.css') );
	}
}

//  Add meta tags and inline scripts in the header for frontend
if (!function_exists('unitravel_wp_head')) {
	
	function unitravel_wp_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="format-detection" content="telephone=no">
		<link rel="profile" href="//gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php
	}
}

// Add theme specified classes to the body
if ( !function_exists('unitravel_add_body_classes') ) {
	
	function unitravel_add_body_classes( $classes ) {
		$classes[] = 'body_tag';	// Need for the .scheme_self
		$classes[] = 'scheme_' . esc_attr(unitravel_get_theme_option('color_scheme'));

		$blog_mode = unitravel_storage_get('blog_mode');
		$classes[] = 'blog_mode_' . esc_attr($blog_mode);
		$classes[] = 'body_style_' . esc_attr(unitravel_get_theme_option('body_style'));

		if (in_array($blog_mode, array('post', 'page'))) {
			$classes[] = 'is_single';
		} else {
			$classes[] = ' is_stream';
			$classes[] = 'blog_style_'.esc_attr(unitravel_get_theme_option('blog_style'));
			if (unitravel_storage_get('blog_template') > 0)
				$classes[] = 'blog_template';
		}
		
		if (unitravel_sidebar_present()) {
			$classes[] = 'sidebar_show sidebar_' . esc_attr(unitravel_get_theme_option('sidebar_position')) ;
		} else {
			$classes[] = 'sidebar_hide';
			if (unitravel_is_on(unitravel_get_theme_option('expand_content')))
				 $classes[] = 'expand_content';
		}
		
		if (unitravel_is_on(unitravel_get_theme_option('remove_margins')))
			 $classes[] = 'remove_margins';

		$classes[] = 'header_style_' . esc_attr(unitravel_get_theme_option("header_style"));
		$classes[] = 'header_position_' . esc_attr(unitravel_get_theme_option("header_position"));

		$menu_style= unitravel_get_theme_option("menu_style");
		$classes[] = 'menu_style_' . esc_attr($menu_style) . (in_array($menu_style, array('left', 'right'))	? ' menu_style_side' : '');
		$classes[] = 'no_layout';

        if (unitravel_get_theme_option("top_panel_title_hide") == 1) {
            $classes[] = ' top_panel_title_hide';
        }
		
		return $classes;
	}
}
	
// Load inline styles
if ( !function_exists( 'unitravel_wp_footer' ) ) {
	
	//and add_action('admin_footer', 'unitravel_wp_footer');
	function unitravel_wp_footer() {
		// Get inline styles
		if (($css = unitravel_get_inline_css()) != '') {
			wp_enqueue_style(  'unitravel-inline-styles',  unitravel_get_file_url('css/__inline.css') );
			wp_add_inline_style( 'unitravel-inline-styles', $css );
		}
	}
}


/**
 * Fire the wp_body_open action.
 *
 * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
 */
if ( ! function_exists( 'wp_body_open' ) ) {
	function wp_body_open() {
		/**
		 * Triggered after the opening <body> tag.
		 */
		do_action('wp_body_open');
	}
}


//-------------------------------------------------------
//-- Sidebars and widgets
//-------------------------------------------------------

// Register widgetized areas
if ( !function_exists('unitravel_register_sidebars') ) {
	
	function unitravel_register_sidebars() {
		$sidebars = unitravel_get_sidebars();
		if (is_array($sidebars) && count($sidebars) > 0) {
			foreach ($sidebars as $id=>$sb) {
				register_sidebar( array(
										'name'          => $sb['name'],
										'description'   => $sb['description'],
										'id'            => $id,
										'before_widget' => '<aside id="%1$s" class="widget %2$s">',
										'after_widget'  => '</aside>',
										'before_title'  => '<h5 class="widget_title">',
										'after_title'   => '</h5>'
										)
								);
			}
		}
	}
}

// Return theme specific widgetized areas
if ( !function_exists('unitravel_get_sidebars') ) {
	function unitravel_get_sidebars() {
		$list = apply_filters('unitravel_filter_list_sidebars', array(
			'sidebar_widgets'		=> array(
											'name' => esc_html__('Sidebar Widgets', 'unitravel'),
											'description' => esc_html__('Widgets to be shown on the main sidebar', 'unitravel')
											),
			'header_widgets'		=> array(
											'name' => esc_html__('Header Widgets', 'unitravel'),
											'description' => esc_html__('Widgets to be shown at the top of the page (in the page header area)', 'unitravel')
											),
			'above_page_widgets'	=> array(
											'name' => esc_html__('Above Page Widgets', 'unitravel'),
											'description' => esc_html__('Widgets to be shown below the header, but above the content and sidebar', 'unitravel')
											),
			'above_content_widgets' => array(
											'name' => esc_html__('Above Content Widgets', 'unitravel'),
											'description' => esc_html__('Widgets to be shown above the content, near the sidebar', 'unitravel')
											),
			'below_content_widgets' => array(
											'name' => esc_html__('Below Content Widgets', 'unitravel'),
											'description' => esc_html__('Widgets to be shown below the content, near the sidebar', 'unitravel')
											),
			'below_page_widgets' 	=> array(
											'name' => esc_html__('Below Page Widgets', 'unitravel'),
											'description' => esc_html__('Widgets to be shown below the content and sidebar, but above the footer', 'unitravel')
											),
			'footer_widgets'		=> array(
											'name' => esc_html__('Footer Widgets', 'unitravel'),
											'description' => esc_html__('Widgets to be shown at the bottom of the page (in the page footer area)', 'unitravel')
											)
			)
		);
		return $list;
	}
}


//-------------------------------------------------------
//-- Theme fonts
//-------------------------------------------------------

// Return links for all theme fonts
if ( !function_exists('unitravel_theme_fonts_links') ) {
	function unitravel_theme_fonts_links() {
		$links = array();
		
		/*
		Translators: If there are characters in your language that are not supported
		by chosen font(s), translate this to 'off'. Do not translate into your own language.
		*/
		$google_fonts_enabled = ( 'off' !== esc_html_x( 'on', 'Google fonts: on or off', 'unitravel' ) );
		$custom_fonts_enabled = ( 'off' !== esc_html_x( 'on', 'Custom fonts (included in the theme): on or off', 'unitravel' ) );
		
		if ( ($google_fonts_enabled || $custom_fonts_enabled) && !unitravel_storage_empty('load_fonts') ) {
			$load_fonts = unitravel_storage_get('load_fonts');
			if (count($load_fonts) > 0) {
				$google_fonts = '';
				foreach ($load_fonts as $font) {
					$slug = unitravel_get_load_fonts_slug($font['name']);
					$url  = unitravel_get_file_url( sprintf('css/font-face/%s/stylesheet.css', $slug));
					if ($url != '') {
						if ($custom_fonts_enabled) {
							$links[$slug] = $url;
						}
					} else {
						if ($google_fonts_enabled) {
							$google_fonts .= ($google_fonts ? '|' : '') 
											. str_replace(' ', '+', $font['name'])
											. ':' 
											. (empty($font['styles']) ? '400,400italic,700,700italic' : $font['styles']);
						}
					}
				}
				if ($google_fonts && $google_fonts_enabled) {
					$links['google_fonts'] = sprintf('//fonts.googleapis.com/css?family=%s&subset=%s', $google_fonts, unitravel_get_theme_option('load_fonts_subset'));
				}
			}
		}
		return $links;
	}
}

// Return links for WP Editor
if ( !function_exists('unitravel_theme_fonts_for_editor') ) {
	function unitravel_theme_fonts_for_editor() {
		$links = array_values(unitravel_theme_fonts_links());
		if (is_array($links) && count($links) > 0) {
			for ($i=0; $i<count($links); $i++) {
				$links[$i] = str_replace(',', '%2C', $links[$i]);
			}
		}
		return $links;
	}
}


//-------------------------------------------------------
//-- The Excerpt
//-------------------------------------------------------
if ( !function_exists('unitravel_excerpt_length') ) {
	function unitravel_excerpt_length( $length ) {
		return max(1, unitravel_get_theme_setting('max_excerpt_length'));
	}
}

if ( !function_exists('unitravel_excerpt_more') ) {
	function unitravel_excerpt_more( $more ) {
		return '&hellip;';
	}
}


//------------------------------------------------------------------------
// One-click import support
//------------------------------------------------------------------------

// Set theme specific importer options
if ( !function_exists( 'unitravel_importer_set_options' ) ) {
	
	function unitravel_importer_set_options($options=array()) {
		if (is_array($options)) {
			// Save or not installer's messages to the log-file
			$options['debug'] = false;
			// Prepare demo data
			$options['demo_url'] = esc_url(unitravel_get_protocol() . '://demofiles.ancorathemes.com/unitravel');
			// Required plugins
			$options['required_plugins'] = unitravel_storage_get('required_plugins');
			// Default demo
			$options['files']['default']['title'] = esc_html__('UniTravel Demo', 'unitravel');
			$options['files']['default']['domain_dev']  = unitravel_add_protocol( '//unitravel.dv.ancorathemes.com' );
			$options['files']['default']['domain_demo'] = unitravel_add_protocol( unitravel_storage_get( 'theme_demo_url' ) );
			// If theme need more demo - just copy 'default' and change required parameter

		}
		return $options;
	}
}



//-------------------------------------------------------
//-- Include theme (or child) PHP-files
//-------------------------------------------------------

require_once UNITRAVEL_THEME_DIR . 'includes/utils.php';
require_once UNITRAVEL_THEME_DIR . 'includes/storage.php';
require_once UNITRAVEL_THEME_DIR . 'includes/lists.php';
require_once UNITRAVEL_THEME_DIR . 'includes/wp.php';

if (is_admin()) {
	require_once UNITRAVEL_THEME_DIR . 'includes/tgmpa/class-tgm-plugin-activation.php';
	require_once UNITRAVEL_THEME_DIR . 'includes/admin.php';
}

require_once UNITRAVEL_THEME_DIR . 'theme-options/theme.customizer.php';

require_once UNITRAVEL_THEME_DIR . 'theme-specific/trx_addons.php';

require_once UNITRAVEL_THEME_DIR . 'includes/theme.tags.php';
require_once UNITRAVEL_THEME_DIR . 'includes/theme.hovers/theme.hovers.php';


// Plugins support
if (is_array($UNITRAVEL_STORAGE['required_plugins']) && count($UNITRAVEL_STORAGE['required_plugins']) > 0) {
	foreach ($UNITRAVEL_STORAGE['required_plugins'] as $plugin_slug) {
		$plugin_slug = unitravel_esc($plugin_slug);
		$plugin_path = UNITRAVEL_THEME_DIR . sprintf('plugins/%s/%s.php', $plugin_slug, $plugin_slug);
		if (file_exists($plugin_path)) { require_once $plugin_path; }
	}
}
?>