<?php
/*
 *	Tell DMS we are in a subfolder and fire up the flux capacitors!
**/
if( ! defined( 'DMS_CORE' ) )
	define( 'DMS_CORE', true );

require_once( 'dms/functions.php' );

// Lets suggest a few plugins..
/*

dms_suggest_plugin( 'Contact Form 7', 'contact-form-7', 'Contact Form 7 can manage multiple contact forms, plus you can customize the form and the mail contents flexibly with simple markup.<br />The form supports Ajax-powered submitting, CAPTCHA, Akismet spam filtering and so on.' );

dms_suggest_plugin( 'WordPress SEO', 'wordpress-seo', 'Improve your WordPress SEO: Write better content and have a fully optimized WordPress site using the WordPress SEO plugin by Yoast.' );

dms_suggest_plugin( 'WooCommerce - excelling eCommerce', 'woocommerce', 'WooCommerce is a powerful, extendable eCommerce plugin that helps you sell anything. Beautifully.' );

*/

class Voyant{

	var $theme_name      = 'Voyant';
    var $theme_version   = '1.0';

	function __construct() {

		// Constants
		$this->url = sprintf('%s', PL_CHILD_URL);
		$this->dir = sprintf('/%s', PL_CHILD_DIR);

		add_filter( 'pagelines_foundry', array( &$this, 'google_fonts' 	 ));
		add_action( 'wp_enqueue_scripts', array( &$this, 'voyant_scripts'));

		//$this->init();
	}

	function voyant_scripts()
	{
		wp_enqueue_script( 'voyant-js', get_template_directory_uri() . '/assets/js/voyant.js', array(), '1.0.0', true );
	}

	/**
	 * Adding a custom font from Google Fonts
	 * @param type $thefoundry
	 * @return type
	 */
	function google_fonts( $thefoundry ) {

		if ( ! defined( 'PAGELINES_SETTINGS' ) )
			return;

		$fonts = $this->get_fonts();
		return array_merge( $thefoundry, $fonts );
	}

	/**
	 * Parse the external file for the fonts source
	 * @return type
	 */
	function get_fonts( ) {
		$path = $this->dir . '/fonts.json';
		$fonts = pl_file_get_contents( $path );
		$fonts = json_decode( $fonts );
		$fonts = $fonts->items;
		$fonts = ( array ) $fonts;
		$out = array();
		foreach ( $fonts as $font ) {
			$out[ str_replace( ' ', '_', $font->family ) ] = array(
				'name'		=> $font->family,
				'family'	=> sprintf( '"%s"', $font->family ),
				'web_safe'	=> true,
				'google' 	=> $font->variants,
				'monospace' => ( preg_match( '/\sMono/', $font->family ) ) ? 'true' : 'false',
				'free'		=> true
			);
		}
		return $out;
	}

}

new Voyant();

/**
 * HELPER GLOBAL FUNCTIONS
 */

function voyant_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return implode(",", $rgb);
}