<?php

class PortfolioImage extends DataObject{

    static $db = array ();

    static $has_one = array (
        'Page' => 'Page',
        'Image' => 'Image'
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

        $fields = FieldList::create(TabSet::create('Root'));

        $fields->addFieldToTab('Root.Main', new UploadField('Image'));

        return $fields;

    }

}