(function() {
    tinymce.create('tinymce.plugins.sc_shortcodes', {

		init : function(ed, url) {
			ed.addCommand('popup_button', function(ui, v) {
				ed.windowManager.open({
					file : url + '/../code/Popup.php?shortcode='+v,
					width : 450,
					height : 400,
					inline : 1
				}, {
					plugin_url : url
				});
			});

		},
        createControl: function(n, cm) {
            switch (n) {
                case 'sc_shortcodes':
                    var mlb = cm.createListBox('sc_shortcodes', {
                        title : 'Shortcodes',
						cmd: 'popup_button'
                    });
                    mlb.add('Button', 'button');
                return mlb;
            }
            return null;
        }
    });
    tinymce.PluginManager.add('sc_shortcodes', tinymce.plugins.sc_shortcodes);
})();