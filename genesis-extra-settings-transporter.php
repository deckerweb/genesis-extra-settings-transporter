<?php # -*- coding: utf-8 -*-
/**
 * Main plugin file.
 * @package           Genesis Extra Settings Transporter
 * @author            David Decker
 * @copyright         Copyright (c) 2012-2019, David Decker - DECKERWEB
 * @license           GPL-2.0-or-later
 * @link              https://deckerweb.de/twitter
 * @link              https://www.facebook.com/groups/deckerweb.wordpress.plugins/
 *
 * @wordpress-plugin
 * Plugin Name:       Genesis Extra Settings Transporter
 * Plugin URI:        https://github.com/deckerweb/genesis-extra-settings-transporter
 * Description:       Adds support for exporting settings of various Genesis Framework specific plugins & Child Themes via the Genesis Exporter feature.
 * Version:           1.4.0
 * Author:            David Decker - DECKERWEB
 * Author URI:        https://deckerweb.de/
 * License:           GPL-2.0-or-later
 * License URI:       https://opensource.org/licenses/GPL-2.0
 * Text Domain:       genesis-extra-settings-transporter
 * Domain Path:       /languages/
 * Requires WP:       4.7
 * Requires PHP:      5.6
 * GitHub Plugin URI: https://github.com/deckerweb/genesis-extra-settings-transporter
 * GitHub Branch:     master
 *
 * Copyright (c) 2013-2019 David Decker - DECKERWEB
 *
 *     This file is part of Genesis Extra Settings Transporter,
 *     a plugin for WordPress.
 *
 *     Genesis Extra Settings Transporter is free software:
 *     You can redistribute it and/or modify it under the terms of the
 *     GNU General Public License as published by the Free Software
 *     Foundation, either version 2 of the License, or (at your option)
 *     any later version.
 *
 *     Genesis Extra Settings Transporter is distributed in the hope that
 *     it will be useful, but WITHOUT ANY WARRANTY; without even the
 *     implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR
 *     PURPOSE. See the GNU General Public License for more details.
 *
 *     You should have received a copy of the GNU General Public License
 *     along with WordPress. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Prevent direct access to this file.
 *
 * @since 1.3.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Setting constants
 *
 * @since 1.0.0
 */
/** Set plugin version */
define( 'GEST_PLUGIN_VERSION', '1.4.0' );

/** Plugin directory */
define( 'GEST_PLUGIN_DIR', trailingslashit( dirname( __FILE__ ) ) );

/** Plugin base directory */
define( 'GEST_PLUGIN_BASEDIR', trailingslashit( dirname( plugin_basename( __FILE__ ) ) ) );

/** Required Version of Genesis Framework */
define( 'GEST_REQUIRED_GENESIS', '1.8.2' );


add_action( 'init', 'ddw_gest_load_translations', 1 );
/**
 * Load the text domain for translation of the plugin.
 *
 * @since 1.0.0
 * @since 1.4.0 Refactoring.
 *
 * @uses get_user_locale()
 * @uses load_textdomain() To load translations first from WP_LANG_DIR sub folder.
 * @uses load_plugin_textdomain() To additionally load default translations from plugin folder (default).
 */
function ddw_gest_load_translations() {

	/** Set unique textdomain string */
	$gest_textdomain = 'genesis-extra-settings-transporter';

	/** The 'plugin_locale' filter is also used by default in load_plugin_textdomain() */
	$locale = esc_attr(
		apply_filters(
			'plugin_locale',
			get_user_locale(),
			$gest_textdomain
		)
	);

	/**
	 * WordPress languages directory
	 *   Will default to: wp-content/languages/genesis-extra-settings-transporter/genesis-extra-settings-transporter-{locale}.mo
	 */
	$gest_wp_lang_dir = trailingslashit( WP_LANG_DIR ) . trailingslashit( $gest_textdomain ) . $gest_textdomain . '-' . $locale . '.mo';

	/** Translations: First, look in WordPress' "languages" folder = custom & update-safe! */
	load_textdomain(
		$gest_textdomain,
		$gest_wp_lang_dir
	);

	/** Translations: Secondly, look in 'wp-content/languages/plugins/' for the proper .mo file (= default) */
	load_plugin_textdomain(
		$gest_textdomain,
		FALSE,
		GEST_PLUGIN_BASEDIR . 'languages'
	);

}  // end function


/** Include global functions */
require_once( GEST_PLUGIN_DIR . 'includes/gest-functions-global.php' );


register_activation_hook( __FILE__, 'ddw_gest_activation' );
/**
 * Check the environment when plugin is activated.
 *   - Requirement: Genesis Framework needs to be installed and activated.
 *   - Note: register_activation_hook() isn't run after auto or manual upgrade, only on activation!
 *
 * @since 1.0.0
 *
 * @uses ddw_gest_load_translations()
 * @uses deactivate_plugins()
 * @uses wp_die()
 *
 * @return string Optional plugin activation messages for the user.
 */
function ddw_gest_activation() {

	/** Load translations */
	ddw_gest_load_translations();

	/** Check for activated "Genesis Framework" (= template/parent theme) */
	if ( ( basename( get_template_directory() ) !== 'genesis' )
		&& ! class_exists( 'Genesis_Admin_Boxes' )
	) {

		/** If no Genesis, deactivate ourself */
		deactivate_plugins( plugin_basename( __FILE__ ) );

		/** Message: no Genesis active */
		$gest_genesis_deactivation_message = sprintf(
			/* translators: %1$s - name of plugin, "Genesis Extra Settings Transporter" / %2$s - opening link markup / %3$s - closing link markup / %4$s - Genesis version, for example 2.7.1 */
			__( 'Sorry, you cannot activate the %1$s plugin unless you have installed the latest version of the %2$sGenesis Framework%3$s (at least %4$s).', 'genesis-extra-settings-transporter' ),
			__( 'Genesis Extra Settings Transporter', 'genesis-extra-settings-transporter' ),
			'<a href="https://deckerweb.de/go/genesis/" target="_blank" rel="noopener noreferrer"><strong><em>',
			'</em></strong></a>',
			'<code>' . GEST_REQUIRED_GENESIS . '</code>'
		);

		/** Deactivation message */
		wp_die(
			$gest_genesis_deactivation_message,
			__( 'Plugin', 'genesis-extra-settings-transporter' ) . ': ' . __( 'Genesis Extra Settings Transporter', 'genesis-extra-settings-transporter' ),
			array( 'back_link' => true )
		);

	}  // end if

}  // end function


add_action( 'init', 'ddw_gest_init' );
/**
 * Setup the plugin, load all files.
 *
 * @since 1.0.0
 */
function ddw_gest_init() {

	/** Define constants and set defaults for enabling specific stuff */
	if ( ! defined( 'GEST_NO_PREMISE_EXPORT' ) ) {
		define( 'GEST_NO_PREMISE_EXPORT', FALSE );
	}

	/** Include admin & frontend functions when needed */
	if ( is_admin() ) {

		/** Include main admin functions */
		require_once( GEST_PLUGIN_DIR . 'includes/gest-options-plugins.php' );
		require_once( GEST_PLUGIN_DIR . 'includes/gest-options-child-themes.php' );
		require_once( GEST_PLUGIN_DIR . 'includes/gest-admin-functions.php' );

		/** Include optional "Premise" plugin support */
		if ( ! GEST_NO_PREMISE_EXPORT
			&& ! defined( 'PRST_PLUGIN_BASEDIR' )
			&& defined( 'PREMISE_SETTINGS_FIELD' )
		) {
			require_once( GEST_PLUGIN_DIR . 'includes/gest-options-premise.php' );
		}

		/** Include admin helper stuff */
		require_once( GEST_PLUGIN_DIR . 'includes/gest-admin-help.php' );
		require_once( GEST_PLUGIN_DIR . 'includes/gest-admin-extras.php' );
		
	}  // end if

	/** Add links to Settings links to Plugins page */
	if ( ( is_admin() || is_network_admin() )
		&& ( current_user_can( 'manage_options' ) || current_user_can( 'edit_theme_options' ) )
	) {

		add_filter(
			'plugin_action_links_' . plugin_basename( __FILE__ ),
			'ddw_gest_settings_page_link'
		);

		add_filter(
			'network_admin_plugin_action_links_' . plugin_basename( __FILE__ ),
			'ddw_gest_settings_page_link'
		);

	}  // end if


	/** Enhance the user experience, avoid doubled items :) */
	if ( function_exists( 'gsse_export_options' ) ) {
		remove_filter( 'genesis_export_options', 'gsse_export_options' );
	}
		
}  // end function
