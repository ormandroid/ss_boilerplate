<?php
class BlogPage extends Page {

    private static $icon = 'boilerplate/code/Modules/Blog/images/blog.png';

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

    private static $allowed_children = 'none';

    private static $can_be_root = false;

    public function getCMSFields() {

        $fields = parent::getCMSFields();

        $fields->removeByName('Slider');
        $fields->removeByName('PageBuilder');

        $fields->addFieldToTab('Root.Main', $blogImage = new UploadField('BlogImage', _t('BlogPage.BlogImageLabel', 'Featured blog image')), 'Content');
        $blogImage->setFolderName('Uploads/blog');
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

    public function NavigationLink($direction){
        switch($direction){
            case 'next':
                $sort = 'Sort:GreaterThan';
                break;
            case 'prev':
                $sort = 'Sort:LessThan';
                break;
            default:
                return false;
        }
        $page = BlogPage::get()->filter(array(
            'ParentID' => $this->ParentID,
            $sort => $this->Sort
        ))->sort('Sort ASC')->first();

        return $page;
    }

    public function BlogNavigation($class = 'blog-navigation'){
        if($next = $this->NavigationLink('next')){
            $out = '<a href="'.$next->Link().'"><h3 class="heading">'.$next->Title.'</h3><div class="image"><img src="'.$next->BlogImage()->CroppedImage(1140, 300)->URL.'"/></div></a>';
        }else{
            if($prev = $this->NavigationLink('prev')){
                $out = '<a href="'.$prev->Link().'"><h3 class="heading">'.$prev->Title.'</h3><div class="image"><img src="'.$prev->BlogImage()->CroppedImage(1140, 300)->URL.'"/></div></a>';
            }else{
                return false;
            }
        }
        return '<section class="'.$class.'"><div class="container">'.$out.'<i class="fa fa-chevron-down icon"></i></div></section>';
    }

}

class BlogPage_Controller extends Page_Controller {}