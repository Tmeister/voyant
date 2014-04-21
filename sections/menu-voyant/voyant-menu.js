
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

				/*$clone = $source.clone(true, true).prependTo( "body" );
				$source.remove();
				$close = $clone.find('.close-menu');

				$el.on('click', function(event) {
					event.preventDefault();
					if( !$clone.hasClass('menu-open') ){
						$clone.addClass('menu-open');
						$site.addClass('superscale');
						$('body').addClass('dark-bg')
					}
				});

				$close.on('click', function(event) {
					event.preventDefault();
					$clone.removeClass('menu-open');
					$site.removeClass('superscale');
					$('body').removeClass('dark-bg')
				});

				$clone.find('ul > li:has(ul)').on('click', function(event) {
					var item = $( this );
					console.log( item )
			        if( item[ 0 ] != currentMobileItem[ 0 ] )
			        {
			            if( currentMobileItem ){
			                //currentMobileItem.find('>ul').slideUp('slow')
			            }
			            event.preventDefault();
			            currentMobileItem = item;
			            $(this).find('>ul').slideDown('slow');
			        }
				});*/
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