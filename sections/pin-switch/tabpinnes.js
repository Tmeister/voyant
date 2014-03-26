/*
 *  jQuery tab pinnes
 *  http://enriquechavez.co
 *
 *  Made by Enrique Chavez
 */
;
(function($, window, document, undefined) {
    'use strict';
    var pluginName = "tabpinnes",
        defaults = {};

    function Plugin(element, options) {
        this.element = element;
        this.settings = $.extend({}, defaults, options);
        this._defaults = defaults;
        this._name = pluginName;
        this.interval;
        this.pinnes;
        this.currentIndex = 0	;
        this.init();
    }
    Plugin.prototype = {
        init: function() {
            // Place initialization logic here
            // You already have access to the DOM element and
            // the options via the self, e.g. this.element
            // and this.settings
            // you can add more functions like the one below and
            // call them like so: this.yourOtherFunction(this.element, this.settings).
            var $ele = $(this.element);
            var ctabs,
                currentTab,
                self = this;
            ctabs = $ele.find('.ctab');
            ctabs.fadeOut();
            currentTab = $(ctabs[0]);
            currentTab.fadeIn('slow');
            self.pinnes = $ele.find('.tab');
            /**********************************************************
             ** HANDLE MANUAL CLICK
             **********************************************************/
            $ele.find('.pines a').click(function(e) {
                e.preventDefault();
                var pin = $(this);
                var tab;
                ctabs.each(function(index, el) {
                    if ($(el).data('name') == 'c' + pin.data('name')) {
                        tab = $(el);
                    }
                });
                if (currentTab.data('name') != tab.data('name')) {
                    var tabName,
                        oldPin,
                        index;
                    tabName = currentTab.data('name');
                    tabName = tabName.split('c').join('');
                    oldPin = $ele.find('.pines .tab [data-name="' + tabName + '"]');
                    oldPin.parent().removeClass('active')
                    pin.parent().addClass('active');
                    index = parseInt(tab.data('name').split('ctab').join(''));
                    self.currentIndex = (index - 1);
                    currentTab.fadeOut('slow', function() {
                        tab.fadeIn('slow');
                        currentTab = tab;
                    });
                }
            });
            //self.autoPlay();
        },
        /******************************************************************
         ** AUTO PLAY
         ******************************************************************/
        autoPlay: function() {
            self = this;
            this.interval = setInterval(function() {
                if (++self.currentIndex == self.pinnes.length) {
                    self.currentIndex = 0;
                }
                console.log(self.currentIndex);
                var pin = $(self.pinnes[self.currentIndex]);
                pin.find('a').trigger('click');
            }, 5000);
        }
    };
    $.fn[pluginName] = function(options) {
        this.each(function() {
            if (!$.data(this, "plugin_" + pluginName)) {
                $.data(this, "plugin_" + pluginName, new Plugin(this, options));
            }
        });
        return this;
    };
})(jQuery, window, document);