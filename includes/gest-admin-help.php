<?php

// includes/gest-admin-help

/**
 * Prevent direct access to this file.
 *
 * @since 1.3.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'load-genesis_page_genesis-import-export', 'ddw_gest_help_tab' );	// Genesis Import/Export page
/**
 * Create and display plugin help tab.
 *
 * @since 1.0.0
 *
 * @uses get_current_screen()
 * @uses WP_Screen::add_help_tab()
 * @uses WP_Screen::set_help_sidebar()
 * @uses ddw_gest_help_sidebar_content()
 *
 * @global object $GLOBALS[ 'gest_exporter_screen' ]
 */
function ddw_gest_help_tab() {

	global $gest_exporter_screen;

	$GLOBALS[ 'gest_exporter_screen' ] = get_current_screen();

	if ( basename( get_template_directory() ) !== 'genesis' ) {
		return;
	}

	/** Add the new help tab */
	$GLOBALS[ 'gest_exporter_screen' ]->add_help_tab(
		array(
			'id'       => 'gest-exporter-help',
			'title'    => __( 'Genesis Extra Settings Transporter', 'genesis-extra-settings-transporter' ),
			'callback' => 'ddw_gest_help_content',
		)
	);

	/** Add help sidebar */
	$GLOBALS[ 'gest_exporter_screen' ]->set_help_sidebar( ddw_gest_help_sidebar_content() );

}  // end function


/**
 * Create and display plugin help tab content.
 *
 * @since 1.0.0
 * @since 1.4.0 Refactoring.
 *
 * @uses ddw_gest_info_values()
 * @uses ddw_gest_plugin_help_content_faq()
 * @uses ddw_gest_get_info_url()
 */
function ddw_gest_help_content() {

	$gest_info = (array) ddw_gest_info_values();

	echo '<h3>' . __( 'Plugin', 'genesis-extra-settings-transporter' ) . ': ' . __( 'Genesis Extra Settings Transporter', 'genesis-extra-settings-transporter' ) . ' <small>v' . GEST_PLUGIN_VERSION . '</small></h3>';

	echo '<h4><em>' . __( 'A Typical Workflow Example', 'genesis-extra-settings-transporter' ) . '</em></h4>' .
		'<p><em>' . __( 'Transfer settings from a development install to the live/ production install.', 'genesis-extra-settings-transporter' ) . '</em></p>' .
		'<blockquote><p><strong>' . __( 'Prerequisites/ Requirements', 'genesis-extra-settings-transporter' ) . ':</strong></p>' .
		'<ul>' .
			'<li>' . sprintf(
				/* translators: %s - child theme name, "Curtail" */
				__( 'On BOTH sites/ installations you have installed & activated for example the (great) %s child theme, plus the following plugins:', 'genesis-extra-settings-transporter' ),
				'&raquo;' . __( 'Curtail', 'genesis-extra-settings-transporter' ) . '&laquo;'
			) . ' Genesis Layout Extras, Genesis Responsive Slider, Genesis Simple Hooks, Genesis Simple Sidebars.</li>' .
			'<li>' . sprintf(
				/* translators: %s - name of plugin, "Genesis Extra Settings Transporter" */
				__( 'On BOTH sites/ installations you have installed & activated this plugin, %s.', 'genesis-extra-settings-transporter' ),
				'&raquo;' . __( 'Genesis Extra Settings Transporter', 'genesis-extra-settings-transporter' ) . '&laquo;'
			) . '</li>' .
			'<li>' . __( 'It\'s recommended to have THE VERY SAME VERSIONS installed on the original site and also the receiving site. Reason: sometimes settings differ between plugin or child theme versions. So with making sure you have the same versions installed you just ensure the correct settings are included within the export file.', 'genesis-extra-settings-transporter' ) . '</li>' .
			'</ul>' .
		'<p><strong>' . __( 'Transfer', 'genesis-extra-settings-transporter' ) . ':</strong></p>' .
		'<ul>' .
			'<li>' . sprintf(
				/* translators: %s label "Genesis &#x2192; Import/Export" */
				__( 'On the development install: Just make an Export file via %s admin page:', 'genesis-extra-settings-transporter' ),
				'&raquo;' . __( 'Genesis &#x2192; Import/Export', 'genesis-extra-settings-transporter' ) . '&laquo;'
			) . '</li>' .
			'<li>' . sprintf(
				/* translators: %s - label "Export" */
				__( 'In the %s section there enable all checkboxes you need.', 'genesis-extra-settings-transporter' ),
				'&raquo;' . __( 'Export', 'genesis-extra-settings-transporter' ) . '&laquo;'
			) . '</li>' .
			'<li>' . sprintf(
				/* translators: %s - file type, ".JSON" */
				__( 'Save the %s file to your computer.', 'genesis-extra-settings-transporter' ),
				'<code>.JSON</code>'
			) . '</li>' .
			'<li>' . sprintf(
				/* translators: %s - file type, ".JSON" */
				__( 'On the live/ production site, just import this %s file and you\'re done!', 'genesis-extra-settings-transporter' ),
				'<code>.JSON</code>'
			) . '</li>' .
		'</ul></blockquote>';

	echo '<hr class="div" />';

	echo '<p><strong>' . __( 'What is supported?', 'genesis-extra-settings-transporter' ) . '</strong></p>' .
		'<ul>' .
			'<li><a href="' . ddw_gest_get_info_url( 'urls_plugins' ) . '" target="_blank" rel="noopener noreferrer">' . __( 'List of all supported plugins', 'genesis-extra-settings-transporter' ) . '</a></li>' .
			'<li><a href="' . ddw_gest_get_info_url( 'urls_child_themes' ) . '" target="_blank" rel="noopener noreferrer">' . __( 'List of all supported child themes', 'genesis-extra-settings-transporter' ) . '</a></li>' .
		'</ul>';

	echo '<hr class="div" />';

	echo ddw_gest_plugin_help_content_faq();

	/** Further help content */
	echo $gest_info[ 'space_helper' ] . '<p><h4 style="font-size: 1.1em;">' . __( 'Important plugin links:', 'genesis-extra-settings-transporter' ) . '</h4>' .

		ddw_gest_get_info_link( 'url_plugin', esc_html__( 'Plugin website', 'genesis-extra-settings-transporter' ), 'button' ) .

		'&nbsp;&nbsp;' . ddw_gest_get_info_link( 'url_plugin_faq', esc_html_x( 'FAQ', 'Help tab info', 'genesis-extra-settings-transporter' ), 'button' ) .

		'&nbsp;&nbsp;' . ddw_gest_get_info_link( 'url_wporg_forum', esc_html_x( 'Support', 'Help tab info', 'genesis-extra-settings-transporter' ), 'button' ) .

		'&nbsp;&nbsp;' . ddw_gest_get_info_link( 'url_fb_group', esc_html_x( 'Facebook Group', 'Help tab info', 'genesis-extra-settings-transporter' ), 'button' ) .

		'&nbsp;&nbsp;' . ddw_gest_get_info_link( 'url_translate', esc_html_x( 'Translations', 'Help tab info', 'genesis-extra-settings-transporter' ), 'button' ) .

		'&nbsp;&nbsp;' . ddw_gest_get_info_link( 'url_donate', esc_html_x( 'Donate', 'Help tab info', 'genesis-extra-settings-transporter' ), 'button button-primary dashicons-before dashicons-thumbs-up gest' ) .

		sprintf(
			'<p><a href="%1$s" target="_blank" rel="nofollow noopener noreferrer" title="%2$s">%2$s</a> &#x000A9; %3$s <a href="%4$s" target="_blank" rel="noopener noreferrer" title="%5$s">%5$s</a></p>',
			esc_url( $gest_info[ 'url_license' ] ),
			esc_attr( $gest_info[ 'license' ] ),
			ddw_gest_coding_years(),
			esc_url( $gest_info[ 'author_uri' ] ),
			esc_html( $gest_info[ 'author' ] )
		);

}  // end function


/**
 * Create and display plugin help tab content for "FAQ" part.
 *
 * @since 1.1.0
 * @since 1.4.0 Refactoring.
 *
 * @uses ddw_gest_is_simple_sidebars_active()
 * @uses ddw_gest_is_widget_importer_exporter_active()
 * @uses ddw_gest_get_info_url()
 *
 * @return string HTML help content FAQ.
 */
function ddw_gest_plugin_help_content_faq() {

	if ( ddw_gest_is_simple_sidebars_active() ) {

		$gest_faq_content_ss = '<p><strong>' . sprintf(
			/* translators: %s - name of a plugin, "Genesis Simple Sidebars" */
			__( 'For the %s plugin: Why are inpost/ inpage settings not included?', 'genesis-extra-settings-transporter' ),
			'&raquo;' . __( 'Genesis Simple Sidebars', 'genesis-extra-settings-transporter' ) . '&laquo;'
		) . '</strong><blockquote>' . sprintf(
			/* translators: %s - linked text, "native WordPress export and import functionality" */
			__( 'This is not possible as these settings belong to the actual post meta. You can always import & export all posts/ pages/ custom post types via %s, including those settings.', 'genesis-extra-settings-transporter' ),
			'<a href="' . admin_url( 'export.php' ). '">' . __( 'native WordPress export and import functionality', 'genesis-extra-settings-transporter' ) . '</a>'
		) . '</blockquote></p>';

	} else {

		$gest_faq_content_ss = '';

	}  // end if

	/** "Widget Importer & Exporter" plugin helper links/ strings */
	if ( ddw_gest_is_widget_importer_exporter_active() ) {

		$gest_wie_link   = '<a href="' . ddw_gest_get_info_url( 'wie_url_admin' ) . '">';
		$gest_wie_status = __( 'currently active', 'genesis-extra-settings-transporter' );
		$gest_wie_action = ' &rarr; <em><a href="' . ddw_gest_get_info_url( 'wie_url_admin' ) . '">' . __( 'Import/ Export', 'genesis-extra-settings-transporter' ) . '</a></em>';

	} else {

		$gest_wie_link   = '<a href="' . ddw_gest_get_info_url( 'wie_url_plugin' ) . '" target="_blank" rel="noopener noreferrer">';
		$gest_wie_status = __( 'not active/ installed', 'genesis-extra-settings-transporter' );
		$gest_wie_action = '';

	}  // end if

	$gest_faq_content_wsie = '<p><strong>' . __( 'For Widget settings:', 'genesis-extra-settings-transporter' ) . '</strong><blockquote>' . sprintf(
		/* translators: %s - name of a plugin, "Widget Importer & Exporter" */
		__( 'Not possible, there is no such functionality in WordPress core as is in Genesis yet! However, there\'s a very useful third-party plugin for that: %s', 'genesis-extra-settings-transporter' ),
		$gest_wie_link . __( 'Widget Importer & Exporter', 'genesis-extra-settings-transporter' ) . '</a>'
	) . $gest_wie_action . ' <small>(' . __( 'Plugin', 'genesis-extra-settings-transporter' ) . ': ' . $gest_wie_status . ')</small></blockquote></p>';

	return apply_filters(
		'gest_filter_help_faq_content',
		$gest_faq_content_ss . $gest_faq_content_wsie
	);

}  // end function


/**
 * Helper function for returning the Help Sidebar content.
 *
 * @since 1.0.0
 * @since 1.4.0 Refactoring.
 *
 * @uses ddw_gest_get_info_url()
 *
 * @return string HTML content for help sidebar.
 */
function ddw_gest_help_sidebar_content() {

	$gest_help_sidebar_content = '<p><strong>' . __( 'More about the plugin author', 'genesis-extra-settings-transporter' ) . '</strong></p>';

	$gest_help_sidebar_content .= '<p>' . __( 'Social:', 'genesis-extra-settings-transporter' ) . '<br /><a href="' . ddw_gest_get_info_url( 'url_twitter' ) . '" target="_blank" rel="noopener noreferrer" title="@ Twitter">Twitter</a> | <a href="' . ddw_gest_get_info_url( 'url_fb_group' ) . '" target="_blank" rel="noopener noreferrer" title="@ Facebook">Facebook</a> | <a href="' . ddw_gest_get_info_url( 'url_github_follow' ) . '" target="_blank" rel="noopener noreferrer" title="@ GitHub">GitHub</a> | <a href="' . ddw_gest_get_info_url( 'url_wporg_profile' ) . '" target="_blank" rel="noopener noreferrer" title="@ deckerweb.de">deckerweb</a></p>';

	$gest_help_sidebar_content .= '<p><a href="' . ddw_gest_get_info_url( 'author_uri' ) . '" target="_blank" rel="noopener noreferrer" title="@ WordPress.org">@ WordPress.org</a></p>';

	return apply_filters(
		'gest_filter_help_sidebar_content',
		$gest_help_sidebar_content
	);

}  // end function
