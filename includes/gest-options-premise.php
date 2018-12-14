<?php

// includes/gest-options-premise

/**
 * Prevent direct access to this file.
 *
 * @since 1.3.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'genesis_export_options', 'ddw_gest_premise_export_additions', 17, 1 );
/**
* Hook the "Premise" premium plugin (inclucing its "Member Access" module) into
*   the "Genesis Exporter", allowing those settings to be exported.
*
* @since 1.1.0
*
* @param array $options Genesis Exporter options.
* @return array Modified array of exporter options.
*/
function ddw_gest_premise_export_additions( array $options ) {

	/** Premise (prms) - premium, by Copyblogger Media LLC */
	$options[ 'prms' ] = array(
		'label'          => '*' . __( 'Premium plugin:', 'genesis-extra-settings-transporter' ) . ' ' . __( 'Premise Settings', 'genesis-extra-settings-transporter' ),
		'settings-field' => PREMISE_SETTINGS_FIELD,
	);

	/** Premise 'Custom Code' settings (prmscustom) */
	$options[ 'prmscustom' ] = array(
			'label'          => '*' . __( 'Premise plugin: Custom Code', 'genesis-extra-settings-transporter' ),
			'settings-field' => 'premise-custom',
	);

	/** Premise: Member Access Module (prmsmemb) - premium, by Copyblogger Media LLC */
	if ( defined( 'MEMBER_ACCESS_SETTINGS_FIELD' ) ) {

		$options[ 'prmsmemb' ] = array(
			'label'          => '*' . __( 'Premise Module:', 'genesis-extra-settings-transporter' ) . ' ' . __( 'Member Access Settings', 'genesis-extra-settings-transporter' ),
			'settings-field' => MEMBER_ACCESS_SETTINGS_FIELD,
		);

	}

	/** Return the additional "Premise" settings fields to hook into the Genesis Exporter */
	return $options;

}  // end function
