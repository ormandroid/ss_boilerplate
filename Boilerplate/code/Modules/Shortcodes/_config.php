<?php

$formats = array(
    array(
        'title' => 'Heading - Page Heading',
        'selector' => 'h1,h2,h3,h4,h5,h6',
        'classes' => 'page-heading',
        'wrapper' => false,
    ),
    array(
        'title' => 'Button - Default',
        'selector' => 'a',
        'classes' => 'btn btn-default',
        'wrapper' => false,
    ),
    array(
        'title' => 'Button - Primary',
        'selector' => 'a',
        'classes' => 'btn btn-primary',
        'wrapper' => false,
    ),
    array(
        'title' => 'Button - Secondary',
        'selector' => 'a',
        'classes' => 'btn btn-secondary',
        'wrapper' => false,
    ),
    array(
        'title' => 'Button - Inverse',
        'selector' => 'a',
        'classes' => 'btn btn-inverse',
        'wrapper' => false,
    ),
    array(
        'title' => 'Button - Success',
        'selector' => 'a',
        'classes' => 'btn btn-success',
        'wrapper' => false,
    ),
    array(
        'title' => 'Button - Info',
        'selector' => 'a',
        'classes' => 'btn btn-info',
        'wrapper' => false,
    ),
    array(
        'title' => 'Button - Warning',
        'selector' => 'a',
        'classes' => 'btn btn-warning',
        'wrapper' => false,
    ),
    array(
        'title' => 'Button - Danger',
        'selector' => 'a',
        'classes' => 'btn btn-danger',
        'wrapper' => false,
    ),
    array(
        'title' => 'Button - Large',
        'selector' => 'a',
        'classes' => 'btn-lg',
        'wrapper' => false,
    ),
    array(
        'title' => 'Button - Small',
        'selector' => 'a',
        'classes' => 'btn-sm',
        'wrapper' => false,
    ),
    array(
        'title' => 'Button - Full Width',
        'selector' => 'a',
        'classes' => 'btn-block',
        'wrapper' => false,
    ),
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
    array(
        'title' => 'List - Checklist',
        'selector' => 'ul',
        'classes' => 'checklist',
        'wrapper' => false
    ),
    array(
        'title' => 'List - Deletelist',
        'selector' => 'ul',
        'classes' => 'deletelist',
        'wrapper' => false
    )
);

HtmlEditorConfig::get('cms')->setOption('style_formats', $formats);