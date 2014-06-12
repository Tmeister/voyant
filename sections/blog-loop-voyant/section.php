<?php
/*
	Section: WP Loop Voyant
	Author: Enrique Chavez
	Author URI: http://enriquechavez.co
	Description: Custom Loop Blog for Voyant, this loop support all the WordPress Post formats.
	Class Name: TmVoyantWpBlogLoop
	Workswith: templates, main, content
	Cloning: true
	Filter: component
*/
class TmVoyantWpBlogLoop extends PageLinesSection {

	function section_opts() {
		$opts = array(

			array(
				'key'		=> 'post_content',
				'type'		=> 'edit_post',
				'title'		=> __( 'Edit Post Content', 'pagelines' ),
				'label'		=>	__( '<i class="icon icon-edit"></i> Edit Post Info', 'pagelines' ),
				'help'		=> __( 'This section uses WordPress posts. Edit post information using WordPress admin.', 'pagelines' ),
				'classes'	=> 'btn-primary'
			),
			array(
				'key'		=> 'post_media_hide',
				'case'		=> 'special',
				'type'		=> 'check',
				'col'			=> 3,
				'default'	=> false,
				'title'		=> __( 'Hide Media on archives', 'pagelines' ),
			),
			array(
				'key'			=> 'pl_loop_thumb_size',
				'type' 			=> 'select_imagesizes',
				'scope'			=> 'global',
				'col'			=> 3,
				'default'		=> 'aspect-thumb',
				'label' 		=> __( 'Select Thumb Size', 'pagelines' )
			),

			array(
				'key'			=> 'metabar_standard',
				'scope'			=> 'global',
				'default'		=> 'On [post_date] | [post_comments] [post_edit]',
				'type'			=> 'text',
				'col'			=> 2,
				'label'			=> __( 'Enter Meta Information', 'pagelines' ),
				'title'			=> __( 'Meta Information', 'pagelines' ),
				'ref'			=> __( 'Use shortcodes to control the dynamic information in your metabar. Example shortcodes you can use are: <ul><li><strong>[post_categories]</strong> - List of categories</li><li><strong>[post_edit]</strong> - Link for admins to edit the post</li><li><strong>[post_tags]</strong> - List of post tags</li><li><strong>[post_comments]</strong> - Link to post comments</li><li><strong>[post_author_posts_link]</strong> - Author and link to archive</li><li><strong>[post_author_link]</strong> - Link to author URL</li><li><strong>[post_author]</strong> - Post author with no link</li><li><strong>[post_time]</strong> - Time of post</li><li><strong>[post_date]</strong> - Date of post</li><li><strong>[post_type]</strong> - Type of post</li></ul>', 'pagelines' )
			)
		);
		return $opts;
	}

	function before_section_template( $location = '' ) {

		global $wp_query;

		if( isset($wp_query) && is_object($wp_query) )
			$this->wrapper_classes[] = ( $wp_query->post_count > 1 ) ? 'multi-post' : 'single-post';

	}

	function section_template() {
		if( do_special_content_wrap() ) {

			global $integration_out;
			echo $integration_out;

		} else {

			if( pl_standard_post_page() ){
				echo '<div class="pl-new-loop">';
				$this->loop();
				echo '</div>';
			}else{
				$this->standard_loop();
			}
		}
	}

	/*
	 * Standard loop.
	 */
	function standard_loop() {

		if( have_posts() )
			while ( have_posts() ) : the_post();
			the_content();
			endwhile;
	}

	function loop(){

		$count = 0;
		global $plpg;

		if( have_posts() ){
			while ( have_posts() ){
				the_post();
				$count++;
				$format         = get_post_format();
				$linkbox        = ($format == 'quote' || $format == 'link') ? true : false;
				$class          = array();
				$postlist       = ( $plpg->is_blog_page_type() ) ? true : false;
				$class[ ]       = ( is_archive() || is_search() || is_home() ) ? 'multi-post' : '';
				$class[ ]       = ( ! $postlist ) ? 'standard-page' : '';
				$class[ ]       = ( is_single() ) ? 'single-post' : '';
				$class[ ]       = 'pl-border';
				$class[ ]       = 'pl-new-loop';
				$gallery_format = get_post_meta( get_the_ID(), '_pagelines_gallery_slider', true);
				$class[ ]       = ( ! empty( $gallery_format ) ) ? 'use-flex-gallery' : '';
				$thumb_size     = ( pl_setting('pl_loop_thumb_size' ) ) ? pl_setting('pl_loop_thumb_size' ) : 'landscape-thumb';
				$classes        = apply_filters( 'pagelines_get_article_post_classes', join( " ", $class) );
				?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
					<?php
						$content = trim( get_the_content('Read more'));
						if( ! $this->opt( 'post_media_hide' ) )
						{
							$this->do_media_finder($format, $content, $thumb_size);
						}
					?>
					<div class="entry-content">
						<?php

							$day = get_the_date('j');
							$month = get_the_date('M');

							if( is_single() || is_page() ){

								if( $format == 'quote' || $format == 'link'){
								}else{
									echo "<hr>";
									echo "<div class='entry-data'>";
									echo "<div class='entry-date'>";
									echo "<div class='day'>".$day."</div>";
									echo "<div class='month'>".$month."</div>";
									echo "</div>";
									echo "<div class='entry-content'>";

										echo apply_filters('the_content', ( $this->get_final_content($format, true) ) );

									echo "</div>";
									echo "</div>";
								}


							} elseif( ! $linkbox ) {

								echo "<div class='entry-data'>";
									echo "<div class='entry-date'>";
									echo "<div class='day'>".$day."</div>";
									echo "<div class='month'>".$month."</div>";
									echo "</div>";
									echo "<div class='entry-content'>";
										if( ! $linkbox ){
											echo "<div class='entry-header'>";
											if ( is_single() ) :
												the_title( '<h2 class="entry-title">', '</h2>' );
											elseif( ! is_page() ) :
												the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
											endif;
											echo "</div>";
										}

										echo $this->get_final_content($format);




									echo "</div>";
									echo "<div class='clear'></div>";
								echo "</div>";
								echo "<hr>";
								echo "<div class='entry-footer row'>";

									$meta = ( pl_setting('metabar_standard') ) ? pl_setting('metabar_standard') : 'Posted [post_date] &middot; [post_comments] [post_edit]';

									if( $meta && ! is_page() && get_post_type() != 'page' ){
										printf( '<div class="metabar span10"><div class="holder"> %s </div></div>', do_shortcode( $meta ) );
									}

									printf(
										'<div class="continue_reading_link span2"><a class="btn" href="%s" title="%s %s">%s</a></div>',
										get_permalink(),
										__("Read More", 'pagelines'),
										the_title_attribute(array('echo'=> 0)),
										__('Read More <i class="icon icon-angle-right"></i>', 'pagelines')
									);
								echo "</div>";
							}
						?>
					</div><!-- .entry-content -->
					<hr>
				</article><!-- #post-## -->
				<?php
			} #END WHILE;

			#Pagination
			global $wp_query;
			if ($wp_query->max_num_pages > 1){
				if ( get_query_var( 'paged' ) ){
					$paged = get_query_var('paged');
				} else if ( get_query_var( 'page' ) ){
					$paged = get_query_var( 'page' );
				} else{
					$paged = 1;
				}
			?>
				<div class="pagination">
					<div class="pag-holder">
						<?php
							if ( is_single() ) {
								echo paginate_links( array(
									'base'    => get_permalink() . '%#%',
									'format'  => '?paged=%#%',
									'current' => max( 1, $paged ),
									'total'   => $wp_query->max_num_pages
								) );
							} else {
								$big = 999999;
								echo paginate_links( array(
									'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
									'format'  => '?paged=%#%',
									'current' => max( 1, $paged ),
									'total'   => $wp_query->max_num_pages,
									'prev_text' => __('«', 'voyant'),
									'next_text' => __('»', 'voyant')
								) );
							}
						?>
					</div>
				</div>
			<?php
			}

		}else{
			$this->posts_404();
		}
	}

	function get_final_content($format, $full = false){
		$content = ( $full ) ? get_the_content('Continue reading <span class="meta-nav">&rarr;</span>', 'pagelines' ) : trim(get_the_excerpt());
		switch ($format) {

			case 'audio':
				if( preg_match('#^https?://w.soundcloud.com\S+#', $content, $match ) ){
					return substr($content, strlen($match[0]));
				}

				if(preg_match('#^http?://\S+#', $content, $match) && !$soundcloud){
					return substr($content, strlen($match[0]));
				}else if(preg_match('#^\[audio\s.+\[/audio\]#', $content, $match) && !$soundcloud){
					return substr($content, strlen($match[0]));
				}

				return $content;
				break;

			case 'video':
				if( preg_match('#^//player.vimeo.com/\S+#', $content, $match ) ){
					return substr($content, strlen($match[0]));
				}

				if( preg_match('#^//www.youtube.com/\S+#', $content, $match ) && !$vimeo ){
					return substr($content, strlen($match[0]));
				}

				if(preg_match('#^http?://\S+#', $content, $match)){
					return substr($content, strlen($match[0]));
				}else if(preg_match('#^\[video\s.+\[/video\]#', $content, $match)){
					return substr($content, strlen($match[0]));
				}
				return $content;
				break;

			case 'quote':
			case 'link':
				return '';

			default:
				return $content;
				break;
		}
	}

	function do_media_finder($format, $content, $thumb_size){
		$post_format_data = false;
		switch ($format) {
			case 'link':
				preg_match('#^http?://\S+#', $content, $match);
				$args = array( 'link' => $match[0] );
				printf( '<div class="metamedia">%s</div>', pagelines_media( $args ) );
				break;

			case 'quote':
			case 'gallery':
				$args = array();
				printf( '<div class="metamedia">%s</div>', pagelines_media( $args ) );
				break;

			case 'audio':
				$soundcloud = false;

				if( preg_match('#^https?://w.soundcloud.com\S+#', $content, $match ) ){
					$post_format_data = '<iframe width="100%" height="185" scrolling="no" frameborder="no" src="'.$match[0].'"></iframe>';
					$soundcloud = true;
				}

				if(preg_match('#^http?://\S+#', $content, $match) && !$soundcloud){
					$post_format_data = do_shortcode('[audio src="' . $match[0] . '" ][/audio]');
				}else if(preg_match('#^\[audio\s.+\[/audio\]#', $content, $match) && !$soundcloud){
					$post_format_data = do_shortcode($match[0]);
				}
				printf( '<div class="metamedia">%s</div>', $post_format_data );
				break;

			case 'video':

				$vimeo = false;
				$youtube = false;

				if( preg_match('#^//player.vimeo.com/\S+#', $content, $match ) ){
					$post_format_data = '<iframe src="'.$match[0].'" width="100%" height="476" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
					$vimeo = true;
				}

				if( preg_match('#^//www.youtube.com/\S+#', $content, $match ) && !$vimeo ){
					$post_format_data = '<iframe width="100%" height="476" src="'.$match[0].'" frameborder="0" allowfullscreen></iframe>';
					$youtube = true;
				}

				if(preg_match('#^http?://\S+#', $content, $match) && !$vimeo && !$youtube){
					$post_format_data = do_shortcode('[video mp4="' . $match[0] . '" ][/video]');
				}else if(preg_match('#^\[video\s.+\[/video\]#', $content, $match) && !$vimeo){
					$post_format_data = do_shortcode($match[0]);
				}
				printf( '<div class="metamedia">%s</div>', $post_format_data );
				break;

			default:
				$args = array( 'thumb-size' => $thumb_size );
				$data = pagelines_media( $args );
				if($data){
					printf( '<div class="metamedia">%s</div>', pagelines_media( $args ) );
				}
				break;
		}
	}

	function posts_404(){

		$head = ( is_search() ) ? sprintf(__('No results for &quot;%s&quot;', 'pagelines'), get_search_query()) : __('Nothing Found', 'pagelines');

		$subhead = ( is_search() ) ? __('Try another search?', 'pagelines') : __("Sorry, what you are looking for isn't here.", 'pagelines');

		$the_text = sprintf('<h2 class="center">%s</h2><p class="subhead center">%s</p>', $head, $subhead);

		printf( '<section class="billboard">%s <div class="center fix">%s</div></section>', apply_filters('pagelines_posts_404', $the_text), pagelines_search_form( false ));

	}

}
