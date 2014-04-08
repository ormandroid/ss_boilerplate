<?php
class GalleryPage extends Page {

    private static $icon = 'Boilerplate/code/Modules/Gallery/images/folder-open-image.png';

    private static $db = array(
        'Columns' => 'Int',
        'Items' => 'Int'
    );

    public static $many_many = array(
        'Images' => 'Image'
    );

    private static $defaults = array(
        'Columns' => 2,
        'Items' => 10
    );

    private static $description = 'Displays a lightbox gallery of images';

    public function getCMSFields() {

        $fields = parent::getCMSFields();

        /* =========================================
         * Gallery Images
         =========================================*/

        $fields->addFieldToTab('Root.GalleryImages', $images = new UploadField('Images', _t('GalleryPage.ImagesLabel', 'Images'), $this->owner->Images()));
        $images->setFolderName('Uploads/gallery');
        $toggleFields = ToggleCompositeField::create(
            'GalleryImages',
            _t('GalleryPage.GalleryImagesLabel', 'Settings'),
            array(
                new DropdownField('Columns', _t('GalleryPage.ColumnsLabel', 'How many items to display on each row'), array(
                    'One Item (Full Width)',
                    'Two Items',
                    'Three Items',
                    'Four Items',
                    'Six Items',
                    'Twelve Items'
                )),
                new TextField('Items', _t('GalleryPage.ItemsLabel', 'How many items to display on each page'))
            )
        )->setHeadingLevel(4)->setStartClosed(true);
        $fields->addFieldToTab('Root.GalleryImages', $toggleFields);

        return $fields;

    }

    /*
     * Technically this should be called PaginatedImages, but I want to use the same pagination include template.
     * */
    public function PaginatedPages() {
        // Protect against "Division by 0" error
        if($this->Items == null || $this->Items == 0) $this->Items = 1;
        $pagination = new PaginatedList($this->Images(), Controller::curr()->request);
        $pagination->setPageLength($this->Items);
        return $pagination;
    }

}
class GalleryPage_Controller extends Page_Controller {

    public function ColumnClass(){
        switch($this->Columns){
            case 1:
                return 'col-xs-12 col-sm-6';
                break;
            case 2:
                return 'col-xs-12 col-sm-4';
                break;
            case 3:
                return 'col-xs-12 col-sm-3';
                break;
            case 4:
                return 'col-xs-12 col-sm-2';
                break;
            case 5:
                return 'col-xs-12 col-sm-1';
                break;
            default:
                return 'col-xs-12 col-sm-12';
        }
    }

    public function ColumnMultiple(){
        switch($this->Columns){
            case 1:
                return 2;
                break;
            case 2:
                return 3;
                break;
            case 3:
                return 4;
                break;
            case 4:
                return 6;
                break;
            case 5:
                return 12;
                break;
            default:
                return 1;
        }
    }

    public function ThumbnailWidth(){
        switch($this->Columns){
            case 0:
                return '1140';
                break;
            default:
                return '722';
        }
    }

    public function ThumbnailHeight(){
        switch($this->Columns){
            case 0:
                return '555';
                break;
            default:
                return '722';
        }
    }

}