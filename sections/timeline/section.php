<?php
/*
	Section: Timeline
	Author: Enrique Chavez
	Author URI: http://enriquechavez.co
	Description: Timeline
	Class Name: TmVoyantTimeline
	Workswith: templates, main, header, morefoot, content
	Cloning: true
	Filter: component
	Loading: active
*/
class TmVoyantTimeline extends PageLinesSection {

	function section_opts(){
		$options = array();

		$options[] = array(
			'type'  => 'select',
			'key'   => 'align',
			'label' => __( 'Alignment', 'voyant' ),
			'opts'  => array(
				'align-left'  => array('name' => 'Left (Optional)' ),
				'align-right' => array('name' => 'Right'),
				'align-none'  => array('name' => 'Center')


			)
		);

		$options[] = array(
			'key'       => 'time_array',
			'type'      => 'accordion',
			'col'       => 2,
			'title'     => __('Timeline Setup', 'voyant'),
			'post_type' => __('Event', 'voyant'),
			'opts'      => array(
				array(
					'key'		=> 'title',
					'label'		=> __( 'Event Title', 'voyant' ),
					'type'		=> 'text'
				),
				array(
					'key'   => 'text',
					'label' => __( 'Description', 'voyant' ),
					'type'  => 'textarea'
				),
				array(
					'key'   => 'icon',
					'label' => __( 'Icon (Icon Mode)', 'voyant' ),
					'type'  => 'select_icon'
				),
				array(
					'key'   => 'date',
					'label' => __( 'Event Date (Optional)', 'voyant' ),
					'type'  => 'text'
				),
				array(
					'key'   => 'time',
					'label' => __( 'Event Time (Optional)', 'voyant' ),
					'type'  => 'text'
				)
			)
		);

		return $options;
	}

	function section_template(){

		$align = ( $this->opt('align') ) ? $this->opt('align') : 'align-left';
		$time_array = $this->opt('time_array');
	?>
		<div class="row">
			<div class="span12">
				<ul class="timeline <?php echo $align ?>">
					<?php 	if (!is_array($time_array)){
								$time_array = array('','','');
							}
							$count = 1;
					?>
						<?php
							foreach ($time_array as $event):

								$title = pl_array_get( 'title', $event, 'Event '. $count);

								$text  = pl_array_get( 'text',  $event, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean id lectus sem. Cras consequat lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean id lectus sem. Cras consequat lorem.');

								$icon = pl_array_get( 'icon', $event );

								if(!$icon || $icon == ''){
									$icons = pl_icon_array();
									$icon = $icons[ array_rand($icons) ];
								}

								$date = pl_array_get( 'date', $event, false);
								$time = pl_array_get( 'time', $event, false);
						?>
							<li>
						        <div class="icon icon-<?php echo $icon ?>"></div>
						        <div class="label-box">
									<div class="title" data-sync="time_array_item<?php echo $count?>_title"><?php echo $title ?></div>
									<div class="details" data-sync="time_array_item<?php echo $count?>_text">
									<?php echo do_shortcode($text); ?>
										<span class="dates">
											<span data-sync="time_array_item<?php echo $count?>_date">
												<?php if ($date): ?>
													<?php echo $date ?>
												<?php endif ?>
											</span>
											<?php if ($date && $time): ?> - <?php endif ?>
											<span data-sync="time_array_item<?php echo $count?>_time">
												<?php if ($time): ?>
													<?php echo $time ?>
												<?php endif ?>
											</span>

										</span>
						            </div>
						        </div>
						    </li>

						<?php $count++; endforeach ?>
				</ul>
			</div>
		</div>
	<?php
	}

}