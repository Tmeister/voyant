<?php
/*
	Section: Testimonials Voyant
	Author: Enrique Chavez
	Author URI: http://enriquechavez.co
	Description: Testimonials
	Class Name: TmVoyantTestimonials
	Workswith: templates, main, morefoot, content
	Cloning: true
	Filter: component
	Loading: active
*/
class TmVoyantTestimonials extends PageLinesSection {

	function section_styles() {
		wp_enqueue_script( 'tabpinnes', $this->base_url . '/unoslider.js', array( 'jquery' ), '1.0', true );
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

	function section_opts() {
		$opts = array();
		return $opts;
	}

	function section_template() {
?>
		<div class="holder">
			<ul class="testimonials">
				<li class="current">
					<div class="testimonial">
						<div class="avatar">
							<img src="http://dms.tmeister.net/flatten/wp-content/themes/flatten/demo/team7.jpg" alt="">
						</div>
						<div class="quote">Old friends pass away, new friends appear. It is just like the days. An old day passes, a new day arrives. The important thing is to make it meaningful: a meaningful friend - or a meaningful day.
						</div>
						<div class="author"><a href="#">Dalai Lama</a></div>
					</div>
				</li>
				<li>
					<div class="testimonial">
						<div class="avatar">
							<img src="http://dms.tmeister.net/flatten/wp-content/themes/flatten/demo/team1.jpg" alt="">
						</div>
						<div class="quote">Old friends pass away, new friends appear. It is just like the days. An old day passes, a new day arrives. The important thing is to make it meaningful: a meaningful friend - or a meaningful day. Old friends pass away, new friends appear. It is just like the days. An old day passes, a new day arrives. The important thing is to make it meaningful: a meaningful friend - or a meaningful day. Old friends pass away, new friends appear. It is just like the days. An old day passes, a new day arrives. The important thing is to make it meaningful: a meaningful friend - or a meaningful day.</div>
						<div class="author"><a href="#">Dalai Lama 2</a></div>
					</div>
				</li>
				<li>
					<div class="testimonial">
						<div class="avatar">
							<img src="http://dms.tmeister.net/flatten/wp-content/themes/flatten/demo/team2.jpg" alt="">
						</div>
						<div class="quote">Old friends pass away, new friends appear. It is just like the days. An old day passes, a new day arrives. The important thing is to make it meaningful: a meaningful friend - or a meaningful day. Old friends pass away, new friends appear. It is just like the days. An old day passes, a new day arrives. The important thing is to make it meaningful: a meaningful friend - or a meaningful day.</div>
						<div class="author"><a href="#">Dalai Lama 3</a></div>
					</div>
				</li>
			</ul>
			<div class="clearfix"></div>
			<ol class="unosliderNav"></ol>
		</div>
	<?php
	}
}