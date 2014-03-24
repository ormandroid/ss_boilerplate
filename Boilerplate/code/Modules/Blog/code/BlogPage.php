<?php
class BlogPage extends Page {

    private static $icon = 'Boilerplate/code/Modules/Blog/images/blog.png';

    private static $db = array(
        'Date' => 'Date',
        'Author' => 'Text'
    );

    private static $has_one = array(
        'BlogImage' => 'Image'
    );

    private static $many_many = array(
        'BlogTags' => 'BlogTag'
    );

    private static $defaults = array(
        'ShowInMenus' => 0
    );

    private static $description = 'Blog content page';

    public function getCMSFields() {

        $fields = parent::getCMSFields();

        $fields->removeByName('Slider');
        $fields->removeByName('Widgets');

        $fields->addFieldToTab('Root.Main', new UploadField('BlogImage', _t('BlogPage.BlogImageLabel', 'Featured blog image')), 'Content');
        $fields->addFieldToTab('Root.Main', $dateField = new DateField('Date', _t('BlogPage.DateLabel', 'Article Date')), 'Content');
        $dateField->setConfig('showcalendar', true);
        $fields->addFieldToTab('Root.Main', $dateField, 'Content');
        $fields->addFieldToTab('Root.Main', new TextField('Author', _t('BlogPage.AuthorLabel', 'Author')), 'Content');

        /* =========================================
         * Tags
         =========================================*/

        $config = GridFieldConfig_RecordEditor::create();
        $config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
            'Title' => 'Title'
        ));
        $gridField = new GridField(
            'BlogTags',
            'Tags',
            $this->owner->BlogTags(),
            $config
        );
        $fields->addFieldToTab('Root.Tags', $gridField);

        return $fields;

    }

}

class BlogPage_Controller extends Page_Controller {}