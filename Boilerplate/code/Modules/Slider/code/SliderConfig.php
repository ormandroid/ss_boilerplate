<?php

class SliderConfig extends DataExtension {

    private static $db = array(
        'Height' => 'Varchar(255)',
        'FullWidth' => 'Boolean(0)',
        'SliderExtend' => 'Boolean(0)'
    );

    private static $has_many = array(
        'SliderItems' => 'SliderItem'
    );

    public function updateCMSFields(FieldList $fields) {

        $config = GridFieldConfig_RelationEditor::create(10);
        $config->addComponent(new GridFieldSortableRows('SortOrder'));
        $config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
            'Thumbnail' => 'Thumbnail'
        ));
        $gridField = new GridField(
            'SliderItems',
            'Slider Items',
            $this->owner->SliderItems(),
            $config
        );
        $fields->addFieldToTab('Root.Slider', $gridField);

        /* -----------------------------------------
         * Advanced
        ------------------------------------------*/

        $toggleFields = ToggleCompositeField::create(
			'Advanced',
			'Advanced',
			array(
                new CheckboxField('FullWidth', 'Full width'),
                new CheckboxField('SliderExtend', 'Extend the slider'),
                new TextField('Height', 'Height of slider')
			)
		)->setHeadingLevel(4)->setStartClosed(true);
		$fields->addFieldToTab('Root.Slider', $toggleFields);

    }

    public function getSliderClass() {
        if($this->owner->SliderExtend){
            ($this->owner->SliderItems()->First() ? $out = 'has-slider slider-extend' : $out = 'no-slider');
        }else{
            ($this->owner->SliderItems()->First() ? $out = 'has-slider' : $out = 'no-slider');
        }
        return $out;
    }

    public function getSliderLuminance() {

        if (!$this->owner->SliderItems()->First() || !$this->owner->SliderExtend) {
            return false;
        }

        $imageID = $this->owner->SliderItems()->First()->ImageID;
        $image = File::get()->byID($imageID);
        $image = Director::baseFolder()."/" . $image->Filename;

        return self::get_avg_luminance($image);
    }

    public function get_avg_luminance($filename, $num_samples=10) {

        if (!file_exists($filename)) return false;
        $size = getimagesize($filename);
        $image_type = $size[2];

        switch ($image_type) {
            case 1:
                $img = imagecreatefromgif($filename);
                break;
            case 2:
            default:
                $img = imagecreatefromjpeg($filename);
                break;
            case 3:
                $img = imagecreatefrompng($filename);
                break;
        }

        $width = $size[0];
        $height = $size[1];
        $x_step = intval($width/$num_samples);
        $y_step = intval($height/$num_samples);
        $total_lum = 0;
        $sample_no = 1;

        for ($x=0; $x<$width; $x+=$x_step) {
            for ($y=0; $y<$height; $y+=$y_step) {
                $rgb = imagecolorat($img, $x, $y);
                $r = ($rgb >> 16) & 0xFF;
                $g = ($rgb >> 8) & 0xFF;
                $b = $rgb & 0xFF;
                // choose a simple luminance formula from here
                $lum = ($r+$r+$b+$g+$g+$g)/6;
                $total_lum += $lum;
                $sample_no++;
            }
        }

        // work out the average
        $avg_lum  = $total_lum/$sample_no;

        if ($avg_lum > 170) {
            $out = 'slider-light';
        } else {
            $out = 'slider-dark';
        }

        return $out;
    }

}
