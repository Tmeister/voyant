jQuery(document).ready(function($) {

   'use strict';

   var $fixed = $('#fixed-top');
   var $window = $(window);
   var menuVisible = false;
   var $site = $('#site');

   $fixed.addClass('hide-menu');

   $window.on('scroll', function(event) {

   		if( $window.height() + 150 >= $site.height() ){
   			$fixed.removeClass('hide-menu');
   			$fixed.addClass('show-menu');
   			menuVisible = true;
   			return;
   		}

   		if( $window.scrollTop() > 150 && !menuVisible){
   			$fixed.removeClass('hide-menu');
   			$fixed.addClass('show-menu');
   			menuVisible = true;
   		}else if( menuVisible = true &&  $window.scrollTop() < 150){
   			$fixed.addClass('hide-menu');
   			$fixed.removeClass('show-menu');
   			menuVisible = false;
   		}
   });

   $window.trigger('scroll');


});