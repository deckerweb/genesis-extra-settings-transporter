<?php

// includes/gest-admin-extras

/**
 * Prevent direct access to this file.
 *
 * @since 1.3.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Add settings page link to Plugins page.
 *
 * @since 1.0.0
 * @since 1.4.0 Refactoring.
 *
 * @param array $gest_links (Default) Array of plugin action links.
 * @return array Array of link markup/ strings of plugin action links.
 */
function ddw_gest_settings_page_link( $gest_links ) {

	/** Settings (Export/ Import) Admin link */
	$gest_settings_link = sprintf(
		'<a href="%1$s" title="%2$s"><span class="dashicons-before dashicons-controls-repeat"></span> %3$s</a>',
		esc_url( admin_url( 'admin.php?page=genesis-import-export' ) ),
		esc_html__( 'Go to the Genesis Exporter page', 'genesis-extra-settings-transporter' ),
		esc_attr__( 'Export/ Import', 'genesis-extra-settings-transporter' )
	);

	/** Set the order of the links */
	array_unshift( $gest_links, $gest_settings_link );

	/** Display plugin settings links */
	return apply_filters(
		'gest_filter_settings_page_link',
		$gest_links,
		$gest_settings_link 	// additional param
	);

}  // end function


add_filter( 'plugin_row_meta', 'ddw_gest_plugin_links', 10, 2 );
/**
 * Add various support links to plugin page.
 *
 * @since 1.0.0
 * @since 1.4.0 Refactoring.
 *
 * @uses ddw_gest_get_info_link()
 *
 * @param $gest_links
 * @param $gest_file
 *
 * @return strings plugin links
 */
function ddw_gest_plugin_links( $gest_links, $gest_file ) {

	/** Capability check */
	if ( ! current_user_can( 'install_plugins' ) ) {
		return $gest_links;
	}

	/** List additional links only for this plugin */
	if ( $gest_file === GEST_PLUGIN_BASEDIR . 'genesis-extra-settings-transporter.php' ) {

		?>
			<style type="text/css">
				tr[data-plugin="<?php echo $gest_file; ?>"] .plugin-version-author-uri a.dashicons-before:before {
					font-size: 17px;
					margin-right: 2px;
					opacity: .85;
					vertical-align: sub;
				}
			</style>
		<?php

		/* translators: Plugins page listing */
		$gest_links[] = ddw_gest_get_info_link( 'url_wporg_faq', esc_html_x( 'FAQ', 'Plugins page listing', 'genesis-extra-settings-transporter' ), 'dashicons-before dashicons-editor-help' );

		/* translators: Plugins page listing */
		$gest_links[] = ddw_gest_get_info_link( 'url_wporg_forum', esc_html_x( 'Support', 'Plugins page listing', 'genesis-extra-settings-transporter' ), 'dashicons-before dashicons-sos' );

		/* translators: Plugins page listing */
		$gest_links[] = ddw_gest_get_info_link( 'url_fb_group', esc_html_x( 'Facebook Group', 'Plugins page listing', 'genesis-extra-settings-transporter' ), 'dashicons-before dashicons-facebook' );

		/* translators: Plugins page listing */
		$gest_links[] = ddw_gest_get_info_link( 'url_translate', esc_html_x( 'Translations', 'Plugins page listing', 'genesis-extra-settings-transporter' ), 'dashicons-before dashicons-translation' );

		/* translators: Plugins page listing */
		$gest_links[] = ddw_gest_get_info_link( 'url_donate', esc_html_x( 'Donate', 'Plugins page listing', 'genesis-extra-settings-transporter' ), 'button-primary dashicons-before dashicons-thumbs-up' );


	}  // end-if plugin links

	/** Output the links */
	return apply_filters(
		'gest_filter_plugin_links',
		$gest_links
	);

}  // end function


add_filter( 'debug_information', 'ddw_gest_site_health_add_debug_info', 12 );
/**
 * Add additional plugin related info to the Site Health Debug Info section.
 *   (Only relevant for WordPress 5.2 or higher)
 *
 * @link https://make.wordpress.org/core/2019/04/25/site-health-check-in-5-2/
 *
 * @since 1.4.1
 *
 * @param array $debug_info Array holding all Debug Info items.
 * @return array Modified array of Debug Info.
 */
function ddw_gest_site_health_add_debug_info( $debug_info ) {

	/** Add our Debug info */
	$debug_info[ 'genesis-extra-settings-transporter' ] = array(
		'label'  => esc_html__( 'Genesis Extra Settings Transporter', 'genesis-extra-settings-transporter' ) . ' (' . esc_html__( 'Plugin', 'genesis-extra-settings-transporter' ) . ')',
		'fields' => array(
			'gest_plugin_version' => array(
				'label' => __( 'Plugin version', 'genesis-extra-settings-transporter' ),
				'value' => GEST_PLUGIN_VERSION,
			),
			'PARENT_THEME_VERSION' => array(
				'label' => 'Genesis: PARENT_THEME_VERSION',
				'value' => ( ! defined( 'PARENT_THEME_VERSION' ) ? esc_html__( 'Undefined', 'genesis-extra-settings-transporter' ) : PARENT_THEME_VERSION ),
			),
		),
	);

	/** Return modified Debug Info array */
	return $debug_info;

}  // end function


if ( ! function_exists( 'ddw_wp_site_health_remove_percentage' ) ) :

	add_action( 'admin_head', 'ddw_wp_site_health_remove_percentage', 100 );
	/**
	 * Remove the "Percentage Progress" display in Site Health feature as this will
	 *   get users obsessed with fullfilling a 100% where there are non-problems!
	 *
	 * @link https://make.wordpress.org/core/2019/04/25/site-health-check-in-5-2/
	 *
	 * @since 1.4.1
	 */
	function ddw_wp_site_health_remove_percentage() {

		/** Bail early if not on WP 5.2+ */
		if ( version_compare( $GLOBALS[ 'wp_version' ], '5.2-beta', '<' ) ) {
			return;
		}

		?>
			<style type="text/css">
				.site-health-progress {
					display: none;
				}
			</style>
		<?php

	}  // end function

endif;


if ( ! function_exists( 'ddw_genesis_tweak_plugins_submenu' ) ) :

	add_action( 'admin_menu', 'ddw_genesis_tweak_plugins_submenu', 11 );
	/**
	 * Add Genesis submenu redirecting to "genesis" plugin search within the
	 *   WordPress.org Plugin Directory. For Genesis 2.10.0 or higher this
	 *   replaces the "Genesis Plugins" submenu which only lists plugins from
	 *   StudioPress - but there are many more from the community.
	 *
	 * @since 1.4.1
	 *
	 * @uses remove_submenu_page()
	 * @uses add_submenu_page()
	 */
	function ddw_genesis_tweak_plugins_submenu() {

		/** Remove the StudioPress plugins submenu */
		if ( class_exists( 'Genesis_Admin_Plugins' ) ) {
			remove_submenu_page( 'genesis', 'genesis-plugins' );
		}

		/** Add a Genesis community plugins submenu */
		add_submenu_page(
			'genesis',
			esc_html__( 'Genesis Plugins from the Plugin Directory', 'genesis-extra-settings-transporter' ),
			esc_html__( 'Genesis Plugins', 'genesis-extra-settings-transporter' ),
			'install_plugins',
			esc_url( network_admin_url( 'plugin-install.php?s=genesis&tab=search&type=term' ) )
		);

	}  // end function

endif;


/**
 * Inline CSS fix for Plugins page update messages.
 *
 * @since 1.4.0
 *
 * @see ddw_gest_plugin_update_message()
 * @see ddw_gest_multisite_subsite_plugin_update_message()
 */
function ddw_gest_plugin_update_message_style_tweak() {

	?>
		<style type="text/css">
			.gest-update-message p:before,
			.update-message.notice p:empty {
				display: none !important;
			}
		</style>
	<?php

}  // end function


add_action( 'in_plugin_update_message-' . GEST_PLUGIN_BASEDIR . 'genesis-extra-settings-transporter.php', 'ddw_gest_plugin_update_message', 10, 2 );
/**
 * On Plugins page add visible upgrade/update notice in the overview table.
 *   Note: This action fires for regular single site installs, and for Multisite
 *         installs where the plugin is activated Network-wide.
 *
 * @since 1.4.0
 *
 * @param object $data
 * @param object $response
 * @return string Echoed string and markup for the plugin's upgrade/update
 *                notice.
 */
function ddw_gest_plugin_update_message( $data, $response ) {

	if ( isset( $data[ 'upgrade_notice' ] ) ) {

		ddw_gest_plugin_update_message_style_tweak();

		printf(
			'<div class="update-message gest-update-message">%s</div>',
			wpautop( $data[ 'upgrade_notice' ] )
		);

	}  // end if

}  // end function


add_action( 'after_plugin_row_wp-' . GEST_PLUGIN_BASEDIR . 'genesis-extra-settings-transporter.php', 'ddw_gest_multisite_subsite_plugin_update_message', 10, 2 );
/**
 * On Plugins page add visible upgrade/update notice in the overview table.
 *   Note: This action fires for Multisite installs where the plugin is
 *         activated on a per site basis.
 *
 * @since 1.4.0
 *
 * @param string $file
 * @param object $plugin
 * @return string Echoed string and markup for the plugin's upgrade/update
 *                notice.
 */
function ddw_gest_multisite_subsite_plugin_update_message( $file, $plugin ) {

	if ( is_multisite() && version_compare( $plugin[ 'Version' ], $plugin[ 'new_version' ], '<' ) ) {

		$wp_list_table = _get_list_table( 'WP_Plugins_List_Table' );

		ddw_gest_plugin_update_message_style_tweak();

		printf(
			'<tr class="plugin-update-tr"><td colspan="%s" class="plugin-update update-message notice inline notice-warning notice-alt"><div class="update-message gest-update-message"><h4 style="margin: 0; font-size: 14px;">%s</h4>%s</div></td></tr>',
			$wp_list_table->get_column_count(),
			$plugin[ 'Name' ],
			wpautop( $plugin[ 'upgrade_notice' ] )
		);

	}  // end if

}  // end function


/**
 * Optionally tweaking Plugin API results to make more useful recommendations to
 *   the user.
 *
 * @since 1.4.0
 */

add_filter( 'ddwlib_plir/filter/plugins', 'ddw_gest_register_plugin_recommendations' );
/**
 * Register specific plugins for the class "DDWlib Plugin Installer
 *   Recommendations".
 *   Note: The top-level array keys are plugin slugs from the WordPress.org
 *         Plugin Directory.
 *
 * @since 1.4.0
 *
 * @param array $plugins Array holding all plugin recommendations, coming from
 *                        the class and the filter.
 * @return array Filtered and merged array of all plugin recommendations.
 */
function ddw_gest_register_plugin_recommendations( array $plugins ) {
  
  	/** Remove our own slug when we are already active :) */
  	if ( isset( $plugins[ 'genesis-extra-settings-transporter' ] ) ) {
  		$plugins[ 'genesis-extra-settings-transporter' ] = null;
  	}

  	/** Register our additional plugin recommendations */
	$gest_plugins = array(
		'widget-importer-exporter' => array(
			'featured'    => 'yes',
			'recommended' => 'yes',
			'popular'     => 'yes',
		),
		'genesis-layout-extras' => array(
			'featured'    => 'yes',
			'recommended' => 'yes',
			'popular'     => 'yes',
		),
		'genesis-widgetized-notfound' => array(
			'featured'    => 'yes',
			'recommended' => 'yes',
			'popular'     => 'yes',
		),
		'genesis-widgetized-footer' => array(
			'featured'    => 'yes',
			'recommended' => 'yes',
			'popular'     => 'yes',
		),
		'genesis-widgetized-archive' => array(
			'featured'    => 'yes',
			'recommended' => 'yes',
			'popular'     => 'no',
		),
		'genesis-whats-new-info' => array(
			'featured'    => 'yes',
			'recommended' => 'yes',
			'popular'     => 'yes',
		),
		'blox-lite' => array(
			'featured'    => 'yes',
			'recommended' => 'yes',
			'popular'     => 'no',
		),
		'genesis-title-toggle' => array(
			'featured'    => 'yes',
			'recommended' => 'yes',
			'popular'     => 'yes',
		),
		'genesis-footer-builder' => array(
			'featured'    => 'yes',
			'recommended' => 'yes',
			'popular'     => 'no',
		),
		'display-featured-image-genesis' => array(
			'featured'    => 'yes',
			'recommended' => 'yes',
			'popular'     => 'no',
		),
		'genesis-enews-extended' => array(
			'featured'    => 'no',
			'recommended' => 'no',
			'popular'     => 'yes',
		),
		'genesis-simple-edits' => array(
			'featured'    => 'no',
			'recommended' => 'no',
			'popular'     => 'yes',
		),
		'genesis-simple-sidebars' => array(
			'featured'    => 'no',
			'recommended' => 'yes',
			'popular'     => 'yes',
		),
		'genesis-simple-hooks' => array(
			'featured'    => 'no',
			'recommended' => 'no',
			'popular'     => 'yes',
		),
	);

  	/** Merge with the existing recommendations and return */
	return array_merge( $plugins, $gest_plugins );

}  // end function

/** Optionally add string translations for the library */
if ( ! function_exists( 'ddwlib_plir_strings_plugin_installer' ) ) :

	add_filter( 'ddwlib_plir/filter/strings/plugin_installer', 'ddwlib_plir_strings_plugin_installer' );
	/**
	 * Optionally, make strings translateable for included library "DDWlib Plugin
	 *   Installer Recommendations".
	 *   Strings:
	 *    - "Newest" --> tab in plugin installer toolbar
	 *    - "Version:" --> label in plugin installer plugin card
	 *
	 * @since 1.4.0
	 * @since 1.4.1 Added new strings.
	 *
	 * @param array $strings Holds all filterable strings of the library.
	 * @return array Array of tweaked translateable strings.
	 */
	function ddwlib_plir_strings_plugin_installer( $strings ) {

		$strings[ 'newest' ] = _x(
			'Newest',
			'Plugin installer: Tab name in installer toolbar',
			'genesis-extra-settings-transporter'
		);

		$strings[ 'version' ] = _x(
			'Version:',
			'Plugin card: plugin version',
			'genesis-extra-settings-transporter'
		);

		$strings[ 'ddwplugins_tab' ] = _x(
			'deckerweb Plugins',
			'Plugin installer: Tab name in installer toolbar',
			'genesis-extra-settings-transporter'
		);

		$strings[ 'tab_title' ] = _x(
			'deckerweb Plugins',
			'Plugin installer: Page title',
			'genesis-extra-settings-transporter'
		);

		$strings[ 'tab_slogan' ] = __( 'Great helper tools for Site Builders to save time and get more productive', 'genesis-extra-settings-transporter' );

		$strings[ 'tab_info' ] = sprintf(
			__( 'You can use any of our free plugins or premium plugins from %s', 'genesis-extra-settings-transporter' ),
			'<a href="https://deckerweb-plugins.com/" target="_blank" rel="nofollow noopener noreferrer">' . $strings[ 'tab_title' ] . '</a>'
		);

		$strings[ 'tab_newsletter' ] = __( 'Join our Newsletter', 'genesis-extra-settings-transporter' );

		$strings[ 'tab_fbgroup' ] = __( 'Facebook User Group', 'genesis-extra-settings-transporter' );

		return $strings;

	}  // end function

endif;  // function check

/** Include class DDWlib Plugin Installer Recommendations */
require_once( GEST_PLUGIN_DIR . 'includes/ddwlib-plir/ddwlib-plugin-installer-recommendations.php' );
