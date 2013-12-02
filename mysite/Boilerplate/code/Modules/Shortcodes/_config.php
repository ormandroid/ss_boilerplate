<?php

/*===================================================================*\
	TinyMCE
\*===================================================================*/

$formats = array(
    array(
        'title' => 'Alert - Success',
        'block' => 'div',
        'classes' => 'alert alert-success',
        'wrapper' => true,
        'merge_siblings' => false
    ),
    array(
        'title' => 'Alert - Info',
        'block' => 'div',
        'classes' => 'alert alert-info',
        'wrapper' => true,
        'merge_siblings' => false
    ),
    array(
        'title' => 'Alert - Warning',
        'block' => 'div',
        'classes' => 'alert alert-warning',
        'wrapper' => true,
        'merge_siblings' => false
    ),
    array(
        'title' => 'Alert - Danger',
        'block' => 'div',
        'classes' => 'alert alert-danger',
        'wrapper' => true,
        'merge_siblings' => false
    ),
);
HtmlEditorConfig::get('cms')->setOption('style_formats', $formats);