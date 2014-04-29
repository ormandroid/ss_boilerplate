;(function($) {
    $.entwine('boilerplate', function($){
        $('.color-picker').entwine({
            onmatch: function(){
                var self = this;
                this.on('click', function(e) {
                    $(this).iris({
                        hide: false,
                        change: function(event, ui) {
                            var $c, $r, $g, $b, $mid;
                            $(this).css('backgroundColor', ui.color.toString());
                        }
                    });
                });
                this._super();
            },
            onunmatch: function() {
                this._super();
            }
        });
    });
})(jQuery);