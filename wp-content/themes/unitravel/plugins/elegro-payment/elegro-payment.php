<?php
/* Elegro Crypto Payment support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'unitravel_elegro_payment_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'unitravel_elegro_payment_theme_setup9', 9 );
	function unitravel_elegro_payment_theme_setup9() {
		if ( unitravel_exists_elegro_payment() ) {
			add_filter( 'unitravel_filter_merge_styles', 'unitravel_elegro_payment_merge_styles' );
		}
		if ( is_admin() ) {
			add_filter( 'unitravel_filter_tgmpa_required_plugins', 'unitravel_elegro_payment_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'unitravel_elegro_payment_tgmpa_required_plugins' ) ) {
	function unitravel_elegro_payment_tgmpa_required_plugins( $list = array() ) {
		if (in_array('elegro-payment', unitravel_storage_get('required_plugins')))
			$list[] = array(
				'name' 		=> esc_html__('elegro Crypto Payment', 'unitravel'),
				'slug' 		=> 'elegro-payment',
				'required' 	=> false
			);
		return $list;
	}
}


// Check if this plugin installed and activated
if ( ! function_exists( 'unitravel_exists_elegro_payment' ) ) {
	function unitravel_exists_elegro_payment() {
		return class_exists( 'WC_Elegro_Payment' );
	}
}

// Merge custom styles
if ( ! function_exists( 'unitravel_elegro_payment_merge_styles' ) ) {
	function unitravel_elegro_payment_merge_styles( $list ) {
		$list[] = 'plugins/elegro-payment/elegro-payment.css';
		return $list;
	}
}