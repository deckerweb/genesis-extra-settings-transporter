<?php

// includes/gest-options-child-themes

/**
 * Prevent direct access to this file.
 *
 * @since 1.3.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_filter( 'genesis_export_options', 'ddw_gest_child_themes_export_additions', 16, 1 );
/**
* Hook official & third-party Genesis child themes into "Genesis Exporter",
*    allowing their settings to be exported.
*
* @since 1.0.0
*
* @global mixed $gest_ct_notice
*
* @param array $options Genesis Exporter options.
* @return array Modified array of exporter options.
*/
function ddw_gest_child_themes_export_additions( array $options ) {

	/** Helper strings */
	$gest_child_theme_string          = '*' . __( 'Child Theme', 'genesis-extra-settings-transporter' );
	$gest_child_theme_prefix          = $gest_child_theme_string . ': ';
	$gest_theme_settings              = ' ' . __( 'Theme Settings', 'genesis-extra-settings-transporter' );
	$gest_footer_settings             = ' ' . __( 'Footer Settings', 'genesis-extra-settings-transporter' );
	$gest_child_theme_suffix_spmarket = ' (' . __( 'via Community/ Marketplace', 'genesis-extra-settings-transporter' ) . ')';
	$gest_child_theme_suffix_other    = ' (' . __( 'third-party product', 'genesis-extra-settings-transporter' ) . ')';

	define( 'GEST_CHILD_THEME_STRING', $gest_child_theme_string );


	/** Helper variable for checking active supported child themes */
	global $gest_ct_notice;

	$gest_ct_notice = 'no_child_themes';


	/**
	 * 1) Community/ Markeptlace child themes (via studiopress.com)
	 */

	/** Curtail (premium, by Thomas Griffin Media) */
	if ( defined( 'CURTAIL_SETTINGS_FIELD' ) ) {

		$options[ 'ctcurtail' ] = array(
			'label'          => $gest_child_theme_prefix . 'Curtail' . $gest_theme_settings . $gest_child_theme_suffix_spmarket,
			'settings-field' => CURTAIL_SETTINGS_FIELD
		);

		$gest_ct_notice = 'ct_active';

	}

	/**
	 * 2) Third-party child themes (via other sources)
	 */

	/** Genesis Sandbox (free, by SureFireWebservice & Travis Smith) - version 1.1.0+ required! */
	if ( class_exists( 'Genesis_Sandbox_Settings' ) && defined( 'CHILD_SETTINGS_FIELD' ) ) {

		$options[ 'ctgsandbox' ] = array(
			'label'          => $gest_child_theme_prefix . 'Genesis Sandbox' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => CHILD_SETTINGS_FIELD
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Genesis Sandbox (free, by SureFireWebservice) - version 1.1+ required! */
	if ( class_exists( 'Genesis_Sandbox_Settings' )
		&& ( defined( 'CHILD_THEME_NAME' ) && 'Sandbox Theme' == CHILD_THEME_NAME )
	) {

		$options[ 'ctgsandboxth' ] = array(
			'label'          => $gest_child_theme_prefix . 'Sandbox Theme' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => CHILD_SETTINGS_FIELD
		);

		$gest_ct_notice = 'ct_active';

	}

	/** AyoShop (once premium, now free, by AyoThemes) */
	if ( function_exists( 'ayoshop_setup' ) ) {

		$options[ 'ctayoshop' ] = array(
			'label'          => $gest_child_theme_prefix . 'AyoShop' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'ayo_theme_customizer'
		);

		$gest_ct_notice = 'ct_active';
		
	}

	/** Dizain-01 (premium, by ThemeDizain) */
	if ( class_exists( 'Dizain' ) ) {

		$options[ 'ctdizain01' ] = array(
			'label'          => $gest_child_theme_prefix . 'Dizain-01' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'option_tree'
		);

		$gest_ct_notice = 'ct_active';
		
	}

	/** Radio (free, by Greg Rickaby) */
	if ( defined( 'CHILD_THEME_NAME' ) && ( 'Radio Theme' == CHILD_THEME_NAME ) ) {

		$options[ 'ctradio' ] = array(
			'label'          => $gest_child_theme_prefix . 'Radio' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'child-settings'
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Curb Appeal (premium, by Agent Evolution) */
	if ( class_exists( 'Curb_Appeal_Footer_Settings' ) ) {

		$options[ 'ctcurbappeal' ] = array(
			'label'          => $gest_child_theme_prefix . 'Curb Appeal' . $gest_footer_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'curbappeal-footer-settings'
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Picture Perfect (premium, by Agent Evolution) */
	if ( function_exists( 'picture_perfect_footer' ) ) {

		$options[ 'ctpictureperfect' ] = array(
			'label'          => $gest_child_theme_prefix . 'Picture Perfect' . $gest_footer_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'agentevo-footer-settings'
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Turn Key (premium, by Agent Evolution) */
	if ( class_exists( 'Turn_Key_Footer_Settings' ) ) {

		$options[ 'ctturnkey' ] = array(
			'label'          => $gest_child_theme_prefix . 'Turn Key' . $gest_footer_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'turnkey-footer-settings'
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Egreen (premium, by ThemeWolf) */
	if ( defined( 'CHILD_THEME_NAME' ) && ( 'Egreen Theme' == CHILD_THEME_NAME ) ) {

		$options[ 'ctegreen' ] = array(
			'label'          => $gest_child_theme_prefix . 'Egreen' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'tw-egreen-settings'
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Upshot (premium, by ThemeWolf) */
	if ( defined( 'CHILD_THEME_NAME' ) && ( 'Upshot Theme' == CHILD_THEME_NAME ) ) {

		$options[ 'ctupshot' ] = array(
			'label'          => $gest_child_theme_prefix . 'Upshot' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'tw-upshot-settings'
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Dedicated (free, by GenesisAwesome) */
	if ( defined( 'GA_CHILDTHEME_FIELD' ) || ( defined( 'CHILD_THEME_NAME' ) && ( 'Dedicated' == CHILD_THEME_NAME ) ) ) {

		$options[ 'ctdedicated' ] = array(
			'label'          => $gest_child_theme_prefix . 'Dedicated' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => GA_CHILDTHEME_FIELD
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Greetings (free, by GenesisAwesome) */
	if ( defined( 'GA_CHILDTHEME_FIELD' ) || ( defined( 'CHILD_THEME_NAME' ) && ( 'Greetings' == CHILD_THEME_NAME ) ) ) {

		$options[ 'ctgreetings' ] = array(
			'label'          => $gest_child_theme_prefix . 'Greetings' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => GA_CHILDTHEME_FIELD
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Portlight (free, by GenesisAwesome) */
	if ( defined( 'GA_CHILDTHEME_FIELD' ) || ( defined( 'CHILD_THEME_NAME' ) && ( 'Portlight' == CHILD_THEME_NAME ) ) ) {

		$options[ 'ctportlight' ] = array(
			'label'          => $gest_child_theme_prefix . 'Portlight' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => GA_CHILDTHEME_FIELD
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Bigg (free, by OD - OpenDesigns.org) */
	if ( class_exists( 'BiggLikes' ) ) {

		$options[ 'ctbigg' ] = array(
			'label'          => $gest_child_theme_prefix . 'Bigg' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => GSSETTINGS_SETTINGS_FIELD
		);

		$gest_ct_notice = 'ct_active';

	}

	/**
	 * 3) Third-party child themes by "Web Savvy Marketing, LLC" -- all premium!
	 */

	/** Alexandra */
	if ( class_exists( 'Alexandra_Settings' ) ) {

		$options[ 'ctalexandra' ] = array(
			'label'          => $gest_child_theme_prefix . 'Alexandra' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'alexandra-settings'
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Anneliese */
	if ( class_exists( 'WSM_Anneliese_Settings' ) ) {

		$options[ 'ctanneliese' ] = array(
			'label'          => $gest_child_theme_prefix . 'Anneliese' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'anneliese-settings'
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Carla Anna */
	if ( class_exists( 'Child_Theme_Settings' ) || function_exists( 'carla_anna_flexslider_options' ) ) {

		$options[ 'ctcarlaanna' ] = array(
			'label'          => $gest_child_theme_prefix . 'Carla Anna' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'child-settings'
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Christian */
	if ( class_exists( 'WSM_Christian_Settings' ) ) {

		$options[ 'ctchristian' ] = array(
			'label'          => $gest_child_theme_prefix . 'Christian' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'christian-settings'
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Colin */
	if ( class_exists( 'WSM_Colin_Settings' ) ) {

		$options[ 'ctcolin' ] = array(
			'label'          => $gest_child_theme_prefix . 'Colin' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'colin-settings'
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Dagmar */
	if ( class_exists( 'Dagmar_Settings' ) ) {

		$options[ 'ctdagmar' ] = array(
			'label'          => $gest_child_theme_prefix . 'Dagmar' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'dagmar-settings'
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Daniel */
	if ( class_exists( 'WSM_Daniel_Settings' ) ) {

		$options[ 'ctdaniel' ] = array(
			'label'          => $gest_child_theme_prefix . 'Daniel' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'daniel-settings'
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Ellen Mae */
	if ( class_exists( 'WSM_Ellen_Settings' ) ) {

		$options[ 'ctellen' ] = array(
			'label'          => $gest_child_theme_prefix . 'Ellen' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'ellen-settings'
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Erik */
	if ( class_exists( 'Erik_Settings' ) ) {

		$options[ 'cterik' ] = array(
			'label'          => $gest_child_theme_prefix . 'Erik' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'erik-settings'
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Elsa */
	if ( defined( 'ELSA_SETTINGS_FIELD' ) || class_exists( 'Elsa_Settings' ) ) {

		$options[ 'ctelsa' ] = array(
			'label'          => $gest_child_theme_prefix . 'Elsa' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => ELSA_SETTINGS_FIELD
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Frederik */
	if ( class_exists( 'WSM_Settings' ) || function_exists( 'frederik_do_header' ) ) {

		$options[ 'ctfrederik' ] = array(
			'label'          => $gest_child_theme_prefix . 'Frederik' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'frederik-settings'
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Hans */
	if ( class_exists( 'WSM_Settings' ) || function_exists( 'hans_add_viewport_meta_tag' )) {

		$options[ 'cthans' ] = array(
			'label'          => $gest_child_theme_prefix . 'Hans' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'hans-settings'
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Kathryn */
	if ( class_exists( 'WSM_Kathryn_Settings' ) ) {

		$options[ 'ctkathryn' ] = array(
			'label'          => $gest_child_theme_prefix . 'Kathryn' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'kathryn-settings'
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Lillian */
	if ( class_exists( 'Lillian_Settings' ) ) {

		$options[ 'ctlillian' ] = array(
			'label'          => $gest_child_theme_prefix . 'Lillian' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'lillian-settings'
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Mariah */
	if ( class_exists( 'Mariah_Settings' ) ) {

		$options[ 'ctmariah' ] = array(
			'label'          => $gest_child_theme_prefix . 'Mariah' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'mariah-settings'
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Nancy */
	if ( class_exists( 'WSM_Nancy_Settings' ) ) {

		$options[ 'ctnancy' ] = array(
			'label'          => $gest_child_theme_prefix . 'Nancy' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'nancy-settings'
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Rasmus */
	if ( defined( 'RASMUS_SETTINGS_FIELD' ) ) {

		$options[ 'ctrasmus' ] = array(
			'label'          => $gest_child_theme_prefix . 'Rasmus' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => RASMUS_SETTINGS_FIELD
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Robert */
	if ( class_exists( 'WSM_Robert_Settings' ) ) {

		$options[ 'ctrobert' ] = array(
			'label'          => $gest_child_theme_prefix . 'Robert' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'robert-settings'
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Soren */
	if ( function_exists( 'soren_flexslider_options' ) ) {

		$options[ 'ctsoren' ] = array(
			'label'          => $gest_child_theme_prefix . 'Soren' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => WSM_SETTINGS_FIELD
		);

		$gest_ct_notice = 'ct_active';

	}

	/**
	 * 4) Third-party child themes by "Themedy" brand -- 1 free, all other premium!
	 */

	/** Blink */
	if ( defined( 'BLINK_SETTINGS_FIELD' ) ) {

		$options[ 'ctblink' ] = array(
			'label'          => $gest_child_theme_prefix . 'Blink' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => BLINK_SETTINGS_FIELD
		);

		$gest_ct_notice = 'ct_active';

	}

	/** CinchPress */
	if ( defined( 'CINCHPRESS_SETTINGS_FIELD' ) ) {

		$options[ 'ctcinchpress' ] = array(
			'label'          => $gest_child_theme_prefix . 'CinchPress' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => CINCHPRESS_SETTINGS_FIELD
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Clip Cart */
	if ( defined( 'CLIPCART_SETTINGS_FIELD' ) ) {

		$options[ 'ctclipcart' ] = array(
			'label'          => $gest_child_theme_prefix . 'Clip Cart' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => CLIPCART_SETTINGS_FIELD
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Derby */
	if ( defined( 'DERBY_SETTINGS_FIELD' ) ) {

		$options[ 'ctderby' ] = array(
			'label'          => $gest_child_theme_prefix . 'Derby' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => DERBY_SETTINGS_FIELD
		);

		$gest_ct_notice = 'ct_active';

	}

	/** FeedPop */
	if ( defined( 'FEEDPOP_SETTINGS_FIELD' ) ) {

		$options[ 'ctfeedpop' ] = array(
			'label'          => $gest_child_theme_prefix . 'FeedPop' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => FEEDPOP_SETTINGS_FIELD
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Foxy News */
	if ( defined( 'FOXYNEWS_SETTINGS_FIELD' ) ) {

		$options[ 'ctfoxynews' ] = array(
			'label'          => $gest_child_theme_prefix . 'Foxy News' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => FOXYNEWS_SETTINGS_FIELD
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Fremedy */
	if ( defined( 'FREMEDY_SETTINGS_FIELD' ) ) {

		$options[ 'ctfremedy' ] = array(
			'label'          => $gest_child_theme_prefix . 'Fremedy' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => FREMEDY_SETTINGS_FIELD
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Grind */
	if ( defined( 'GRIND_SETTINGS_FIELD' ) ) {

		$options[ 'ctgrind' ] = array(
			'label'          => $gest_child_theme_prefix . 'Grind' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => GRIND_SETTINGS_FIELD
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Line It Up */
	if ( defined( 'LINEITUP_SETTINGS_FIELD' ) ) {

		$options[ 'ctlineitup' ] = array(
			'label'          => $gest_child_theme_prefix . 'Line It Up' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => LINEITUP_SETTINGS_FIELD
		);

		$gest_ct_notice = 'ct_active';

	}

	/** MockFive */
	if ( defined( 'MOCKFIVE_SETTINGS_FIELD' ) ) {

		$options[ 'ctmockfive' ] = array(
			'label'          => $gest_child_theme_prefix . 'MockFive' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => MOCKFIVE_SETTINGS_FIELD
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Quik */
	if ( defined( 'QUIK_SETTINGS_FIELD' ) ) {

		$options[ 'ctquik' ] = array(
			'label'          => $gest_child_theme_prefix . 'Quik' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => QUIK_SETTINGS_FIELD
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Reactiv */
	if ( defined( 'REACTIV_SETTINGS_FIELD' ) ) {

		$options[ 'ctreactiv' ] = array(
			'label'          => $gest_child_theme_prefix . 'Reactiv' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => REACTIV_SETTINGS_FIELD
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Readyfolio v1.x & v2.x */
	if ( defined( 'READYFOLIO_SETTINGS_FIELD' ) ) {

		$options[ 'ctreadyfolio' ] = array(
			'label'          => $gest_child_theme_prefix . 'Readyfolio' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => READYFOLIO_SETTINGS_FIELD
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Rough Print */
	if ( defined( 'ROUGHPRINT_SETTINGS_FIELD' ) ) {

		$options[ 'ctroghprint' ] = array(
			'label'          => $gest_child_theme_prefix . 'Rough Print' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => ROUGHPRINT_SETTINGS_FIELD
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Smooth Post */
	if ( defined( 'SMOOTHPOST_SETTINGS_FIELD' ) ) {

		$options[ 'ctcinchpress' ] = array(
			'label'          => $gest_child_theme_prefix . 'Smooth Post' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => SMOOTHPOST_SETTINGS_FIELD
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Stage */
	if ( defined( 'STAGE_SETTINGS_FIELD' ) ) {

		$options[ 'ctstage' ] = array(
			'label'          => $gest_child_theme_prefix . 'Stage' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => STAGE_SETTINGS_FIELD
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Tote */
	if ( defined( 'TOTE_SETTINGS_FIELD' ) ) {

		$options[ 'cttote' ] = array(
			'label'          => $gest_child_theme_prefix . 'Tote' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => TOTE_SETTINGS_FIELD
		);

		$gest_ct_notice = 'ct_active';

	}

	/**
	 * 5) Third-party child themes by "ZigZagPress" brand -- all premium!
	 */

	/** Bijou */
	if ( defined( 'CHILD_THEME_NAME' ) && ( 'Bijou' == CHILD_THEME_NAME ) ) {

		$options[ 'ctbijou' ] = array(
			'label'          => $gest_child_theme_prefix . 'Bijou' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'of_template'
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Engrave */
	if ( defined( 'CHILD_THEME_NAME' ) && ( 'Engrave' == CHILD_THEME_NAME ) ) {

		$options[ 'ctengrave' ] = array(
			'label'          => $gest_child_theme_prefix . 'Engrave' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'of_template'
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Eshop */
	if ( defined( 'CHILD_THEME_NAME' ) && ( 'Eshop' == CHILD_THEME_NAME ) ) {

		$options[ 'cteshop' ] = array(
			'label'          => $gest_child_theme_prefix . 'Eshop' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'zp_template'
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Gallery */
	if ( defined( 'CHILD_THEME_NAME' ) && ( 'Gallery' == CHILD_THEME_NAME ) ) {

		$options[ 'ctgallery' ] = array(
			'label'          => $gest_child_theme_prefix . 'Gallery' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => ZP_SETTINGS_FIELD
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Megalithe 1.2+ */
	if ( defined( 'CHILD_THEME_NAME' ) && ( 'Megalithe' == CHILD_THEME_NAME ) ) {

		$options[ 'ctmegalithe' ] = array(
			'label'          => $gest_child_theme_prefix . 'Megalithe' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'of_template'
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Prestige */
	if ( defined( 'CHILD_THEME_NAME' ) && ( 'Prestige' == CHILD_THEME_NAME ) ) {

		$options[ 'ctprestige' ] = array(
			'label'          => $gest_child_theme_prefix . 'Prestige' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => ZP_SETTINGS_FIELD
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Showroom */
	if ( defined( 'CHILD_THEME_NAME' ) && ( 'Showroom Theme' == CHILD_THEME_NAME ) ) {

		$options[ 'ctshowroom' ] = array(
			'label'          => $gest_child_theme_prefix . 'Showroom' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'of_template'
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Single */
	if ( defined( 'CHILD_THEME_NAME' ) && ( 'Single' == CHILD_THEME_NAME ) ) {

		$options[ 'ctsingle' ] = array(
			'label'          => $gest_child_theme_prefix . 'Single' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'of_template'
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Solo */
	if ( defined( 'CHILD_THEME_NAME' ) && ( 'Solo' == CHILD_THEME_NAME ) ) {

		$options[ 'ctsolo' ] = array(
			'label'          => $gest_child_theme_prefix . 'Solo' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'of_template'
		);

		$gest_ct_notice = 'ct_active';

	}

	/** Tequila */
	if ( defined( 'ZP_SETTINGS_FIELD' ) && ( defined( 'CHILD_THEME_NAME' ) && ( 'Tequila' == CHILD_THEME_NAME ) ) ) {

		$options[ 'cttequila' ] = array(
			'label'          => $gest_child_theme_prefix . 'Tequila' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => ZP_SETTINGS_FIELD
		);

		$gest_ct_notice = 'ct_active';

	}
	
	/** Vanilla */
	if ( defined( 'CHILD_THEME_NAME' ) && ( 'Vanilla' == CHILD_THEME_NAME ) ) {

		$options[ 'ctvanilla' ] = array(
			'label'          => $gest_child_theme_prefix . 'Vanilla' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'of_template'
		);

		$gest_ct_notice = 'ct_active';

	}


	/** Return the additional (child themes) settings fields to hook into the Genesis Exporter */
	return $options;

}  // end function
