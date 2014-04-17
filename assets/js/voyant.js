jQuery(document).ready(function($) {

   'use strict';

   var $fixed = $('#fixed-top');
   var $window = $(window);
   var menuVisible = false;

   $fixed.addClass('hide-menu');

   $window.on('scroll', function(event) {

   		//console.log( $window.scrollTop() +' : '+)

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