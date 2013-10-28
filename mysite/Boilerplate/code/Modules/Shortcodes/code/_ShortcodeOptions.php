<?php
$icons_array = array(
	'',
);

$icon_options = array();
foreach($icons_array as $val){
	$icon_options[str_replace('.icon-', '', $val)] = str_replace('.icon-', '', $val);
}

/*=============================================================================================*\
	Button
\*=============================================================================================*/

$shortcode_options['button'] = array(
	'params' => array(
		'content' => array(
			'std' => '',
			'type' => 'text',
			'label' => 'Button Text',
			'desc' => 'Add the button\'s text',
		),
		'url'=>array(
			'type'=>'text',
			'std'=>'',
			'label'=>'url',
			'desc'=>'The link etc',
		),
		'target' => array(
			'type' => 'select',
			'label' => 'Target',
			'desc' => 'Select the target',
			'options' => array(
				'_self' => '_self',
				'_blank' => '_blank',
				'_parent' => '_parent',
				'_top' => '_top'
			)
		),
		'type' => array(
			'type' => 'select',
			'label' => 'Type',
			'desc' => 'Select the type',
			'options' => array(
				'btn-default' => 'Default',
				'btn-primary' => 'Primary',
				'btn-info' => 'Info',
				'btn-success' => 'Success',
				'btn-warning' => 'Warning',
				'btn-danger' => 'Danger',
				'btn-inverse' => 'Inverse',
				'btn-link' => 'Link'
			)
		),
		'size' => array(
			'type' => 'select',
			'label' => 'Size',
			'desc' => 'Select the size',
			'options' => array(
				'btn' => 'Default',
				'btn btn-lg' => 'Large',
				'btn btn-sm' => 'Small',
				'btn btn-xs' => 'Extra Small'
			)
		),
		'block' => array(
			'type' => 'select',
			'label' => 'Block Element',
			'desc' => 'Make the button full width',
			'options' => array(
				'btn-inline' => 'No',
				'btn-block' => 'Yes',
			)
		),
	),
    'shortcode' => '[button,url={{url}},target={{target}},type={{type}},size={{size}},block={{block}}]{{content}}[/button]',
	'title' => 'Insert Button'
);