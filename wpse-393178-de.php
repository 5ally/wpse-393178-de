<?php
/**
 * Plugin Name: WPSE 393178 DE
 * Plugin URI: https://wordpress.stackexchange.com/a/393178
 * Description: Setzen des Gebietsschemas vor dem Abrufen von Gettext-Übersetzungen mit <code>switch_to_locale()</code> :)
 * Author: Sally CJ
 * Version: 1.0
 * Text Domain: wpse-393178-de
 * Domain Path: /languages
 */

add_action( 'init', 'wpse_393178_de_load_textdomain' );
function wpse_393178_de_load_textdomain() {
	load_plugin_textdomain( 'wpse-393178-de', false,
		dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

if ( is_admin() ) {
	require_once __DIR__ . '/class-wpse-393178-de-admin.php';
	new WPSE_393178_DE_Admin();
}
