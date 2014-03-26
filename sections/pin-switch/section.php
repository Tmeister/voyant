<?php
/*
	Section: Pin Switch
	Author: Enrique Chavez
	Author URI: http://enriquechavez.co
	Description: Pin Switch
	Class Name: TmVoyantPinSwitch
	Workswith: templates, main, header, morefoot, content
	Cloning: true
	Filter: component
	Loading: active
*/
class TmVoyantPinSwitch extends PageLinesSection {

	function section_styles(){
        wp_enqueue_script( 'tabpinnes', $this->base_url . '/tabpinnes.js', array( 'jquery' ), '1.0', true );
    }

    function section_head(){
    ?>
		<script>
			jQuery(document).ready(function($) {
				jQuery('<?php echo "#pin-switch".$this->meta["clone"]?> .tabpinnes').tabpinnes();
			});
		</script>
    <?php
    }

	function section_opts(){
		$options = array();

		$options[] = array(
			'key'		=> 'pin_array',
	    	'type'		=> 'accordion',
			'col'		=> 2,
			'title'		=> __('Pin Switch Setup', 'voyant'),
			'post_type'	=> __('Pin', 'voyant'),
			'opts'	=> array(
				array(
					'key'		=> 'title',
					'label'		=> __( 'Content Title', 'voyant' ),
					'type'		=> 'text'
				),
				array(
					'key'		=> 'text',
					'label'	=> __( 'Content Text', 'voyant' ),
					'type'	=> 'textarea'
				),
				array(
					'key'		=> 'icon_title',
					'label'		=> __( 'Icon Title', 'voyant' ),
					'type'		=> 'text'
				),
				array(
					'key'		=> 'icon',
					'label'		=> __( 'Icon (Icon Mode)', 'voyant' ),
					'type'		=> 'select_icon'
				),
			)
	    );

		return $options;
	}

	function section_template()
	{
		$pin_array = $this->opt('pin_array');
	?>

		<div class="holder tabpinnes">
			<div class="row">
				<div class="span8 offset2">
					<div class="info">
						<div class="contents">

							<?php if (is_array($pin_array)): $pinnes = count( $pin_array ); $count = 1; ?>

								<?php
									foreach ($pin_array as $pin):
										$title = pl_array_get( 'title', $pin, 'Pin '. $count);
										$text  = pl_array_get( 'text', $pin, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean id lectus sem. Cras consequat lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean id lectus sem. Cras consequat lorem.');
								?>

									<div class="ctab" data-name="ctab<?php echo $count ?>">
										<div class="title" data-sync="pin_array_item<?php echo $count?>_title">
											<?php echo $title ?>
										</div>
										<div class="description" data-sync="pin_array_item<?php echo $count?>_text">
											<?php echo do_shortcode( $text ); ?>
										</div>
									</div>
								<?php $count++; endforeach ?>
							<?php endif ?>
						</div>
					</div>
				</div>
			</div> <!-- CONTENTS ROW -->
			<div class="row">
				<div class="span8 offset2">
					<div class="tabbed">
						<ul class="pines">
							<?php if (is_array($pin_array)): $pinnes = count( $pin_array ); $count = 1; ?>

								<?php
									foreach ($pin_array as $pin):
										$icon_title = pl_array_get( 'icon_title', $pin, 'Pin '. $count);
										$icon = pl_array_get( 'icon', $pin );
										if(!$icon || $icon == ''){
											$icons = pl_icon_array();
											$icon = $icons[ array_rand($icons) ];
										}
										$width = ( 100 / $pinnes );
								?>
									<li class="tab <?php echo ($count == 1) ? 'active' : '' ?>" style="width:<?php echo $width ?>%">
									    <a href="#tab1" data-name="tab<?php echo $count ?>">
										    <div class="pin"></div>
										    <div class="line"></div>
										    <div class="icon"><i class="icon icon-2x icon-<?php echo $icon ?>"></i></div>
										    <h4 data-sync="pin_array_item<?php echo $count?>_icon_title"><?php echo $icon_title ?></h4>
									    </a>
									</li>
								<?php $count++; endforeach ?>
							<?php endif ?>
						</ul>
					</div>
				</div>
			</div> <!-- ROW PINNES -->
		</div> <!-- HOLDER TABPINNES -->

	<?php
	}

}