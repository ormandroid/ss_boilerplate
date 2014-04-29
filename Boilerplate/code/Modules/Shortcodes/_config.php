<?php

$formats = array(
    array(
        'title' => 'Heading - Page Heading',
        'selector' => 'h1,h2,h3,h4,h5,h6',
        'classes' => 'page-heading',
        'wrapper' => false,
    ),
    array(
        'title' => 'Text - Light',
        'block' => 'div',
        'classes' => 'content-light',
        'wrapper' => true,
        'merge_siblings' => false
    ),
    array(
        'title' => 'Well',
        'block' => 'div',
        'classes' => 'well',
        'wrapper' => true,
        'merge_siblings' => false
    ),
    array(
        'title' => 'Well - Default',
        'block' => 'div',
        'classes' => 'well well-default',
        'wrapper' => true,
        'merge_siblings' => false
    ),
    array(
        'title' => 'Well - Primary',
        'block' => 'div',
        'classes' => 'well well-secondary',
        'wrapper' => true,
        'merge_siblings' => false
    ),
    array(
        'title' => 'Well - Secondary',
        'block' => 'div',
        'classes' => 'well well-secondary',
        'wrapper' => true,
        'merge_siblings' => false
    ),
    array(
        'title' => 'Well - Inverse',
        'block' => 'div',
        'classes' => 'well well-inverse',
        'wrapper' => true,
        'merge_siblings' => false
    ),
    array(
        'title' => 'Well - Info',
        'block' => 'div',
        'classes' => 'well well-info',
        'wrapper' => true,
        'merge_siblings' => false
    ),
    array(
        'title' => 'Well - Warning',
        'block' => 'div',
        'classes' => 'well well-warning',
        'wrapper' => true,
        'merge_siblings' => false
    ),
    array(
        'title' => 'Well - Danger',
        'block' => 'div',
        'classes' => 'well well-danger',
        'wrapper' => true,
        'merge_siblings' => false
    ),
    array(
        'title' => 'Well - Small',
        'block' => 'div',
        'classes' => 'well well-sm',
        'wrapper' => true,
        'merge_siblings' => false
    ),
    array(
        'title' => 'Button - Default',
        'selector' => 'a, button',
        'classes' => 'btn btn-default',
        'wrapper' => false,
    ),
    array(
        'title' => 'Button - Primary',
        'selector' => 'a, button',
        'classes' => 'btn btn-primary',
        'wrapper' => false,
    ),
    array(
        'title' => 'Button - Secondary',
        'selector' => 'a, button',
        'classes' => 'btn btn-secondary',
        'wrapper' => false,
    ),
    array(
        'title' => 'Button - Inverse',
        'selector' => 'a, button',
        'classes' => 'btn btn-inverse',
        'wrapper' => false,
    ),
    array(
        'title' => 'Button - Success',
        'selector' => 'a, button',
        'classes' => 'btn btn-success',
        'wrapper' => false,
    ),
    array(
        'title' => 'Button - Info',
        'selector' => 'a, button',
        'classes' => 'btn btn-info',
        'wrapper' => false,
    ),
    array(
        'title' => 'Button - Warning',
        'selector' => 'a, button',
        'classes' => 'btn btn-warning',
        'wrapper' => false,
    ),
    array(
        'title' => 'Button - Danger',
        'selector' => 'a, button',
        'classes' => 'btn btn-danger',
        'wrapper' => false,
    ),
    array(
        'title' => 'Button - Large',
        'selector' => 'a, button',
        'classes' => 'btn-lg',
        'wrapper' => false,
    ),
    array(
        'title' => 'Button - Small',
        'selector' => 'a, button',
        'classes' => 'btn-sm',
        'wrapper' => false,
    ),
    array(
        'title' => 'Button - Full Width',
        'selector' => 'a, button',
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
    ),
    array(
        'title' => 'Table',
        'selector' => 'table',
        'classes' => 'table',
        'wrapper' => false
    ),
    array(
        'title' => 'Table - Striped',
        'selector' => 'table',
        'classes' => 'table table-striped',
        'wrapper' => false
    ),
    array(
        'title' => 'Table - Bordered',
        'selector' => 'table',
        'classes' => 'table table-bordered',
        'wrapper' => false
    ),
    array(
        'title' => 'Table - Condensed',
        'selector' => 'table',
        'classes' => 'table table-condensed',
        'wrapper' => false
    ),
    array(
        'title' => 'Table - Responsive',
        'block' => 'div',
        'classes' => 'table-responsive',
        'wrapper' => true,
        'merge_siblings' => false
    )
);

HtmlEditorConfig::get('cms')->setOption('style_formats', $formats);