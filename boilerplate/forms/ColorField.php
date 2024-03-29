<?php

/**
 * Class ColorField
 */
class ColorField extends TextField {

    /**
     * @param string $name
     * @param null $title
     * @param string $value
     * @param null $form
     */
    public function __construct($name, $title = null, $value = '', $form = null){
		parent::__construct($name, $title, $value, 7, $form);
        $this->addExtraClass('text');
	}

    /**
     * @param array $properties
     * @return string
     */
    function Field($properties = array()) {
		$this->addExtraClass('color-picker');
		$style = 'background-image: none;background-color:' . ($this->value ? $this->value : '#ffffff'). '; color: ' . ($this->getTextColor()) . ';';
		$attributes = array(
			'type' => 'text',
			'class' => 'text text' . ($this->extraClass() ? $this->extraClass() : ''),
			'id' => $this->id(),
			'name' => $this->getName(),
			'value' => $this->value,
			'tabindex' => $this->getAttribute('tabindex'),
			'maxlength' => ($this->maxLength) ? $this->maxLength : null,
			'size' => ($this->maxLength) ? min( $this->maxLength, 30 ) : null,
			'style' => $style
		);

		if($this->disabled) $attributes['disabled'] = 'disabled';

		$out = '<div class="iris-container">';
			$out .= '<label class="iris-color-label" for="'.$this->id().'"><span class="ss-ui-button">Select a color</span></label>';
			$out .= $this->createTag('input', $attributes);
		$out .= '</div>';

		return $out;
	}

    /**
     * @param $validator
     * @return bool
     */
    function validate($validator){
		return true;
	}

    /**
     * @return string
     */
    protected function getTextColor(){
		if($this->value) {
			$c = intval(str_replace("#", "", $this->value), 16);
			$r = $c >> 16;
			$g = ($c >> 8) & 0xff;
			$b = $c & 0xff;
			$mid = ($r + $g + $b) / 3;
			return ($mid > 127) ? '#000000' : '#ffffff';
		} else {
			return '#000000';
		}
	}
    
}