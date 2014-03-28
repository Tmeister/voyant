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
		return $options;
	}

	function persistent(){}

	function section_template(){
	?>
		<div class="row">
			<div class="span12">
				<ul class="timeline">
				    <li>
				        <div class="icon icon-phone"></div>
				        <div class="label-box">
				            <div class="title">Ricebean black-eyed pea</div>
				            <div class="details">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</div>
				        </div>
				    </li>
				    <li>
				        <div class="icon icon-gear"></div>
				        <div class="label-box">
				            <div class="title">Greens radish arugula</div>
				            <div class="details">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</div>
				        </div>
				    </li>
				    <li>
				        <div class="icon icon-music"></div>
				        <div class="label-box">
				            <div class="title">Sprout garlic kohlrabi</div>
				            <div class="details">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</div>
				        </div>
				    </li>
				</ul>
			</div>
		</div>

		<div class="row">
			<div class="span12">
				<ul class="timeline align-left">
				    <li>
				        <div class="icon icon-phone"></div>
				        <div class="label-box">
				            <div class="title">Ricebean black-eyed pea</div>
				            <div class="details">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</div>
				        </div>
				    </li>
				    <li>
				        <div class="icon icon-gear"></div>
				        <div class="label-box">
				            <div class="title">Greens radish arugula</div>
				            <div class="details">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</div>
				        </div>
				    </li>
				    <li>
				        <div class="icon icon-music"></div>
				        <div class="label-box">
				            <div class="title">Sprout garlic kohlrabi</div>
				            <div class="details">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</div>
				        </div>
				    </li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="span12">
				<ul class="timeline align-right">
				    <li>
				        <div class="icon icon-phone"></div>
				        <div class="label-box">
				            <div class="title">Ricebean black-eyed pea</div>
				            <div class="details">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</div>
				        </div>
				    </li>
				    <li>
				        <div class="icon icon-gear"></div>
				        <div class="label-box">
				            <div class="title">Greens radish arugula</div>
				            <div class="details">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</div>
				        </div>
				    </li>
				    <li>
				        <div class="icon icon-music"></div>
				        <div class="label-box">
				            <div class="title">Sprout garlic kohlrabi</div>
				            <div class="details">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</div>
				        </div>
				    </li>
				</ul>
			</div>
		</div>
	<?php
	}

}