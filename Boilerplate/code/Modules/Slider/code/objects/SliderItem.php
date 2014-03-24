<?php

class SliderItem extends DataObject{

    static $db = array (
        'CustomLink' => 'Varchar(255)',
        'Heading' => 'Text',
        'Caption' => 'Text',
        'SortOrder' => 'Int'
    );

    static $has_one = array (
        'Page' => 'Page',
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

    private static $default_sort = 'SortOrder';

    function getCMSFields() {

        $fields = FieldList::create(TabSet::create('Root'));

        $fields->addFieldToTab('Root.Main', new TreeDropdownField('LinkID', _t('SliderItem.LinkIDLabel', 'Link to page'), 'SiteTree'));
        $customLink = new TextField('CustomLink', _t('SliderItem.CustomLinkLabel', 'Custom link (Will override "Link to page")'));
        $customLink->setAttribute('placeholder', _t('SliderItem.CustomLinkPlaceholder', 'Http://'));
        $fields->addFieldToTab('Root.Main', $customLink);

        $fields->addFieldToTab('Root.Main', new UploadField('Image'));
        $fields->addFieldToTab('Root.Main', new TextField('Heading'));
        $fields->addFieldToTab('Root.Main', new TextareaField('Caption'));

        return $fields;

    }

}