<?php
/* Instagram Feed support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'unitravel_instagram_feed_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'unitravel_instagram_feed_theme_setup9', 9 );
	function unitravel_instagram_feed_theme_setup9() {
		if ( unitravel_exists_instagram_feed() ) {
			add_action( 'wp_enqueue_scripts', 'unitravel_instagram_responsive_styles', 2000 );
			add_filter( 'unitravel_filter_merge_styles_responsive', 'unitravel_instagram_merge_styles_responsive' );
		}
		if ( is_admin() ) {
			add_filter( 'unitravel_filter_tgmpa_required_plugins', 'unitravel_instagram_feed_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'unitravel_instagram_feed_tgmpa_required_plugins' ) ) {
	
	function unitravel_instagram_feed_tgmpa_required_plugins( $list = array() ) {
		if (in_array('instagram-feed', unitravel_storage_get('required_plugins'))) {
			$list[] = array(
				'name' 		=> esc_html__('Instagram Feed', 'unitravel'),
				'slug'     => 'instagram-feed',
				'required' => false,
			);
		}
		return $list;
	}
}

// Check if Instagram Feed installed and activated
if ( ! function_exists( 'unitravel_exists_instagram_feed' ) ) {
	function unitravel_exists_instagram_feed() {
		return defined( 'SBIVER' );
	}
}

// Enqueue responsive styles for frontend
if ( ! function_exists( 'unitravel_instagram_responsive_styles' ) ) {
	
	function unitravel_instagram_responsive_styles() {
		if ( unitravel_is_on( unitravel_get_theme_option( 'debug_mode' ) ) ) {
			$unitravel_url = unitravel_get_file_url( 'plugins/instagram/instagram-responsive.css' );
			if ( '' != $unitravel_url ) {
				wp_enqueue_style( 'unitravel-instagram-responsive', $unitravel_url, array(), null );
			}
		}
	}
}

// Merge responsive styles
if ( ! function_exists( 'unitravel_instagram_merge_styles_responsive' ) ) {
	
	function unitravel_instagram_merge_styles_responsive( $list ) {
		$list[] = 'plugins/instagram/instagram-responsive.css';
		return $list;
	}
}

