<?php

class SliderItem extends DataObject{

    static $db = array (
        'Caption' => 'HTMLText',
        'SortOrder' => 'Int'
    );

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

    private static $default_sort = 'SortOrder';

    function getCMSFields() {

        $fields = FieldList::create(TabSet::create('Root'));

        $fields->addFieldToTab('Root.Main', new UploadField('Image'));
        $fields->addFieldToTab('Root.Main', $caption = new HtmlEditorField('Caption'));
        $caption->setRows(15);

        return $fields;

    }

}