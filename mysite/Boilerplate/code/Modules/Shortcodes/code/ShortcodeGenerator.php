<?php

class ShortcodeGenerator {

	var	$conf;
	var	$params;
	var	$shortcode;
	var	$title;
	var	$popup;
	var	$out;

	function __construct( $popup )
	{
		if( file_exists( dirname(__FILE__) . '/_ShortcodeOptions.php' ) ){
			$this->conf = dirname(__FILE__) . '/_ShortcodeOptions.php';
			$this->popup = $popup;
			$this->CreateShortcodeForm();
		}
		else{
			return;
		}
	}

	public function CreateShortcodeForm(){

		require_once( $this->conf );

		if(isset($shortcode_options ) && is_array( $shortcode_options)){

			$this->params = $shortcode_options[$this->popup]['params'];
			$this->shortcode = $shortcode_options[$this->popup]['shortcode'];
			$this->title = $shortcode_options[$this->popup]['title'];

			$this->out .= '<fieldset>';
				$this->out .= '<legend>'.$this->title.'</legend>';
				$this->out .= '<table width="100%">';

					foreach( $this->params as $pkey => $param ){

						$pkey = 'hex_' . $pkey;

						switch($param['type']){

							case 'text':
								$this->out .= '<tr><td class="label">'.$param['label'].'</td>';
								$this->out .= '<td><input type="text" name="'.$pkey.'" id="'.$pkey.'" value="'.$param['std'].'" class="shortcode-input" /></td>';
								$this->out .= '<td class="description">'.$param['desc'].'</td></tr>';
							break;

							case 'textarea':
								$this->out .= '<tr><td class="label">'.$param['label'].'</td>';
								$this->out .= '<td><textarea id="'.$pkey.'" class="shortcode-input">'.$param['std'].'</textarea></td>';
								$this->out .= '<td class="description">'.$param['desc'].'</td></tr>';
							break;

							case 'select':
								$this->out .= '<tr><td class="label">'.$param['label'].'</td>';
								$this->out .= '<td><select name="' . $pkey . '" id="' . $pkey . '" class="shortcode-input">';
									foreach( $param['options'] as $value => $option )
									{
										$this->out .= '<option value="' . $value . '">' . $option . '</option>';
									}
								$this->out .= '</select></td>';
								$this->out .= '<td class="description">'.$param['desc'].'</td></tr>';
							break;

							case 'checkbox':
								$this->out .= '<tr><td class="label">'.$param['label'].'</td>';
								$this->out .= '<td><input type="checkbox" id="'.$pkey.'" class="shortcode-input" '.( $param['std'] ? 'checked' : '' ).'></td>';
								$this->out .= '<td class="description">'.$param['desc'].'</td></tr>';
							break;

						}

					}

				$this->out .= '</table>';
			$this->out .= '</fieldset>';

			$this->out .= '<div id="_shortcode" class="hide">'.$this->shortcode.'</div>';
			$this->out .= '<div id="_shortcode_hidden" class="hide"></div>';

		}
		return $this->out;
	}
}