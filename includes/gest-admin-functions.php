<?php

// includes/gest-admin-functions

/**
 * Prevent direct access to this file.
 *
 * @since 1.3.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


// plugins


// child themes


add_action( 'genesis_import_export_form', 'ddw_gest_exporter_notice' );
/**
 * Adds an extra info message at the bottom of the Genesis Exporter page,
 *   informing the user that there's no warranty supplied for the use of this
 *   plugin!
 *
 * @since 1.0.0
 *
 * @uses ddw_gest_plugin_help_content_faq()
 *
 * @global string $gest_plugins_notice, $gest_ct_notice
 */
function ddw_gest_exporter_notice() {

	global $gest_plugins_notice, $gest_ct_notice;

	/** Bail early if no supported plugins or child themes are active */
	if ( ( 'no_child_themes' == $gest_ct_notice ) && ( 'no_plugins_active' == $gest_plugins_notice ) ) {
		return;
	}

	/** Begin table code */
	?>
		<tr>
			<th scope="row">
				<h4>&rarr; <?php echo sprintf(
					/* translators: %s - name of plugin, "Genesis Extra Settings Transporter" */
					__( 'Notes for the %s plugin', 'genesis-extra-settings-transporter' ),
					'&raquo;' . __( 'Genesis Extra Settings Transporter', 'genesis-extra-settings-transporter' ) . '&laquo;'
				); ?>:</h4>
			</th>
				<td>
					<p><br /><?php echo sprintf(
						/* translators: %1$s - label "Plugin" / %2$s - label "Child Theme" */
						__( 'Check boxes in the Exporter section above that have a label with the prefix %1$s or %2$s are from that plugin.', 'genesis-extra-settings-transporter' ),
						'<code>' . GEST_PLUGIN_STRING . '</code>',
						'<code>' . GEST_CHILD_THEME_STRING . '</code>'
					); ?></p>
					<p><?php _e( 'There\'s NO warranty supplied when you use this plugin, all at your own risk!', 'genesis-extra-settings-transporter' ); ?>
					</p>
					<?php echo ddw_gest_plugin_help_content_faq(); ?>
				</td>
		</tr>
	<?php
	/** ^End table code */

}  // end function
