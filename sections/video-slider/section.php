<?php
/*
	Section: Video Slider
	Author: Enrique Chavez
	Author URI: http://enriquechavez.co
	Description: Video Slider
	Class Name: TmVoyantVideoSlider
	Workswith: templates, main, content
	Cloning: true
	Filter: component, full-width
	Loading: active
*/
class TmVoyantVideoSlider extends PageLinesSection {

	function section_styles() {
		wp_enqueue_script( 'BxSlider', $this->base_url . '/jquery.bxslider.min.js', array( 'jquery' ), '4.1.2', true );
		wp_enqueue_script( 'YTPlayer', $this->base_url . '/jquery.mb.YTPlayer.js', array( 'BxSlider' ), '2.6.4', true );
		wp_enqueue_script( 'VideoSlider', $this->base_url . '/videoslider.js', array( 'YTPlayer' ), '1.0', true );
	}

	function section_head() {
	?>
		<script>
			jQuery(document).ready(function($) {
				jQuery('<?php echo "#video-slider".$this->meta["clone"]?>').videoslider();
			});
		</script>
	<?php
	}

	function section_template() {
		$source      = ( $this->opt('video_source') ) ? $this->opt('video_source') : 'MeQo-Rl9VFc';
		$fullHeight  = ( $this->opt('video_full_height') == 'full' ) ? true : false;
		$fixedHeight = ( $this->opt('video_height') ) ? $this->opt('video_height') : '500px';
		$controls    = ( $this->opt('video_controls') ) ? $this->opt('video_controls') : 'bottom';
		$mute        = ( $this->opt('video_mute') == 'unmute' ) ? 'false' : 'true';
		$loop        = ( $this->opt('video_loop') == 'once' ) ? 'false' : 'true';
		$opacity     = ( $this->opt('video_opacity') ) ? $this->opt('video_opacity') : '.4';
		$startat     = ( $this->opt('video_start') ) ? $this->opt('video_start') : '0';
		$endsat      = ( $this->opt('video_end') ) ? $this->opt('video_end') : '0';

		$classHolder = ( $fullHeight ) ? 'full-height' : '';
		$cssPlayer   = ( !$fullHeight) ? $fixedHeight : '';
	?>
		<div class="holder <?php echo $classHolder ?>"  style="<?php echo $cssPlayer ?>" >
	    	<div class="the-player" id="player-<?php echo $this->meta["clone"]?>"></div>
	    	<div class="contents">
	    		<div class="inner pl-content">
	    			<?php if ($controls == 'top'): ?>
	    				<div class="controls">
	    					<i class="play icon icon-play"></i>
	    				</div>
	    			<?php endif ?>
	    			<div class="slides pl-content">
	    				<ul class="bxslider">
	    					<li>
	    						<h3 class="video-title">Yes, We just <i class="icon icon-heart"></i> what we do!</h3>
	    						<p class="video-subhead	detach">Vestibulum sit amet sagittis nibh, at tempor lorem. <br>Donec iaculis urna at dapibus dignissim.</p>
	    					</li>
	    					<li>
	    						<h3 class="video-title">Yes, We just <i class="icon icon-heart"></i> what we do 2!</h3>
	    						<p class="video-subhead	detach">Vestibulum sit amet sagittis nibh, at tempor lorem. <br>Donec iaculis urna at dapibus dignissim.<br>Vestibulum sit amet sagittis nibh, at tempor lorem. <br>Donec iaculis urna at dapibus dignissim.</p>
	    					</li>
	    					<li>
	    						<h3 class="video-title">Yes, We just <i class="icon icon-heart"></i> what we do 3!</h3>
	    						<p class="video-subhead	detach">Vestibulum sit amet sagittis nibh, at tempor lorem. <br>Donec iaculis urna at dapibus dignissim.</p>
	    					</li>
	    				</ul>
	    			</div>
	    			<?php if ($controls == 'bottom'): ?>
	    				<div class="controls">
	    					<i class="play icon icon-play"></i>
	    				</div>
	    			<?php endif ?>
	    		</div>
	    	</div>
	    	<div class="hiddencontrol"></div>
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
				)
			)
		);

		return $opts;
	}

}
