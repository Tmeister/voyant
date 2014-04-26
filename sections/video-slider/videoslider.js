
;(function ( $, window, document, undefined ) {
		var pluginName = "videoslider",
			defaults = {
				autoplay: true
			};

		function Plugin ( element, options ) {
			this.element = element;
			this.settings = $.extend( {}, defaults, options );
			this._defaults = defaults;
			this._name = pluginName;
			this.init();
		}

		Plugin.prototype = {
			init: function () {
				var self = this;
				var $el  = $( self.element );
				var $win = $(window);
				var holder = $el.find('.holder');
				var fullHeight = $el.find('.full-height');
				var $video = $('.playersource',$el);
				var $play = $('.play', $el);
				var isPlaying = false;
				var $contents = $('.contents', $el);
				var $hidden = $('.hiddencontrol', $el);
				var $exit = $('.exit', $el);
				var $slides = $('.bxslider', $el);
				var $preloader = $('.preloader', $el);
				var slider;
				var exitWait;

				$hidden.hide();
				$contents.fadeOut();

				if( fullHeight.length > 0 ){
					$win.resize(function(event) {
						fullHeight.css({height: $win.height()});
					});
				}

				if( $play.length > 0 ){
					$play.click(function(event) {
						event.preventDefault();
						if( !isPlaying ){
							$contents.fadeOut('0', function() {
								$video.unmuteYTPVolume();
								$hidden.show();
								$('.mbYTP_wrapper', $el).css({opacity: 1});
								isPlaying = true;
								self.exitWait = setInterval(function(){
									clearInterval(self.exitWait);
									$exit.fadeOut('slow');
								}, 4000)
							});
						}
					});

					$hidden.click(function(event) {
						event.preventDefault();
						if( isPlaying ){
							$contents.fadeIn('0', function() {
								$hidden.hide();
								$video.muteYTPVolume();
								$('.mbYTP_wrapper', $el).css({opacity: .4});
								$exit.fadeIn();
								isPlaying = false;
								slider.goToNextSlide();
							});
						}
					});

				}

				$video.mb_YTPlayer();
				$video.on('YTPUnstarted', function(event) {
					$preloader.remove();
					$contents.fadeIn('slow');
				});

				if( $slides.find('li').length > 1 ){
					slider = $slides.bxSlider({
						mode:'fade',
						adaptiveHeight: true,
						pager:false,
						auto:true,
						controls:false,
						pause:8000
					});
				}
			}
		};

		$.fn[ pluginName ] = function ( options ) {
			this.each(function() {
				if ( !$.data( this, "plugin_" + pluginName ) ) {
					$.data( this, "plugin_" + pluginName, new Plugin( this, options ) );
				}
			});
			return this;
		};

})( jQuery, window, document );