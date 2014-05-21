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

		$opts[] = array(
			'type'  => 'text',
			'key'   => 'blog_title',
			'label' => __( 'Default title for the blog page', 'voyant'),
			'title' => __('Default title', 'voyant'),
			'help'  => __('This title will be used in the blog page')
		);

		return $opts;
	}

	function section_template() {
		global $plpg;

		switch ($plpg->type) {
			case 'blog':
				$title = $this->opt('blog_title');
				break;
			case 'category':
				$title = __('Category:', 'voyant') . ' ' . single_cat_title('', false);
				break;
			case 'archive':
				if( is_day() ){
					$title = __( 'Daily Archives:', 'voyant') . ' ' . get_the_date();
				}elseif(is_month()){
					$title = __( 'Month Archives:', 'voyant') . ' ' . get_the_date('F Y');
				}elseif(is_year()){
					$title = __( 'Yearly Archives:', 'voyant') . ' ' . get_the_date('Y');
				}
				break;
			case 'author':
				$title = __('Author:') .' '. get_the_author();
				break;
			case 'tag':
				$title = __('Tag:', 'voyant') . ' ' .single_cat_title('', false);
				break;
			case 'search':
				$title = __('Searching:', 'voyant') . ' ' .get_search_query();
				break;
			default:
				$title = get_the_title();
				break;
		}
	?>
		<div class="holder">
			<div class="pl-content">
				<div class="row">
					<div class="span12">
						<h2><?php echo $title; ?></h2>
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
