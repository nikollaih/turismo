<?php
/**
 * ThemeREX Addons Custom post type: Team
 *
 * @package WordPress
 * @subpackage ThemeREX Addons
 * @since v1.2
 */

// Don't load directly
if ( ! defined( 'TRX_ADDONS_VERSION' ) ) {
	die( '-1' );
}


// -----------------------------------------------------------------
// -- Custom post type registration
// -----------------------------------------------------------------

// Define Custom post type and taxonomy constants
if ( ! defined('TRX_ADDONS_CPT_TEAM_PT') ) define('TRX_ADDONS_CPT_TEAM_PT', trx_addons_cpt_param('team', 'post_type'));
if ( ! defined('TRX_ADDONS_CPT_TEAM_TAXONOMY') ) define('TRX_ADDONS_CPT_TEAM_TAXONOMY', trx_addons_cpt_param('team', 'taxonomy'));


// Register post type and taxonomy
if (!function_exists('trx_addons_cpt_team_init')) {
	add_action( 'init', 'trx_addons_cpt_team_init' );
	function trx_addons_cpt_team_init() {

		// Add Team parameters to the Meta Box support
		global $TRX_ADDONS_STORAGE;	// Need to declare global, because this file included inside autoload function!
		$TRX_ADDONS_STORAGE['post_types'][] = TRX_ADDONS_CPT_TEAM_PT;
		$TRX_ADDONS_STORAGE['meta_box_'.TRX_ADDONS_CPT_TEAM_PT] = array(
			"subtitle" => array(
				"title" => esc_html__("Position",  'trx_addons'),
				"desc" => wp_kses_data( __("Team member's position or any other text", 'trx_addons') ),
				"std" => "",
				"type" => "text"
			),
			"brief_info" => array(
				"title" => esc_html__("Brief info",  'trx_addons'),
				"desc" => wp_kses_data( __("Brief info about this team member to display on the member's single page", 'trx_addons') ),
				"std" => "",
				"type" => "textarea"
			),
			"socials" => array(
				"title" => esc_html__("Socials",  'trx_addons'),
				"desc" => wp_kses_data( __("Links to profiles in the social networks in format: social_slug=url_to_profile. Each social network in the new line", 'trx_addons') ),
				"std" => "",
				"type" => "textarea"
			)
		);

		// Register post type and taxonomy
		register_post_type( TRX_ADDONS_CPT_TEAM_PT, array(
			'label'               => esc_html__( 'Team', 'trx_addons' ),
			'description'         => esc_html__( 'Team Description', 'trx_addons' ),
			'labels'              => array(
				'name'                => esc_html__( 'Team', 'trx_addons' ),
				'singular_name'       => esc_html__( 'Team member', 'trx_addons' ),
				'menu_name'           => esc_html__( 'Team', 'trx_addons' ),
				'parent_item_colon'   => esc_html__( 'Parent Item:', 'trx_addons' ),
				'all_items'           => esc_html__( 'All Team', 'trx_addons' ),
				'view_item'           => esc_html__( 'View Team member', 'trx_addons' ),
				'add_new_item'        => esc_html__( 'Add New Team member', 'trx_addons' ),
				'add_new'             => esc_html__( 'Add New', 'trx_addons' ),
				'edit_item'           => esc_html__( 'Edit Team member', 'trx_addons' ),
				'update_item'         => esc_html__( 'Update Team member', 'trx_addons' ),
				'search_items'        => esc_html__( 'Search Team member', 'trx_addons' ),
				'not_found'           => esc_html__( 'Not found', 'trx_addons' ),
				'not_found_in_trash'  => esc_html__( 'Not found in Trash', 'trx_addons' ),
			),
			'taxonomies'          => array(TRX_ADDONS_CPT_TEAM_TAXONOMY),
			'supports'            => trx_addons_cpt_param('team', 'supports'),
			'public'              => true,
			'hierarchical'        => false,
			'has_archive'         => true,
			'can_export'          => true,
			'show_in_admin_bar'   => true,
			'show_in_menu'        => true,
			'show_in_rest' 		  => true,
			'menu_position'       => '53.8',
			'menu_icon'			  => 'dashicons-admin-users',
			'capability_type'     => 'post',
			'rewrite'             => array( 'slug' => trx_addons_cpt_param('team', 'post_type_slug') )
			)
		);

		register_taxonomy( TRX_ADDONS_CPT_TEAM_TAXONOMY, TRX_ADDONS_CPT_TEAM_PT, array(
			'post_type' 		=> TRX_ADDONS_CPT_TEAM_PT,
			'hierarchical'      => true,
			'labels'            => array(
				'name'              => esc_html__( 'Team Group', 'trx_addons' ),
				'singular_name'     => esc_html__( 'Group', 'trx_addons' ),
				'search_items'      => esc_html__( 'Search Groups', 'trx_addons' ),
				'all_items'         => esc_html__( 'All Groups', 'trx_addons' ),
				'parent_item'       => esc_html__( 'Parent Group', 'trx_addons' ),
				'parent_item_colon' => esc_html__( 'Parent Group:', 'trx_addons' ),
				'edit_item'         => esc_html__( 'Edit Group', 'trx_addons' ),
				'update_item'       => esc_html__( 'Update Group', 'trx_addons' ),
				'add_new_item'      => esc_html__( 'Add New Group', 'trx_addons' ),
				'new_item_name'     => esc_html__( 'New Group Name', 'trx_addons' ),
				'menu_name'         => esc_html__( 'Team Groups', 'trx_addons' ),
			),
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => trx_addons_cpt_param('team', 'taxonomy_slug') )
			)
		);
	}
}

// Add 'Team' parameters in the ThemeREX Addons Options
if (!function_exists('trx_addons_cpt_team_options')) {
	add_action( 'trx_addons_filter_options', 'trx_addons_cpt_team_options');
	function trx_addons_cpt_team_options($options) {

		trx_addons_array_insert_after($options, 'cpt_section', array(
			// team settings
			'team_info' => array(
				"title" => esc_html__('Team', 'trx_addons'),
				"desc" => wp_kses_data( __('Settings of the team members archive', 'trx_addons') ),
				"type" => "info"
			),
			'team_style' => array(
				"title" => esc_html__('Style', 'trx_addons'),
				"desc" => wp_kses_data( __('Style of the team archive', 'trx_addons') ),
				"std" => 'default_2',
				"options" => apply_filters('trx_addons_filter_cpt_archive_styles', array(
					'default_2' => esc_html__('Default /2 columns/', 'trx_addons'),
					'default_3' => esc_html__('Default /3 columns/', 'trx_addons')
				), TRX_ADDONS_CPT_TEAM_PT),
				"type" => "select"
			)
		));
		return $options;
	}
}

	
// Load required styles and scripts for the frontend
if ( !function_exists( 'trx_addons_cpt_team_load_scripts_front' ) ) {
	add_action("wp_enqueue_scripts", 'trx_addons_cpt_team_load_scripts_front');
	function trx_addons_cpt_team_load_scripts_front() {
		if (trx_addons_is_on(trx_addons_get_option('debug_mode'))) {
			wp_enqueue_style( 'trx_addons-cpt_team', trx_addons_get_file_url('cpt/team/team.css'), array(), null );
		}
	}
}

	
// Merge shortcode's specific styles into single stylesheet
if ( !function_exists( 'trx_addons_cpt_team_merge_styles' ) ) {
	add_action("trx_addons_filter_merge_styles", 'trx_addons_cpt_team_merge_styles');
	function trx_addons_cpt_team_merge_styles($list) {
		$list[] = 'cpt/team/team.css';
		return $list;
	}
}


// Return true if it's team page
if ( !function_exists( 'trx_addons_is_team_page' ) ) {
	function trx_addons_is_team_page() {
		return defined('TRX_ADDONS_CPT_TEAM_PT') 
					&& !is_search()
					&& (
						(is_single() && get_post_type()==TRX_ADDONS_CPT_TEAM_PT)
						|| is_post_type_archive(TRX_ADDONS_CPT_TEAM_PT)
						|| is_tax(TRX_ADDONS_CPT_TEAM_TAXONOMY)
						);
	}
}


// Return taxonomy for the current post type
if ( !function_exists( 'trx_addons_cpt_team_post_type_taxonomy' ) ) {
	add_filter( 'trx_addons_filter_post_type_taxonomy',	'trx_addons_cpt_team_post_type_taxonomy', 10, 2 );
	function trx_addons_cpt_team_post_type_taxonomy($tax='', $post_type='') {
		if ( defined('TRX_ADDONS_CPT_TEAM_PT') && $post_type == TRX_ADDONS_CPT_TEAM_PT )
			$tax = TRX_ADDONS_CPT_TEAM_TAXONOMY;
		return $tax;
	}
}

// Return link to the all posts for the breadcrumbs
if ( !function_exists( 'trx_addons_cpt_team_get_blog_all_posts_link' ) ) {
	add_filter('trx_addons_filter_get_blog_all_posts_link', 'trx_addons_cpt_team_get_blog_all_posts_link', 10, 2);
	function trx_addons_cpt_team_get_blog_all_posts_link($link='', $args=array()) {
		if ($link=='') {
			if (trx_addons_is_team_page() && !is_post_type_archive(TRX_ADDONS_CPT_TEAM_PT))
				$link = '<a href="'.esc_url(get_post_type_archive_link( TRX_ADDONS_CPT_TEAM_PT )).'">'.esc_html__('All Team Members', 'trx_addons').'</a>';
		}
		return $link;
	}
}


// Return current page title
if ( !function_exists( 'trx_addons_cpt_team_get_blog_title' ) ) {
	add_filter( 'trx_addons_filter_get_blog_title', 'trx_addons_cpt_team_get_blog_title');
	function trx_addons_cpt_team_get_blog_title($title='') {
		if ( defined('TRX_ADDONS_CPT_TEAM_PT') ) {
			if ( is_post_type_archive(TRX_ADDONS_CPT_TEAM_PT) )
				$title = esc_html__('All Team Members', 'trx_addons');
			//else if (is_single() && get_post_type()==TRX_ADDONS_CPT_TEAM_PT)
			//	$title = esc_html__('Team Member', 'trx_addons');

		}
		return $title;
	}
}



// Replace standard theme templates
//-------------------------------------------------------------

// Change standard single template for team posts
if ( !function_exists( 'trx_addons_cpt_team_single_template' ) ) {
	add_filter('single_template', 'trx_addons_cpt_team_single_template');
	function trx_addons_cpt_team_single_template($template) {
		global $post;
		if (is_single() && $post->post_type == TRX_ADDONS_CPT_TEAM_PT)
			$template = trx_addons_get_file_dir('cpt/team/tpl.single.php');
		return $template;
	}
}

// Change standard archive template for team posts
if ( !function_exists( 'trx_addons_cpt_team_archive_template' ) ) {
	add_filter('archive_template',	'trx_addons_cpt_team_archive_template');
	function trx_addons_cpt_team_archive_template( $template ) {
		if ( is_post_type_archive(TRX_ADDONS_CPT_TEAM_PT) )
			$template = trx_addons_get_file_dir('cpt/team/tpl.archive.php');
		return $template;
	}	
}

// Change standard category template for team categories (groups)
if ( !function_exists( 'trx_addons_cpt_team_taxonomy_template' ) ) {
	add_filter('taxonomy_template',	'trx_addons_cpt_team_taxonomy_template');
	function trx_addons_cpt_team_taxonomy_template( $template ) {
		if ( is_tax(TRX_ADDONS_CPT_TEAM_TAXONOMY) )
			$template = trx_addons_get_file_dir('cpt/team/tpl.archive.php');
		return $template;
	}	
}



// Admin utils
// -----------------------------------------------------------------

// Show <select> with team categories in the admin filters area
if (!function_exists('trx_addons_cpt_team_admin_filters')) {
	add_action( 'restrict_manage_posts', 'trx_addons_cpt_team_admin_filters' );
	function trx_addons_cpt_team_admin_filters() {
		if (get_query_var('post_type') != TRX_ADDONS_CPT_TEAM_PT) return;

		$tax = TRX_ADDONS_CPT_TEAM_TAXONOMY;

		if ( !($terms = get_transient("trx_addons_terms_filter_".trim($tax)))) {
			$terms = get_terms($tax);
			set_transient("trx_addons_terms_filter_".trim($tax), $terms, 24*60*60);
		}

		$list = '';
		if (is_array($terms) && count($terms) > 0) {
			$tax_obj = get_taxonomy($tax);
			$list .= '<select name="'.esc_attr($tax).'" id="'.esc_attr($tax).'" class="postform">'
					.  "<option value=''>" . esc_html($tax_obj->labels->all_items) . "</option>";
			foreach ($terms as $term) {
				$list .= '<option value='. esc_attr($term->slug) . (isset($_REQUEST[$tax]) && $_REQUEST[$tax] == $term->slug || (isset($_REQUEST['taxonomy']) && $_REQUEST['taxonomy'] == $tax && isset($_REQUEST['term']) && $_REQUEST['term'] == $term->slug) ? ' selected="selected"' : '') . '>' . esc_html($term->name) . '</option>';
			}
			$list .=  "</select>";
		}
		echo trim($list);
	}
}
  
// Clear terms cache on the taxonomy save
if (!function_exists('trx_addons_cpt_team_admin_clear_cache')) {
	add_action( 'edited_'.TRX_ADDONS_CPT_TEAM_TAXONOMY, 'trx_addons_cpt_team_admin_clear_cache', 10, 1 );
	add_action( 'delete_'.TRX_ADDONS_CPT_TEAM_TAXONOMY, 'trx_addons_cpt_team_admin_clear_cache', 10, 1 );
	add_action( 'created_'.TRX_ADDONS_CPT_TEAM_TAXONOMY, 'trx_addons_cpt_team_admin_clear_cache', 10, 1 );
	function trx_addons_cpt_team_admin_clear_cache( $term_id=0 ) {  
		// verify nonce
		$ok = true;
		if (!empty($_REQUEST['_wpnonce_add-tag'])) {
			check_admin_referer( 'add-tag', '_wpnonce_add-tag' );
		} else if (!empty($_REQUEST['_wpnonce']) && !empty($_REQUEST['tag_ID'])) {
			$tag_ID = (int) $_REQUEST['tag_ID'];
			if ($_POST['action'] == 'editedtag')
				check_admin_referer( 'update-tag_' . $tag_ID );
			else if ($_POST['action'] == 'delete-tag')
				check_admin_referer( 'delete-tag_' . $tag_ID );
			else if ($_POST['action'] == 'delete')
				check_admin_referer( 'bulk-tags' );
			else if ($_POST['action'] == 'bulk-delete')
				check_admin_referer( 'bulk-tags' );
			else
				$ok = false;
		} else
			$ok = false;
		if ($ok) 
			set_transient("trx_addons_terms_filter_".TRX_ADDONS_CPT_TEAM_TAXONOMY, '', 24*60*60);
	}
}


// trx_sc_team
//-------------------------------------------------------------
/*
[trx_sc_team id="unique_id" type="default" cat="category_slug or id" count="3" columns="3" slider="0|1"]
*/
if ( !function_exists( 'trx_addons_sc_team' ) ) {
	function trx_addons_sc_team($atts, $content=null) {	
		$atts = trx_addons_sc_prepare_atts('trx_sc_team', $atts, array(
			// Individual params
			"type" => "default",
			"columns" => "",
			"cat" => "",
			"count" => 3,
			"offset" => 0,
			"orderby" => '',
			"order" => '',
			"ids" => '',
			"inverse" => '',
			"slider" => 0,
			"slider_pagination" => 0,
			"slides_space" => 0,
			"title" => "",
			"subtitle" => "",
			"description" => "",
			"link" => '',
			"link_image" => '',
			"link_text" => esc_html__('Learn more', 'trx_addons'),
			"title_align" => "left",
			"title_style" => "default",
			"title_tag" => '',
			// Common params
			"id" => "",
			"class" => "",
			"css" => ""
			)
		);

		if (!empty($atts['ids'])) {
			$atts['ids'] = str_replace(array(';', ' '), array(',', ''), $atts['ids']);
			$atts['count'] = count(explode(',', $atts['ids']));
		}
		$atts['count'] = max(1, (int) $atts['count']);
		$atts['offset'] = max(0, (int) $atts['offset']);
		if (empty($atts['orderby'])) $atts['orderby'] = 'title';
		if (empty($atts['order'])) $atts['order'] = 'asc';
		$atts['slider'] = max(0, (int) $atts['slider']);
		$atts['slider_pagination'] = $atts['slider'] > 0 ? max(0, (int) $atts['slider_pagination']) : 0;

		ob_start();
		set_query_var('trx_addons_args_sc_team', $atts);
		if (($fdir = trx_addons_get_file_dir('cpt/team/tpl.'.trx_addons_esc($atts['type']).'.php')) != '') { include $fdir; }
		else if (($fdir = trx_addons_get_file_dir('cpt/team/tpl.default.php')) != '') { include $fdir; }
		$output = ob_get_contents();
		ob_end_clean();
		
		return apply_filters('trx_addons_sc_output', $output, 'trx_sc_team', $atts, $content);
	}
}


// Add [trx_sc_team] in the VC shortcodes list
if (!function_exists('trx_addons_sc_team_add_in_vc')) {
	function trx_addons_sc_team_add_in_vc() {

		if (!trx_addons_exists_visual_composer()) return;
		
		add_shortcode("trx_sc_team", "trx_addons_sc_team");
		
		vc_lean_map("trx_sc_team", 'trx_addons_sc_team_add_in_vc_params');
		class WPBakeryShortCode_Trx_Sc_Team extends WPBakeryShortCode {}
	}
	add_action('init', 'trx_addons_sc_team_add_in_vc', 20);
}

// Return params
if (!function_exists('trx_addons_sc_team_add_in_vc_params')) {
	function trx_addons_sc_team_add_in_vc_params() {
		return apply_filters('trx_addons_sc_map', array(
				"base" => "trx_sc_team",
				"name" => esc_html__("Team", 'trx_addons'),
				"description" => wp_kses_data( __("Display team members from specified group", 'trx_addons') ),
				"category" => esc_html__('ThemeREX', 'trx_addons'),
				"icon" => 'icon_trx_sc_team',
				"class" => "trx_sc_team",
				"content_element" => true,
				"is_container" => false,
				"show_settings_on_create" => true,
				"params" => array_merge(
					array(
						array(
							"param_name" => "type",
							"heading" => esc_html__("Layout", 'trx_addons'),
							"description" => wp_kses_data( __("Select shortcode's layout", 'trx_addons') ),
							"admin_label" => true,
							"class" => "",
							"std" => "default",
							"value" => apply_filters('trx_addons_sc_type', array(
								esc_html__('Default', 'trx_addons') => 'default',
								esc_html__('Short', 'trx_addons') => 'short',
								esc_html__('Featured', 'trx_addons') => 'featured'
							), 'trx_sc_team' ),
							"type" => "dropdown"
						),
                        array(
                            "param_name" => "inverse",
                            "heading" => esc_html__("Inverse", 'trx_addons'),
                            "description" => wp_kses_data( __("Inverse team", 'trx_addons') ),
                            'edit_field_class' => 'vc_col-sm-6',
                            'dependency' => array(
                                'element' => 'type',
                                'value' => 'short'
                            ),
                            "std" => "0",
                            "value" => array(esc_html__("Inverse team", 'trx_addons') => "1" ),
                            "type" => "checkbox"
                        ),
						array(
							"param_name" => "cat",
							"heading" => esc_html__("Group", 'trx_addons'),
							"description" => wp_kses_data( __("Team group", 'trx_addons') ),
							"value" => array_merge(array(esc_html__('- Select category -', 'trx_addons') => 0), array_flip(trx_addons_get_list_terms(false, TRX_ADDONS_CPT_TEAM_TAXONOMY))),
							"type" => "dropdown"
						)
					),
					trx_addons_vc_add_query_param(''),
					trx_addons_vc_add_slider_param(),
					trx_addons_vc_add_title_param(),
					trx_addons_vc_add_id_param()
				)
			), 'trx_sc_team' );
	}
}
?>