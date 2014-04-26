<?php
/*
	Section: Page Title
	Author: Enrique Chavez
	Author URI: http://enriquechavez.co
	Description: Page Title
	Class Name: TmVoyantPageTitle
	Workswith: templates, main, content
	Cloning: true
	Filter: component, full-width
	Loading: active
*/
class TmVoyantPageTitle extends PageLinesSection {

	function section_opts() {
		$opts = array();
		return $opts;
	}

	function section_template() {
	?>
		<div class="holder">
			<div class="pl-content">
				<div class="row">
					<div class="span12">
						<h2><?php echo the_title(); ?></h2>
					</div>
					<div>
						<?php
							if ( function_exists('yoast_breadcrumb') ) {
								yoast_breadcrumb('<div id="breadcrumbs">','</div>');
							}
						?>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}
