<?php
class GalleryPage extends Page {

    private static $icon = 'Boilerplate/code/Modules/Gallery/images/folder-open-image.png';

    private static $db = array(
        'Columns' => 'Int',
        'Items' => 'Int',
        'NoMargin' => 'Boolean(0)'
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

        $fields->addFieldToTab('Root.Gallery', new HeaderField('Settings'));
        $fields->addFieldToTab('Root.Gallery', $columns = new DropdownField('Columns', _t('GalleryPage.ColumnsLabel', 'Columns'), array(
            'One Item (Full Width)',
            'Two Items',
            'Three Items',
            'Four Items',
            'Six Items',
            'Twelve Items'
        )));
        $columns->setRightTitle('How many items to display on each row');
        $fields->addFieldToTab('Root.Gallery', $items = new TextField('Items', _t('GalleryPage.ItemsLabel', 'Items')));
        $items->setRightTitle('How many items to display on each page');
        $fields->addFieldToTab('Root.Gallery', new CheckboxField('NoMargin', 'Remove margin from between gallery items'));

        /* -----------------------------------------
         * Gallery Images
        ------------------------------------------*/

        $fields->addFieldToTab('Root.Gallery', new HeaderField('Images'));
        $fields->addFieldToTab('Root.Gallery', $images = new UploadField('Images', _t('GalleryPage.ImagesLabel', 'Images'), $this->owner->Images()));
        $images->setFolderName('Uploads/gallery');

        return $fields;

    }

    /**
     * @return PaginatedList
     */
    public function PaginatedPages() {
        // Protect against "Division by 0" error
        if($this->Items == null || $this->Items == 0) $this->Items = 1;
        $pagination = new PaginatedList($this->Images(), Controller::curr()->request);
        $pagination->setPageLength($this->Items);
        return $pagination;
    }

}
class GalleryPage_Controller extends Page_Controller {

    /**
     * @return string
     */
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

    /**
     * @return int
     */
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

    /**
     * @return string
     */
    public function ThumbnailWidth(){
        switch($this->Columns){
            case 0:
                return '1140';
                break;
            default:
                return '722';
        }
    }

    /**
     * @return string
     */
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