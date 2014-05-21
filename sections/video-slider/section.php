<?php
/*
	Section: Video Slider
	Author: Enrique Chavez
	Author URI: http://enriquechavez.co
	Description: The Video Slider section allows you to show a introduction video as a background and slides to show important information or welcome messages. The Video Slider only support Youtube videos and use an image as fallback for mobile devices.
	Class Name: TmVoyantVideoSlider
	Workswith: templates, main, content
	Cloning: false
	Filter: component, full-width
	Loading: active
*/
class TmVoyantVideoSlider extends PageLinesSection {

	function section_persistent(){
		if( ! isset( $this->meta["clone"] ) ){
			$this->meta["clone"] = 'no-clone';
		}
	}

	function section_styles() {
		wp_enqueue_script( 'BxSlider', $this->base_url . '/jquery.bxslider.min.js', array( 'jquery' ), '4.1.2', true );
		wp_enqueue_script( 'YTPlayer', $this->base_url . '/jquery.mb.YTPlayer.js', array( 'BxSlider' ), '2.6.4', true );
		wp_enqueue_script( 'VideoSlider', $this->base_url . '/videoslider.js', array( 'YTPlayer' ), '1.0', true );
	}

	function section_head() {
		$image_source      = ( $this->opt('image_source') ) ? $this->opt('image_source') : '';
	?>
		<script>
			jQuery(document).ready(function($) {
				jQuery('<?php echo "#video-slider".$this->meta["clone"]?>').videoslider({
					altImage: '<?php echo $image_source; ?>',
				});
			});
		</script>
	<?php
	}

	function section_template() {
		$source      = ( $this->opt('video_source') ) ? $this->opt('video_source') : 'MeQo-Rl9VFc';
		$fullHeight  = ( $this->opt('video_full_height') == 'fixed' ) ? false : true;
		$fixedHeight = ( $this->opt('video_height') ) ? $this->opt('video_height') : '500px';
		$controls    = ( $this->opt('video_controls') ) ? $this->opt('video_controls') : 'bottom';
		$mute        = ( $this->opt('video_mute') == 'unmute' ) ? 'false' : 'true';
		$loop        = ( $this->opt('video_loop') == 'once' ) ? 'false' : 'true';
		$opacity     = ( $this->opt('video_opacity') ) ? $this->opt('video_opacity') : '.4';
		$startat     = ( $this->opt('video_start') ) ? $this->opt('video_start') : '0';
		$endsat      = ( $this->opt('video_end') ) ? $this->opt('video_end') : '0';
		$exist_text  = ( $this->opt('video_exit_text') ) ? $this->opt('video_exit_text') : 'Click to exit fullscreen video';



		$classHolder = ( $fullHeight ) ? 'full-height' : '';
		$cssPlayer   = ( !$fullHeight) ? $fixedHeight : '';
		$slides_array = $this->opt('slides_array');
		if (!is_array($slides_array)){
			$slides_array = array('','','');
		}
		$count = 1;
	?>
		<div class="holder <?php echo $classHolder ?>"  style="<?php echo $cssPlayer ?>" >
	    	<div class="the-player" id="player-<?php echo $this->meta["clone"]?>"></div>
	    	<div class="preloader">
    			<div class="circleloader">
    				<div class="circlebar"></div>
    			</div>
    		</div>
	    	<div class="contents">
	    		<div class="inner pl-content">
	    			<?php if ($controls == 'top'): ?>
	    				<div class="controls">
	    					<i class="play icon icon-play"></i>
	    				</div>
	    			<?php endif ?>

	    			<div class="slides pl-content">
	    				<ul class="bxslider">
	    					<?php
	    						foreach ($slides_array as $slide):
	    							$title = pl_array_get( 'title', $slide, 'Yes, We just <i class="icon icon-heart"></i> what we do '. $count.'!');
									$text  = pl_array_get( 'text',  $slide, 'Vestibulum sit amet sagittis nibh, at tempor lorem. <br>Donec iaculis urna at dapibus dignissim.');
	    					?>
		    					<li>
		    						<h3 class="video-title"><?php echo $title ?></h3>
		    						<p class="video-subhead	detach"><?php echo do_shortcode($text); ?></p>
		    					</li>
	    					<?php $count++; endforeach ?>
	    				</ul>
	    			</div>

	    			<?php if ($controls == 'bottom'): ?>
	    				<div class="controls">
	    					<i class="play icon icon-play"></i>
	    				</div>
	    			<?php endif ?>
	    		</div>
	    	</div>
	    	<div class="hiddencontrol">
	    		<span class="exit"><?php echo $exist_text ?></span>
	    	</div>
		</div>
		<span
			class="playersource"
			data-property="
			{
				videoURL:'<?php echo $source; ?>',
				containment:'#player-<?php echo $this->meta["clone"]; ?>',
				showControls:false,
				loop:<?php echo $loop; ?>,
				mute:<?php echo $mute; ?>,
				startAt:<?php echo $startat; ?>,
				stopAt:<?php echo $endsat; ?>,
				opacity:<?php echo $opacity; ?>,
				addRaster:false,
				quality:'default'
			}">
		</span>
	<?php
	}

	function section_opts() {
		$opts = array();

		$opts[] = array(
			'key'   => 'video_source',
			'title' => __( 'Video Source', 'voyant' ),
			'label' => __( 'Video URL (YouTube)', 'voyant' ),
			'ref' 	=> __( 'This section use a YouTube video as a Background, so is mandatory to use a youtube URL.', 'voyant' ),
			'type'  => 'text'
		);

		$opts[] = array(
			'key'   => 'image_source',
			'title' => __( 'Alternative background image for mobiles', 'voyant' ),
			'label' => __( 'Alternative image', 'voyant' ),
			'ref' 	=> __( 'Please upload a image to use as fallback for mobile devices, mobile devides do not handle video as background.', 'voyant' ),
			'type'  => 'image_upload'
		);

		$opts[] = array(
			'key'   => 'video_options',
			'label' => __( 'Video Options', 'voyant' ),
			'type'  => 'multi',
			'opts' => array(
				array(
					'key'   => 'video_full_height',
					'label' => __( 'Video Full Height', 'voyant' ),
					'type'  => 'select',
					'ref' 	=> __( 'If this option is set to TRUE the video will use the full height of the screen automatically.', 'voyant' ),
					'opts'  => array(
							'full'  => array( 'name' => 'True (Default)' ),
							'fixed' => array( 'name' => 'False' )
						)
				),
				array(
					'key'   => 'video_height',
					'label' => __( 'Video Height (in pixels)', 'voyant' ),
					'ref' 	=> __( 'If you want to use a fixed height please enter the height ex: 500px.', 'voyant' ),
					'type'  => 'text'
				),
				array(
					'key'   => 'video_opacity',
					'label' => __( 'Video Opacity', 'voyant' ),
					'type'  => 'select',
					'opts'  => array(
							'.1' => array( 'name' => '10%' ),
							'.2' => array( 'name' => '20%' ),
							'.3' => array( 'name' => '30%' ),
							'.4' => array( 'name' => '40% (Default)' ),
							'.5' => array( 'name' => '50%' ),
							'.6' => array( 'name' => '60%' ),
							'.7' => array( 'name' => '70%' ),
							'.8' => array( 'name' => '80%' ),
							'.9' => array( 'name' => '90%' ),
							'1'  => array( 'name' => '100%' ),

						)
				),
				array(
					'key'   => 'video_start',
					'label' => __( 'Video Start At', 'voyant' ),
					'ref' 	=> __( 'Set the seconds the video should start at.', 'voyant' ),
					'type'  => 'text'
				),
				array(
					'key'   => 'video_end',
					'label' => __( 'Video Ends At', 'voyant' ),
					'ref' 	=> __( 'Set the seconds the video should stop at. If 0 is ignored.', 'voyant' ),
					'type'  => 'text'
				),
				array(
					'key'   => 'video_controls',
					'label' => __( 'Video Play Button', 'voyant' ),
					'type'  => 'select',
					'opts'  => array(
							'top'    => array( 'name' => 'Top' ),
							'bottom' => array( 'name' => 'Bottom (Default)' ),
							'hide'   => array( 'name' => 'Hide' )
						)
				),
				array(
					'key'   => 'video_mute',
					'label' => __( 'Video Mute at Start', 'voyant' ),
					'type'  => 'select',
					'opts'  => array(
							'mute'   => array( 'name' => 'Mute (Default)' ),
							'unmute' => array( 'name' => 'Unmute' )
						)
				),
				array(
					'key'   => 'video_loop',
					'label' => __( 'Video Loop', 'voyant' ),
					'type'  => 'select',
					'opts'  => array(
							'loop' => array( 'name' => 'True (Default)' ),
							'once' => array( 'name' => 'False' )
						)
				),
				array(
					'key'   => 'video_exit_text',
					'label' => __( 'Exit Text Indication', 'voyant' ),
					'ref' 	=> __( 'This text will show when the user click in the play botton, the default text is <strong>"Click to exit fullscreen video</strong>"', 'voyant' ),
					'type'  => 'text'
				),
			)
		);

		$opts[] = array(
			'key'       => 'slides_array',
			'type'      => 'accordion',
			'col'       => 2,
			'title'     => __('Video Slides Config', 'voyant'),
			'post_type' => __('Slides', 'voyant'),
			'opts'      => array(
				array(
					'key'		=> 'title',
					'label'		=> __( 'Title', 'voyant' ),
					'type'		=> 'textarea'
				),
				array(
					'key'   => 'text',
					'label' => __( 'Description', 'voyant' ),
					'type'  => 'textarea'
				)
			)
		);

		return $opts;
	}

}
