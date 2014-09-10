<?php

define('BOILERPLATE_MODULE', 'boilerplate');

if (basename(dirname(__FILE__)) != BOILERPLATE_MODULE) {
    throw new Exception(BOILERPLATE_MODULE . ' module not installed in correct directory');
}

// TinyMCE plugin
HtmlEditorConfig::get('cms')->enablePlugins(array(
    'shortcodeGenerator' => Director::absoluteBaseURL().'boilerplate/javascript/shortcodeGenerator/editor_plugin.js'
));
HtmlEditorConfig::get('cms')->addButtonsToLine(1, 'shortcodeGenerator');