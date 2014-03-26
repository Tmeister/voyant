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
				        <time class="time" datetime="2013-04-10 18:30"><span>4/10/13</span> <span>18:30</span></time>
				        <div class="icon icon-phone"></div>
				        <div class="label-box">
				            <div class="title">Ricebean black-eyed pea</div>
				            <div class="details">Winter purslane...</div>
				        </div>
				    </li>
				    <li>
				        <time class="time" datetime="2013-04-11T12:04"><span>4/11/13</span> <span>12:04</span></time>
				        <div class="icon icon-gear"></div>
				        <div class="label-box">
				            <div class="title">Greens radish arugula</div>
				            <div class="details">Caulie dandelion maize...</div>
				        </div>
				    </li>
				    <li>
				        <time class="time" datetime="2013-04-13 05:36"><span>4/13/13</span> <span>05:36</span></time>
				        <div class="icon icon-music"></div>
				        <div class="label-box">
				            <div class="title">Sprout garlic kohlrabi</div>
				            <div class="details">Parsnip lotus root...</div>
				        </div>
				    </li>
				    <li>
				        <time class="time" datetime="2013-04-15 13:15"><span>4/15/13</span> <span>13:15</span></time>
				        <div class="icon icon-phone"></div>
				        <div class="label-box">
				            <div class="title">Watercress ricebean</div>
				            <div class="details">Peanut gourd nori...</div>
				        </div>
				    </li>
				    <li>
				        <time class="time" datetime="2013-04-16 21:30"><span>4/16/13</span> <span>21:30</span></time>
				        <div class="icon icon-gear"></div>
				        <div class="label-box">
				            <div class="title">Courgette daikon</div>
				            <div class="details">Parsley amaranth tigernut...</div>
				        </div>
				    </li>
				</ul>
			</div>
		</div>
	<?php
	}

}