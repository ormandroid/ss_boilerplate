<?php
class GalleryPage extends Page {

    private static $icon = 'Boilerplate/code/Modules/Gallery/images/folder-open-image.png';

    private static $db = array(
        'Columns' => 'Int'
    );

    public static $many_many = array(
        'Images' => 'Image'
    );

    private static $defaults = array(
        'Columns' => 2
    );

    private static $description = 'Displays a gallery of images';

    public function getCMSFields() {

        $fields = parent::getCMSFields();

        /* =========================================
         * Gallery Images
         =========================================*/

        $toggleFields = ToggleCompositeField::create(
            'GalleryImages',
            'Gallery Images',
            array(
                new DropdownField('Columns','How many items to display on each row', array(
                    'One Item (Full Width)',
                    'Two Items',
                    'Three Items',
                    'Four Items',
                    'Six Items',
                    'Twelve Items'
                )),
                new UploadField('Images', 'Images',$this->owner->Images())
            )
        )->setHeadingLevel(4)->setStartClosed(true);
        $fields->addFieldToTab('Root.Main', $toggleFields, 'Content');


        return $fields;

    }

}
class GalleryPage_Controller extends Page_Controller {

    public function ColumnClass(){
        switch($this->Columns){
            case 1:
                return 'col-xs-6 col-sm-6';
                break;
            case 2:
                return 'col-xs-6 col-sm-4';
                break;
            case 3:
                return 'col-xs-6 col-sm-3';
                break;
            case 4:
                return 'col-xs-6 col-sm-2';
                break;
            case 5:
                return 'col-xs-6 col-sm-1';
                break;
            default:
                return 'col-xs-6 col-sm-12';
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