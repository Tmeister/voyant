
;(function ( $, window, document, undefined ) {
		var pluginName = "voyantmenu",
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
				var $menu = $el.find('.voyant-menu');
    			var lastItems = $menu.find('>:nth-last-child(-n+10)');
    			var lastItem =  $menu.find('>:nth-last-child(-n+1)');
    			var $flag = false
				var $current;

    			/* Align the sub-menus */

			    wait = setInterval( function(){
			        maxLeft =  $(lastItem).position().left +  $(lastItem).width();
			        $.each(lastItems, function(index, val) {
			            $el = $(this);
			            $other = $(this)
			            $submenu = $el.find('>.sub-menu');

			            $submenu.find('li').each(function(index, el) {
			                $li = $(el);
			                if( $li.find('ul').length ){
			                    $li.addClass('grandchild');
			                }
			            });

			            if( ( $el.position().left + $submenu.width() ) > maxLeft ){
			                $submenu.css({'left': ($submenu.width()*-1) + $el.width()});
			                $submenu.find('>li>a').css({'text-align': 'right'});
			                $submenu.find('li').each(function(index, el) {
			                    $li = $(el);
			                    if( $li.find('ul').length ){
			                        $li.addClass('grandchild toleft');
			                    }
			                });
			            }
			        });
			        clearInterval(wait)
			    }, 500);

				/* Mobile Menu*/
				$nav = $('.voyant-nav');
				$parent = $nav.parent();
				$mobile = $nav.clone(true, true);
				$mobile.find('.voyant-menu').removeClass('voyant-menu').addClass('voyant-mobile-menu');
				$mobile.removeClass('voyant-nav').addClass('voyant-mobile-nav');
				$mobile.appendTo('.section-menu-voyant .span9');

				$holder = $mobile.find('.voyant-menu-holder');
				$holder.prepend('<a href="#" class="mobile-trigger"><i class="icon icon-align-justify"></i></a><div class="clear"></div>');

				$menu = $mobile.find('.voyant-mobile-menu');
				$menu.slideUp();

				$('.sub-menu', $menu).slideUp();

				var count = 1;
				jQuery('> li', $menu).each(function(index, el) {
					$el = jQuery(el);
					if( $el.find('.sub-menu').length > 0 ){
						$el.addClass('has-submenu');
						$el.attr('flag', 'a' + count++);
						$el.click(function(event) {
							$this = jQuery(this);
							if( $flag !=  $this.attr('flag')){
								if( $flag != false ){
									$current.find('.sub-menu').slideUp('fast');
								}
								$flag = $this.attr('flag');
								$current = $this;
								$this.find('.sub-menu').slideDown('fast');
								event.preventDefault();
							}
						});
					}
				});

				$('.mobile-trigger').toggle(function() {
					$menu.slideDown('fast');
				}, function() {
					$menu.slideUp('fast');
				});


				/* Show or Hide according to the scroll position*/
				var $fixed = $('#fixed-top');
				var $window = $(window);
				var menuVisible = false;
				var $site = $('#site');

				$fixed.addClass('hide-menu');

				$window.on('scroll', function(event) {
					if( $window.width() <= 768){
						$fixed.removeClass('hide-menu');
						$fixed.addClass('show-menu');
						menuVisible = true;
						return;
					}

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