<?php

class SliderItem extends DataObject{

    static $db = array (
        'CustomLink' => 'Varchar(255)'
    );

    static $belongs_to = array(
        'Slider' => 'Slider'
    );

    static $has_one = array (
        'Slider' => 'Slider',
        'Image' => 'Image',
        'Link' => 'SiteTree'
    );

    public static $summary_fields = array(
  		'Thumbnail'=>'Thumbnail'
 	);

    public function getThumbnail() {
		if ($Image = $this->Image()->ID) {
			return $this->Image()->SetWidth(80);
		} else {
			return '(No Image)';
		}
	}

    function getCMSFields() {

        $fields = parent::getCMSFields();

        //TODO: Find a way to add an empty value into TreeDropdownField
        $fields->addFieldToTab('Root.Main', new TreeDropdownField('LinkID', 'Link to page', 'SiteTree'));
        $customLink = new TextField('CustomLink', 'Custom link (Will override "Link to page")');
        $customLink->setAttribute('placeholder', 'Http://');
        $fields->addFieldToTab('Root.Main', $customLink);

        $fields->addFieldToTab("Root.Main", new UploadField("Image"));
        $fields->addFieldToTab('Root.Main', new HiddenField('SliderID'));
        return $fields;

    }

}