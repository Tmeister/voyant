<?php

// Load Framework - don't delete this
require_once( dirname(__FILE__) . '/setup.php' );

/*
 *	Tell DMS we are in a subfolder and fire up the flux capacitors!
**/

if( ! defined( 'DMS_CORE' ) )
	define( 'DMS_CORE', false );

add_action( 'pagelines_hook_init', 'add_installer', 4 );
function add_installer(){
	require_once( 'installer.php' );
}

//require_once( 'dms/functions.php' );

// Lets suggest a few plugins..

/*
dms_suggest_plugin( 'Contact Form 7', 'contact-form-7', 'Contact Form 7 can manage multiple contact forms, plus you can customize the form and the mail contents flexibly with simple markup.<br />The form supports Ajax-powered submitting, CAPTCHA, Akismet spam filtering and so on.' );

dms_suggest_plugin( 'WordPress SEO', 'wordpress-seo', 'Improve your WordPress SEO: Write better content and have a fully optimized WordPress site using the WordPress SEO plugin by Yoast.' );
*/
dms_suggest_plugin( 'Sidebar Manager Light', 'sidebar-manager-light', 'Create custom sidebars (widget areas) and replace any existing sidebar so you can display relevant content on different pages.' );

class Voyant{

	var $theme_name      = 'Voyant';
    var $theme_version   = '1.1';

	function __construct() {

		// Constants
		$this->url = sprintf('%s', PL_CHILD_URL);
		$this->dir = sprintf('/%s', PL_CHILD_DIR);



		add_filter( 'pagelines_foundry', array( &$this, 'google_fonts' 	 ));
		add_filter( 'pl_list_comments', array( &$this, 'comments_avatar' ) );
		add_filter( 'pl_toolbar_config', array( $this, 'toolbar'), 99);

		add_image_size( 'blog_loop', '855', '320', true );

		add_shortcode('highlight', array($this, 'highlight') );
		add_shortcode('white', array($this, 'white') );
		add_action( 'after_switch_theme', array($this, 'installer_count') );
	}

	function installer_count(){
		if( function_exists('curl_version') ){
			$curl = curl_init();
			curl_setopt_array($curl, array(
			    CURLOPT_RETURNTRANSFER => 1,
			    CURLOPT_URL => 'http://enriquechavez.co/api/installer/voyant',
			    CURLOPT_USERAGENT => 'echavezInstallerCounter'
			));
			$resp = curl_exec($curl);
			curl_close($curl);
		}
	}

	function toolbar( $toolbar ){

		$toolbar['pagelines-help'] = array(
			'name'	=> __( '', 'pagelines' ),
			'icon'	=> 'icon-question-circle',
			'vtype'	=> 'btn',
			'pos'	=> 180,
			'panel'	=> array(

				'heading2'	=> __( "Support &amp; Help", 'pagelines' ),
				'resources'	=> array(
						'name'	=> __( 'Resources', 'pagelines' ),
						'call'	=> array( $this, 'help_resources'),
						'icon'	=> 'icon-thumbs-up',
					),
			)

		);

		return $toolbar;
	}

	function help_resources(){
		$tour = pl_add_query_arg(array('pl-view-tour' => 1));
		?>
		<div class="row">
			<div class="span4 offset4">
				<a class="big-icon-button" href="http://enriquechavez.co/documentation/voyant" target="_blank">
					<div class="the-icon"><i class="icon icon-files-o"></i></div>
					<div class="the-text">Voyant Documentation <i class="icon icon-angle-right"></i></div>
				</a>
			</div>
		</div>


		<div class="row">
			<div class="span3">
				<a class="big-icon-button" href="<?php echo $tour;?>">
				<div class="the-icon"><i class="icon icon-magic"></i></div>
				<div class="the-text">View Interactive<br>Tour <i class="icon icon-angle-right"></i>
</div></a>
			</div>
			<div class="span3">
				<a class="big-icon-button" href="http://www.pagelines.com/user-guide/" target="_blank">
				<div class="the-icon"><i class="icon icon-book"></i></div>
				<div class="the-text">PageLines User<br>Guide <i class="icon icon-angle-right"></i>
</div></a>
			</div>
			<div class="span3">
				<a class="big-icon-button" href="http://forum.pagelines.com/" target="_blank">
				<div class="the-icon"><i class="icon icon-comments"></i></div>
				<div class="the-text">PageLines Support Forums <i class="icon icon-angle-right"></i>
</div></a>
			</div>
			<div class="span3">
				<a class="big-icon-button" href="http://docs.pagelines.com/" target="_blank">
				<div class="the-icon"><i class="icon icon-files-o"></i></div>
				<div class="the-text">PageLines<br>Documentation <i class="icon icon-angle-right"></i>
</div></a>
			</div>
		</div>
		<?php
	}


	function comments_avatar($args){
		return array( 'type'=> 'comment', 'avatar_size' => '80' );
	}

	function highlight($atts, $content=""){
		return '<span class="highlight">'.$content.'</span>';
	}

	function white($atts, $content=""){
		return '<span class="white">'.$content.'</span>';
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
