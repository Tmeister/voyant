<?php
/*
	Section: Team Member
	Author: Enrique Chavez
	Author URI: http://enriquechavez.co
	Description: TEam Member Section
	Class Name: TmVoyantTeam
	Workswith: templates, main, content
	Cloning: true
	Filter: component
	Loading: active
*/
class TmVoyantTeam extends PageLinesSection {

	function section_template() {
		$team_array = $this->opt('team_array');
		$team_span = $this->opt('team_span') ? $this->opt('team_span') : 3;
		if( !is_array( $team_array)){
            echo setup_section_notify($this, __('Please start adding some team members.', 'voyant'));
            return;
        }

        $count = 1;
	?>
		<div class="row">
			<?php foreach ($team_array as $member):
				$name     = pl_array_get( 'name', $member, 'John Doe');
				$position = pl_array_get( 'position', $member, 'CEO');
				$avatar   = pl_array_get( 'image', $member, 'http://dummyimage.com/520x520/000/fff');
				$bio      = pl_array_get( 'bio', $member, 'Sed quis elementum erat. Sed volutpat lacinia tellus, ac volutpat lacus. Donec gravida eleifend dui.');
			?>
				<div class="span<?php echo $team_span ?>">
					<div class="holder">

							<div class="member-data">
								<div class="media">
									<img data-sync="team_array_item<?php echo $count?>_image" src="<?php echo $avatar ?>" alt="<?php echo $name ?>" />
								</div>
								<div class="name" data-sync="team_array_item<?php echo $count?>_name"><?php echo $name ?></div>
								<div class="position" data-sync="team_array_item<?php echo $count?>_position"><?php echo $position ?></div>
							</div>
							<div class="description" data-sync="team_array_item<?php echo $count?>_bio"><?php echo $bio ?></div>
							<div class="social">
								<?php foreach ($this->get_valid_social_sites() as $social => $name):
	                                $link = pl_array_get( $name, $member);
	                                if( !$link ){continue;}
	                                switch ($name) {
	                                    case 'google':
	                                        $class = "google-plus";
	                                        break;
	                                    default:
	                                         $class = $name;
	                                        break;
	                                }
	                            ?>
	                            	<a href="<?php echo $link ?>"><span class="<?php echo $name ?>"><i class="icon icon-<?php echo $class ?>"></i></span></a>
	                            <?php endforeach; ?>
							</div>
					</div>
				</div>
			<?php $count++; endforeach; ?>
		</div>
	<?php
	}

	function section_opts() {

		$options = array();

		$options[] = array(
            'type' => 'multi',
            'title' => __('Team Member Configuration', 'voyant'),
            'label' => __('Team Member Configuration', 'voyant'),
            'opts' => array(
                array(
                    'key'          => 'team_span',
                    'type'         => 'count_select',
                    'count_start'  => 1,
                    'count_number' => 12,
                    'label'        => __('Number of Columns for each box (12 Col Grid)', 'voyant')
                )
            )

        );

        $box = array(
            'key' => 'team_array',
            'type' => 'accordion',
            'col' => 2,
            'title' => __( 'Team Member Settings', 'voyant' ),
            'post_type' => 'Team Member',
            'opts'  => array(
                    array(
                        'key'   => 'name',
                        'type'  => 'text',
                        'label' => __('Team member Name', 'voyant'),
                    ),
                    array(
                        'key'   => 'position',
                        'type'  => 'text',
                        'label' => __('Team member Position', 'voyant'),
                    ),
                    array(
                        'key'   => 'image',
                        'type'  => 'image_upload',
                        'title' => __('Team member image','voyant'),
                        'help'  => __('The image size must be 1:1 min size 260x260', 'voyant')
                    ),
                    array(
                        'key'   => 'bio',
                        'type'  => 'textarea',
                        'title' => __('Team member short bio.', 'voyant')
                    )
                )
        );
		$socials = $this->get_social_fields_accordion();

        foreach ($socials as $social) {
            array_push($box['opts'], $social);
        }

        array_push($options, $box);

		return $options;
	}

	function get_social_fields_accordion()
    {
        $out = array();
        foreach ($this->get_valid_social_sites() as $social => $name)
        {
            $tmp = array(
                'key'   => $name,
                'label' => ucfirst($name),
                'type'  => 'text'
            );
            array_push($out, $tmp);
        }
        return $out;
    }

    function get_valid_social_sites()
    {
        return array("dribbble", "facebook", "github", "google", "linkedin" ,"pinterest", "tumblr", "twitter");
    }

}
