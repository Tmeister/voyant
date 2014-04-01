<?php
/*
	Section: Mega Title
	Author: Enrique Chavez
	Author URI: http://enriquechavez.co
	Description: Titles
	Class Name: TmVoyantMegaTitle
	Workswith: templates, main, content
	Cloning: true
	Filter: component, dual-width
	Loading: active
*/
class TmVoyantMegaTitle extends PageLinesSection {

	function section_opts() {
		$opts = array(
			array(
				'type'  => 'multi',
				'key'  => 'mega_title',
				'opts'  => array(
					array(
						'type'  => 'text',
						'key'   => 'mega_title',
						'label' => __( 'Title', 'voyant' ),
					),
					array(
						'type'  => 'textarea',
						'key'   => 'mega_description',
						'label' => __( 'Description', 'voyant' ),
					),
					array(
						'type'  => 'text',
						'key'   => 'mega_shadow',
						'label' => __( 'Shadow Text', 'voyant' ),
						'ref'   => __( 'This text will show in the background, please note that the changes in this field will be visible after refresh the page.', 'voyant' )
					),
					array(
						'type'  => 'select',
						'key'   => 'mega_align',
						'label' => __( 'Alignment', 'voyant' ),
						'opts'  => array(
							'align-left'  => array( 'name' => 'Align Left (Default)' ),
							'align-right' => array( 'name' => 'Align Right' )
						)
					)
				)
			)
		);

		return $opts;
	}

	function section_template() {
		$title       = ( $this->opt( 'mega_title' ) ) ? $this->opt( 'mega_title' ) : '';
		$description = ( $this->opt( 'mega_description' ) ) ? $this->opt( 'mega_description' ) : '';
		$shadow      = ( $this->opt( 'mega_shadow' ) ) ? $this->opt( 'mega_shadow' ) : '';
		$align       = ( $this->opt( 'mega_align' ) ) ? $this->opt( 'mega_align' ) : 'align-left';
		//var_dump($align);

?>
		<div class="holder">
			<div class="mega-title <?php echo $align; ?>" data-shadow="<?php echo $shadow; ?>">
				<h1 class="<?php echo $align; ?>" data-sync="mega_title"><?php echo $title; ?></h1>
				<span class="<?php echo $align ?> medium-text" data-sync="mega_description">
					<?php echo $description; ?>
				</span>
			</div>
		</div>

	<?php
	}

}
