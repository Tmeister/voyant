<?php
/*
	Section: Image Slider
	Author: Enrique Chavez
	Author URI: http://enriquechavez.co
	Description: Image Slider
	Class Name: TmVoyantImageSlider
	Workswith: templates, main, content
	Cloning: false
	Filter: component, full-width
	Loading: active
*/
class TmVoyantImageSlider extends PageLinesSection {

	function section_styles() {
		wp_enqueue_script( 'BxSlider', $this->base_url . '/jquery.bxslider.min.js', array( 'jquery' ), '4.1.2', true );
	}

	function section_head() {
	?>
		<script>
			jQuery(document).ready(function($) {
				var $slides = jQuery('<?php echo "#image-slider".$this->meta["clone"]?> .bxslider');
				var $win = $(window);
				var $fullHeight = jQuery('<?php echo "#image-slider".$this->meta["clone"]?>').find('.full-height');


				if( $fullHeight.length > 0 ){
					$win.resize(function(event) {
						$fullHeight.css({height: $win.height()});
					});
				}

				$slides.bxSlider({
						mode:'fade',
						adaptiveHeight: true,
						pager:false,
						auto:true,
						controls:false,
						pause:8000
					});
			});
		</script>
	<?php
	}

	function section_template() {
		$fullHeight  = ( $this->opt('image_full_height') == 'fixed' ) ? false : true;
		$fixedHeight = ( $this->opt('image_height') ) ? $this->opt('image_height') : '500px';

		$classHolder = ( $fullHeight ) ? 'full-height' : '';
		$cssPlayer   = ( !$fullHeight) ? $fixedHeight : '';
		$slides_array = $this->opt('slides_array');
		if (!is_array($slides_array)){
			$slides_array = array('','','');
		}
		$count = 1;
	?>
		<div class="holder <?php echo $classHolder ?>"  style="<?php echo $cssPlayer ?>" >
			<div class="contents">
	    		<div class="inner pl-content">
	    			<div class="slides pl-content">
	    				<ul class="bxslider">
	    					<?php
	    						foreach ($slides_array as $slide):
	    							$title = pl_array_get( 'title', $slide, 'Yes, We just <i class="icon icon-heart"></i> what we do '. $count.'!');
									$text  = pl_array_get( 'text',  $slide, 'Vestibulum sit amet sagittis nibh, at tempor lorem. <br>Donec iaculis urna at dapibus dignissim.');
	    					?>
		    					<li>
		    						<h3 class="image-title"><?php echo $title ?></h3>
		    						<p class="image-subhead	detach"><?php echo do_shortcode($text); ?></p>
		    					</li>
	    					<?php $count++; endforeach ?>
	    				</ul>
	    			</div>
	    		</div>
	    	</div>
		</div>
	<?php
	}

	function section_opts() {
		$options = array();

		$options[] = array(
			'key'   => 'image_options',
			'label' => __( 'Image Options', 'voyant' ),
			'type'  => 'multi',
			'opts' => array(
				array(
					'key'   => 'image_full_height',
					'label' => __( 'Image Full Height', 'voyant' ),
					'type'  => 'select',
					'ref' 	=> __( 'If this option is set to TRUE the image will use the full height of the screen automatically.', 'voyant' ),
					'opts'  => array(
							'full'  => array( 'name' => 'True (Default)' ),
							'fixed' => array( 'name' => 'False' )
						)
				),
				array(
					'key'   => 'image_height',
					'label' => __( 'Image Height (in pixels)', 'voyant' ),
					'ref' 	=> __( 'If you want to use a fixed height please enter the height ex: 500px.', 'voyant' ),
					'type'  => 'text'
				)
			)
		);

		$options[] = array(
			'key'       => 'slides_array',
			'type'      => 'accordion',
			'col'       => 2,
			'title'     => __('Image Slides Config', 'voyant'),
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

		return $options;
	}

}
