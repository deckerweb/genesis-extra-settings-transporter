<?php

// includes/gest-options-plugins

/**
 * Prevent direct access to this file.
 *
 * @since 1.3.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'genesis_export_options', 'ddw_gest_plugins_export_additions', 15, 1 );
/**
* Hook official & third-party Genesis-specific plugins into "Genesis Exporter",
*    allowing their settings to be exported.
*
* @since 1.0.0
*
* @global string $gest_plugins_notice
*
* @param array $options Genesis Exporter options.
* @return array Modified array of exporter options.
*/
function ddw_gest_plugins_export_additions( array $options ) {

	/** Helper strings */
	$gest_plugin_string             = '*' . __( 'Plugin', 'genesis-extra-settings-transporter' );
	$gest_plugin_prefix             = $gest_plugin_string . ': ';
	$gest_plugin_suffix_studiopress = ' (' . __( 'official release', 'genesis-extra-settings-transporter' ) . ')';
	$gest_plugin_suffix_other       = ' (' . __( 'community release', 'genesis-extra-settings-transporter' ) . ')';

	define( 'GEST_PLUGIN_STRING', $gest_plugin_string );


	/** Helper variable for checking active supported plugins */
	global $gest_plugins_notice;

	$gest_plugins_notice = 'no_plugins_active';


	/**
	 * 1) StudioPress official stuff:
	 */

	/** Genesis Simple Hooks (gsh) - free by StudioPress */
	if ( defined( 'SIMPLEHOOKS_SETTINGS_FIELD' ) ) {

		$options[ 'gsh' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Genesis Simple Hooks', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_studiopress,
			'settings-field' => SIMPLEHOOKS_SETTINGS_FIELD
		);

		$gest_plugins_notice = 'plugins_active';

	}

	/** Genesis Simple Sidebars (gss) - free by StudioPress */
	if ( defined( 'SS_SETTINGS_FIELD' ) /* && ! function_exists( 'gsse_export_options' ) */ ) {

		$options[ 'gss' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Genesis Simple Sidebars', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_studiopress,
			'settings-field' => SS_SETTINGS_FIELD
		);

		$gest_plugins_notice = 'plugins_active';

	}

	/** Genesis Slider (gs) - free by StudioPress */
	if ( defined( 'GENESIS_SLIDER_SETTINGS_FIELD' ) ) {

		$options[ 'gs' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Genesis Slider', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_studiopress,
			'settings-field' => GENESIS_SLIDER_SETTINGS_FIELD
		);

		$gest_plugins_notice = 'plugins_active';

	}

	/** Genesis Responsive Slider (grs) - free by StudioPress */
	if ( defined( 'GENESIS_RESPONSIVE_SLIDER_SETTINGS_FIELD' ) ) {

		$options[ 'grs' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Genesis Responsive Slider', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_studiopress,
			'settings-field' => GENESIS_RESPONSIVE_SLIDER_SETTINGS_FIELD
		);

		$gest_plugins_notice = 'plugins_active';

	}

	/** Genesis Simple Edits (gse) - free by StudioPress */
	if ( defined( 'GSE_SETTINGS_FIELD' ) ) {

		$options[ 'gse' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Genesis Simple Edits', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_studiopress,
			'settings-field' => GSE_SETTINGS_FIELD
		);

		$gest_plugins_notice = 'plugins_active';

	}

	/** Genesis Connect for WooCommerce (gencwooc) - free by StudioPress */
	if ( function_exists( 'gencwooc_setup' ) ) {

		$options[ 'gencwooc' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Genesis Connect for WooCommerce', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_studiopress,
			'settings-field' => 'gencwooc_products_per_page'
		);

		$gest_plugins_notice = 'plugins_active';

	}


	/**
	 * 2) Third party stuff:
	 */

	/** Genesis Layout Extras (gle) - free, by David Decker */
	if ( ! function_exists( 'ddw_gle_export_options' ) && defined( 'GLE_SETTINGS_FIELD' ) ) {

		$options[ 'gle' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Genesis Layout Extras', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_other,
			'settings-field' => GLE_SETTINGS_FIELD
		);

		$gest_plugins_notice = 'plugins_active';

	}

	/** Blox Lite/Pro (blox) - free, by Nick Diego */
	if ( class_exists( 'Blox_Lite_Main' ) || class_exists( 'Blox_Main' ) ) {

		$options[ 'blox' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Blox', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_other,
			'settings-field' => 'blox_settings'
		);

		$gest_plugins_notice = 'plugins_active';

	}

	/** Display Featured Image for Genesis (dfig) - free, by Robin Cornett */
	if ( defined( 'DISPLAYFEATUREDIMAGEGENESIS_BASENAME' ) ) {

		$options[ 'dfig' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Display Featured Image for Genesis', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_other,
			'settings-field' => 'displayfeaturedimagegenesis'
		);

		$gest_plugins_notice = 'plugins_active';

	}

	/** Genesis Simple Comments (gsc) - free, by Nick Croft */
	if ( defined( 'GSC_SETTINGS_FIELD' ) ) {

		$options[ 'gsc' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Genesis Simple Comments', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_other,
			'settings-field' => GSC_SETTINGS_FIELD
		);

		$gest_plugins_notice = 'plugins_active';

	}

	/** Genesis Simple Breadcrumbs (gsb) - free, by Nick Croft */
	if ( defined( 'GSB_SETTINGS_FIELD' ) ) {

		$options[ 'gsb' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Genesis Simple Breadcrumbs', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_other,
			'settings-field' => GSB_SETTINGS_FIELD
		);

		$gest_plugins_notice = 'plugins_active';

	}

	/** Genesis Responsive Header (grh) - free, by Nick Croft */
	if ( defined( 'GRH_SETTINGS_FIELD' ) ) {

		$options[ 'grh' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Genesis Responsive Header', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_other,
			'settings-field' => GRH_SETTINGS_FIELD
		);

		$gest_plugins_notice = 'plugins_active';

	}

	/** Genesis Grid Loop (ggl) - free, by Bill Erickson */
	if ( class_exists( 'BE_Genesis_Grid' ) ) {

		$options[ 'ggl' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Genesis Grid Loop', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_other,
			'settings-field' => 'genesis-grid'
		);

		$gest_plugins_notice = 'plugins_active';

	}

	/** Genesis Bootstrap Carousel (gbsc) - free, by Justin Tallant */
	if ( defined( 'GENESIS_BOOTSTRAP_CAROUSEL_SETTINGS_FIELD' ) ) {

		$options[ 'gbsc' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Genesis Bootstrap Carousel', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_other,
			'settings-field' => GENESIS_BOOTSTRAP_CAROUSEL_SETTINGS_FIELD
		);

		$gest_plugins_notice = 'plugins_active';

	}

	/** Genesis Widget Toggle (gwt) - free, by Arya Prakasa */
	if ( defined( 'GWT_SETTINGS_FIELD' ) ) {

		$options[ 'gwt' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Genesis Widget Toggle', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_other,
			'settings-field' => GWT_SETTINGS_FIELD
		);

		$gest_plugins_notice = 'plugins_active';

	}

	/** Genesis Accordion (gacc) - free, by Pat Ramsey */
	if ( defined( 'GENESIS_ACCORDION_SETTINGS_FIELD' ) ) {

		$options[ 'gacc' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Genesis Accordion', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_other,
			'settings-field' => GENESIS_ACCORDION_SETTINGS_FIELD
		);

		$gest_plugins_notice = 'plugins_active';

	}

	/** Genesis Post Navigation (gpn) - free, by Iniyan */
	if ( defined( 'GPN_SETTINGS_FIELD' ) ) {

		$options[ 'gpn' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Genesis Post Navigation', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_other,
			'settings-field' => GPN_SETTINGS_FIELD
		);

		$gest_plugins_notice = 'plugins_active';

	}

	/** Genesis 404 Page (g404p) - free, by Bill Erickson */
	if ( class_exists( 'BE_Genesis_404' ) ) {

		$options[ 'g404p' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Genesis 404 Page', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_other,
			'settings-field' => 'genesis-404'
		);

		$gest_plugins_notice = 'plugins_active';

	}

	/** Genesis Design Palette (gdp) - free, by Andrew Norcross */
	if ( defined( 'GS_SETTINGS_FIELD' ) ) {

		$options[ 'gdp' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Genesis Design Palette', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_other,
			'settings-field' => GS_SETTINGS_FIELD
		);

		$gest_plugins_notice = 'plugins_active';

	}

	/** Genesis Accessible (genwpacc) - free, by Rian Rietveld, Robin Cornett */
	if ( defined( 'GENWPACC_SETTINGS_FIELD' ) ) {

		$options[ 'genwpacc' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Genesis Accessible', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_other,
			'settings-field' => GENWPACC_SETTINGS_FIELD
		);

		$gest_plugins_notice = 'plugins_active';

	}

	/** Generate Box (grtbox) - free, by Hesham Zebida */
	if ( defined( 'generatebox_SETTINGS_FIELD' ) ) {

		$options[ 'grtbox' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Generate Box', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_other,
			'settings-field' => generatebox_SETTINGS_FIELD
		);

		$gest_plugins_notice = 'plugins_active';

	}

	/** Genesis Custom Backgrounds (gcbg) - free, by Travis Smith */
	if ( defined( 'GCB_SETTINGS_FIELD' ) ) {

		$options[ 'gcbg' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Genesis Custom Backgrounds', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_other,
			'settings-field' => GCB_SETTINGS_FIELD
		);

		$gest_plugins_notice = 'plugins_active';

	}

	/** Genesis Portfolio (gpfl) - free, by Travis Smith */
	if ( class_exists( 'minFolio_Portfolio_Settings' ) ) {

		$options[ 'gpfl' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Genesis Portfolio', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_other,
			'settings-field' => 'minfolio-portfolio-settings'
		);

		$gest_plugins_notice = 'plugins_active';

	}

	/** Genesis Custom Post Types Archives - free, by Travis Smith */
	if ( function_exists( 'gcpta_init' ) ) {

		$pt_args = apply_filters( 'gcpta_pt_args' , array( 'public' => true, 'capability_type' => 'post', '_builtin' => false, 'has_archive' => true, 'show_ui' => true ) );
		$pts = get_post_types( $pt_args , 'names', 'and' );
		
		foreach ( $pts as $pt ) {
			
			$gest_gcpta_objects = get_post_type_object( $pt );

			$options[ 'gcpta' . $pt ] = array(
				'label'          => $gest_plugin_prefix . __( 'Genesis Custom Post Types Archives', 'genesis-extra-settings-transporter' )  . ' for: ' . $gest_gcpta_objects->labels->name . ' ' . $gest_plugin_suffix_other,
				'settings-field' => 'gcpta-settings-' . $pt
			);

		}  // end foreach

		$gest_plugins_notice = 'plugins_active';

	}  // end if

	/** WP Genesis Box (wpgb) - free, by Jimmy Peña */
	if ( defined( 'WPGB_DEFAULT_ENABLED' ) ) {

		$options[ 'wpgb' ] = array(
			'label'          => $gest_plugin_prefix . __( 'WP Genesis Box', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_other,
			'settings-field' => 'wp_genesis_box'
		);

		$gest_plugins_notice = 'plugins_active';

	}


	/**
	 * 3) Third party stuff - Genesis ecosystem:
	 */

	/** Dynamic Content Gallery [DCG] (dcg) - free, by Adew Walker/ studiograsshopper.ch */
	if ( defined( 'DFCG_DOMAIN' ) ) {

		$options[ 'dcg' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Dynamic Content Gallery (DCG)', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_other,
			'settings-field' => 'dfcg_plugin_settings'
		);

		$gest_plugins_notice = 'plugins_active';

	}

	/** WP-Cycle (wpcycle) - free, by Nathan Rice */
	if ( function_exists( 'wp_cycle_register_settings' ) ) {

		$options[ 'wpcycle' ] = array(
			'label'          => $gest_plugin_prefix . __( 'WP-Cycle', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_other,
			'settings-field' => 'wp_cycle_settings'
		);

		$gest_plugins_notice = 'plugins_active';
		
	}

	/** WP Premise Box (wppb) - free, by Jimmy Peña */
	if ( defined( 'WPPB_DEFAULT_ENABLED' ) ) {

		$options[ 'wppb' ] = array(
			'label'          => $gest_plugin_prefix . __( 'WP Premise Box', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_other,
			'settings-field' => 'wp_premise_box'
		);

		$gest_plugins_notice = 'plugins_active';

	}

	/** WP Scribe Box (wpsb) - free, by Jimmy Peña */
	if ( defined( 'WPSB_DEFAULT_ENABLED' ) ) {

		$options[ 'wpsb' ] = array(
			'label'          => $gest_plugin_prefix . __( 'WP Scribe Box', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_other,
			'settings-field' => 'wp_scribe_box'
		);

		$gest_plugins_notice = 'plugins_active';

	}

	/** Return the additional (plugins) settings fields to hook into the Genesis Exporter */
	return $options;

}  // end function
