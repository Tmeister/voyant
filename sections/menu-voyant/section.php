<?php
/*
	Section: Menu Voyant
	Author: Enrique Chavez
	Author URI: http://enriquechavez.co
	Description: Fixed Menu for Voyant theme.
	Class Name: TmVoyantMenu
	Workswith: templates, main, content
	Cloning: true
	Filter: component, full-width
	Loading: active
*/
class TmVoyantMenu extends PageLinesSection {



	function section_styles() {
		wp_enqueue_script( 'voyant-menu', $this->base_url . '/voyant-menu.js', array( 'jquery' ), '1.0', true );
	}

	function section_head(){
	?>
		<script>
		jQuery(document).ready(function($) {
			jQuery('.voyant-nav').voyantmenu();
		});
		</script>
	<?php
	}

	function section_template() {
		$color     = $this->opt('menu_bg') ? pl_hashify($this->opt('menu_bg')) : '#000000';
		$alpha     = $this->opt('menu_bg_alpha') ? $this->opt('menu_bg_alpha') : '.5';

		$bg_ind    = $this->opt('ind_bg') ? pl_hashify($this->opt('ind_bg')) : '#000000';
		$alpha_ind = $this->opt('ind_bg_alpha') ? $this->opt('ind_bg_alpha') : '.2';
		$font      = $this->opt('ind_icon_color') ? pl_hashify($this->opt('ind_icon_color')) : '#ffffff';



	?>
		<div class="holder" style="background: rgba( <?php echo voyant_hex2rgb($color) ?>, <?php echo $alpha ?> );">
			<div class="pl-content">
				<div class="row" >
					<div class="span3">
						<div class="holder">
		                    <a href="<?php echo get_site_url(); ?>" class="main_logo">
		                        <img src="<?php echo $this->opt('voyant_logo') ?>" alt="" data-sync="voyant_logo">
		                    </a>
						</div>
					</div>
					<div class="span9">
						<div class="voyant-nav">
							<?php
	                            if ( $this->opt( 'voyant_main_menu' ) ) {
	                                wp_nav_menu(
	                                    array(
	                                        'menu_class'  => 'voyant-menu',
	                                        'container' => 'div',
	                                        'container_class' => 'voyant-menu-holder',
	                                        'menu' => $this->opt('voyant_main_menu')
	                                    )
	                                );
	                            }
	                        ?>
                    	</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}

	function section_opts() {

		$opts = array();

		$opts[] = array(
            'type'  => 'select_menu',
            'title' => 'Main Menu',
            'key'   => 'voyant_main_menu',
            'label' => __('Select the main menu', 'voyant')
        );

		$opts[] = array(
			'type'  => 'image_upload',
			'key'   => 'voyant_logo',
			'label' => __('Please upload your logo', 'voyant'),
			'help'  => __('For better visualitation in Retina Displays please use a 350x130px image')
		);

		$opts[] = array(
			'type'  => 'multi',
			'key'   => 'multi_menu',
			'label' => 'Menu Background',
			'opts'  => array(
				array(
					'type' => 'color',
					'key' => 'menu_bg',
					'label' => 'Background Color',
				),
				array(
					'type' => 'select',
					'key' => 'menu_bg_alpha',
					'label' => 'Background Color Alpha',
					'opts' => array(
						'.1' => array('name' => '10%'),
						'.2' => array('name' => '20%'),
						'.3' => array('name' => '30%'),
						'.4' => array('name' => '40%'),
						'.5' => array('name' => '50%'),
						'.6' => array('name' => '60%'),
						'.7' => array('name' => '70%'),
						'.8' => array('name' => '80%'),
						'.9' => array('name' => '90%'),
						'1' => array('name' => '100%')
					)
				)
			)
		);

		$opts[] = array(
			'type' => 'multi',
			'key' => 'multi_menu_indicator',
			'label' => 'Menu Indicator',
			'opts' => array(
				array(
					'type' => 'color',
					'key' => 'ind_bg',
					'label' => 'Indicator Background Color',
				),
				array(
					'type' => 'select',
					'key' => 'ind_bg_alpha',
					'label' => 'Indicator Background Color Alpha',
					'opts' => array(
						'.1' => array('name' => '10%'),
						'.2' => array('name' => '20%'),
						'.3' => array('name' => '30%'),
						'.4' => array('name' => '40%'),
						'.5' => array('name' => '50%'),
						'.6' => array('name' => '60%'),
						'.7' => array('name' => '70%'),
						'.8' => array('name' => '80%'),
						'.9' => array('name' => '90%'),
						'1' => array('name' => '100%')
					)
				),
				array(
					'type' => 'color',
					'key' => 'ind_icon_color',
					'label' => 'Indicator Icon Color'
				)
			)
		);

		return $opts;
	}

}
