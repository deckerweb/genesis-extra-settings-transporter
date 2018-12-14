<?php

// includes/gest-functions-global

/**
 * Prevent direct access to this file.
 *
 * @since 1.3.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Is Genesis Simple Sidebars plugin active or not?
 *
 * @since 1.4.0
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_gest_is_simple_sidebars_active() {

	return defined( 'SS_SETTINGS_FIELD' );

}  // end function


/**
 * Is Widget Importer Exporter plugin active or not?
 *
 * @since 1.4.0
 *
 * @return bool TRUE if plugin is active, FALSE otherwise.
 */
function ddw_gest_is_widget_importer_exporter_active() {

	return class_exists( 'Widget_Importer_Exporter' );

}  // end function


/**
 * Setting internal plugin helper values.
 *
 * @since 1.4.0
 *
 * @return array $gest_info Array of info values.
 */
function ddw_gest_info_values() {

	$gest_info = array(

		'url_translate'     => 'https://translate.wordpress.org/projects/wp-plugins/genesis-extra-settings-transporter',
		'url_wporg_faq'     => 'https://wordpress.org/plugins/genesis-extra-settings-transporter/#faq',
		'url_wporg_forum'   => 'https://wordpress.org/support/plugin/genesis-extra-settings-transporter',
		'url_wporg_review'  => 'https://wordpress.org/support/plugin/genesis-extra-settings-transporter/reviews/?filter=5/#new-post',
		'url_wporg_profile' => 'https://profiles.wordpress.org/daveshine/',
		'url_fb_group'      => 'https://www.facebook.com/groups/deckerweb.wordpress.plugins/',
		'url_snippets'      => 'https://github.com/deckerweb/genesis-extra-settings-transporter/wiki/Code-Snippets',
		'author'            => __( 'David Decker - DECKERWEB', 'genesis-extra-settings-transporter' ),
		'author_uri'        => 'https://deckerweb.de/',
		'license'           => 'GPL-2.0-or-later',
		'url_license'       => 'https://opensource.org/licenses/GPL-2.0',
		'first_code'        => '2013',
		'url_donate'        => 'https://www.paypal.me/deckerweb',
		'url_plugin'        => 'https://github.com/deckerweb/genesis-extra-settings-transporter',
		'url_plugin_docs'   => 'https://github.com/deckerweb/genesis-extra-settings-transporter/wiki',
		'url_plugin_faq'    => 'https://wordpress.org/plugins/genesis-extra-settings-transporter/#faq',
		'url_github'        => 'https://github.com/deckerweb/genesis-extra-settings-transporter',
		'url_github_issues' => 'https://github.com/deckerweb/genesis-extra-settings-transporter/issues',
		'url_twitter'       => 'https://twitter.com/deckerweb',
		'url_github_follow' => 'https://github.com/deckerweb',
		'space_helper'      => '<div style="height: 10px;"></div>',

		'urls_plugins'      => 'https://wordpress.org/plugins/genesis-extra-settings-transporter/#faq',
		'urls_child_themes' => 'https://wordpress.org/plugins/genesis-extra-settings-transporter/#faq',

		'wie_url_plugin'    => 'https://wordpress.org/plugins/widget-importer-exporter/',
		'wie_url_admin'     => admin_url( 'tools.php?page=widget-importer-exporter' ),

	);  // end of array

	return $gest_info;

}  // end function


/**
 * Get URL of specific BTC info value.
 *
 * @since 1.4.0
 *
 * @uses ddw_gest_info_values()
 *
 * @param string $url_key String of value key from array of ddw_gest_info_values()
 * @param bool   $raw     If raw escaping or regular escaping of URL gets used
 * @return string URL for info value.
 */
function ddw_gest_get_info_url( $url_key = '', $raw = FALSE ) {

	$gest_info = (array) ddw_gest_info_values();

	$output = esc_url( $gest_info[ sanitize_key( $url_key ) ] );

	if ( TRUE === $raw ) {
		$output = esc_url_raw( $gest_info[ esc_attr( $url_key ) ] );
	}

	return $output;

}  // end function


/**
 * Get link with complete markup for a specific BTC info value.
 *
 * @since 1.4.0
 *
 * @uses ddw_gest_get_info_url()
 *
 * @param string $url_key String of value key
 * @param string $text    String of text and link attribute
 * @param string $class   String of CSS class
 * @return string HTML markup for linked URL.
 */
function ddw_gest_get_info_link( $url_key = '', $text = '', $class = '' ) {

	$link = sprintf(
		'<a class="%1$s" href="%2$s" target="_blank" rel="nofollow noopener noreferrer" title="%3$s">%3$s</a>',
		strtolower( esc_attr( $class ) ),	//sanitize_html_class( $class ),
		ddw_gest_get_info_url( $url_key ),
		esc_html( $text )
	);

	return $link;

}  // end function


/**
 * Get timespan of coding years for this plugin.
 *
 * @since 1.4.0
 *
 * @uses ddw_gest_info_values()
 *
 * @param int $first_year Integer number of first year
 * @return string Timespan of years.
 */
function ddw_gest_coding_years( $first_year = '' ) {

	$gest_info = (array) ddw_gest_info_values();

	$first_year = ( empty( $first_year ) ) ? absint( $gest_info[ 'first_code' ] ) : absint( $first_year );

	/** Set year of first released code */
	$code_first_year = ( date( 'Y' ) == $first_year || 0 === $first_year ) ? '' : $first_year . '&#x02013;';

	return $code_first_year . date( 'Y' );

}  // end function
