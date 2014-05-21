<?php
/*
	Section: Testimonials Voyant
	Author: Enrique Chavez
	Author URI: http://enriquechavez.co
	Description: Testimonial section for Voyant.
	Class Name: TmVoyantTestimonials
	Workswith: templates, main, morefoot, content
	Cloning: true
	Filter: component
	Loading: active
*/
class TmVoyantTestimonials extends PageLinesSection {

	function section_styles() {
		wp_enqueue_script( 'unoslider', $this->base_url . '/unoslider.js', array( 'jquery' ), '1.0', true );
	}

	function section_head() {
	?>
		<script>
		jQuery(document).ready(function($) {
			jQuery('.section-testimonials-voyant .holder').unoSlider({
				bullets: true
			});
		});
		</script>
	<?php
	}



	function section_template() {
		$theme       = ( $this->opt( 'testi_theme' ) ) ? $this->opt( 'testi_theme' ) : 'light';
		$shape       = ( $this->opt( 'avatar_shape' ) ) ? $this->opt( 'avatar_shape' ) : 'drop-bl-tr';
		$testi_array = $this->opt( 'testi_array' );

	?>
		<div class="holder <?php echo $theme; ?>">
			<ul class="testimonials">
				<?php 	if (!is_array($testi_array)){
							$testi_array = array('','','');
						}
						$testis = count($testi_array);
						$count = 1;
				?>
				<?php
					foreach ($testi_array as $testi):
						$name = pl_array_get( 'name', $testi, 'Testimonial '. $count);
						$text  = pl_array_get( 'text', $testi, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean id lectus sem. Cras consequat lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean id lectus sem. Cras consequat lorem.');
						$url = pl_array_get( 'url', $testi, false);
						$avatar = pl_array_get( 'avatar', $testi, false);
				?>
						<li class="current">
							<div class="testimonial">
								<?php if ($avatar): ?>
									<div class="avatar <?php echo $shape; ?>">
										<img data-sync="testi_array_item<?php echo $count?>_avatar" src="<?php echo $avatar ?>" alt="<?php echo $name ?>" />
									</div>
								<?php endif ?>
								<div class="quote" data-sync="testi_array_item<?php echo $count?>_text"><?php echo $text ?></div>
								<div class="author">
									<?php if ($url): ?>
										<a href="<?php echo $url ?>" target="_blank" data-sync="testi_array_item<?php echo $count?>_name"><?php echo $name ?></a>
									<?php else: ?>
										<span data-sync="testi_array_item<?php echo $count?>_name"><?php echo $name ?></span>
									<?php endif ?>

								</div>
							</div>
						</li>
					<?php $count++; endforeach ?>
			</ul>
			<div class="clearfix"></div>
			<ol class="unosliderNav"></ol>
		</div>
	<?php
	}

	function section_opts() {
		$opts = array();

		$opts[] = array(
			'key'   => 'testi_theme',
			'label' => __( 'Color Theme', 'voyant' ),
			'type'  => 'select',
			'opts'  => array(
					'light' => array( 'name' => 'Light (Default)' ),
					'dark'  => array( 'name' => 'Dark' )
				)
		);

		$opts[] = array(
			'key'   => 'avatar_shape',
			'label' => __( 'Avatar Shape (Optional)', 'voyant' ),
			'type'  => 'select',
			'opts'  => array(
					'drop-bl-tr'  => array( 'name' => 'Drop Botom-Left to Top-Right (Default)' ),
					'drop-tl-br'  => array( 'name' => 'Drop Top-Left Bottom-Right' ),
					'drop-circle' => array( 'name' => 'Circle' )
				)
		);

		$opts[] = array(
			'key'       => 'testi_array',
			'type'      => 'accordion',
			'col'       => 2,
			'title'     => __('Testimonials Setup', 'voyant'),
			'post_type' => __('Testimonial', 'voyant'),
			'opts'      => array(
				array(
					'key'		=> 'name',
					'label'		=> __( 'Name', 'voyant' ),
					'type'		=> 'text'
				),
				array(
					'key'   => 'text',
					'label' => __( 'Testimonial', 'voyant' ),
					'type'  => 'textarea'
				),
				array(
					'key'   => 'url',
					'label' => __( 'URL (Optional)', 'voyant' ),
					'type'  => 'text'
				),
				array(
					'key'   => 'avatar',
					'label' => __( 'Avatar (Optional)', 'voyant' ),
					'type'  => 'image_upload'
				)
			)
	    );
		return $opts;
	}
}
