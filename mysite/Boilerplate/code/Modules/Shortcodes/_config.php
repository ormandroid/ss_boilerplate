<?php

/*===================================================================*\
	Definitions
\*===================================================================*/

//if(!defined("SC_PLUGINS_PATH")){define("SC_PLUGINS_PATH", "../../../mysite/Boilerplate/code/Modules/Shortcodes/plugins/");}

/*===================================================================*\
	Register Shortcodes
\*===================================================================*/

//ShortcodeParser::get('default')->register('button', function($args, $text, $parser, $shortcode) {
//    return sprintf(
//        '<a href="%s" target="%s" class="%s %s %s">%s</a>',
//        $args['url'],
//        $args['target'],
//        $args['size'],
//        $args['type'],
//        $args['block'],
//        $text
//    );
//});

/*===================================================================*\
	TinyMCE
\*===================================================================*/

//HtmlEditorConfig::get("cms")->setOptions(array());
//HtmlEditorConfig::get('cms')->enablePlugins(array('sc_shortcodes' => SC_PLUGINS_PATH . 'sc_shortcodes.js'));
//HtmlEditorConfig::get("cms")->addButtonsToLine(1, "sc_shortcodes");
//HtmlEditorConfig::set_active('cms');
//$fields = new FieldList(
//    new HtmlEditorField('Content', 'Content')
//);