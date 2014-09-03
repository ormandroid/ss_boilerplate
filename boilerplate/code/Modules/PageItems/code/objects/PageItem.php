<?php

class PageItem extends DataObject{

    static $db = array (
        'Title' => 'Varchar(255)',
        'Content' => 'HTMLText',
        'ColumnOne' => 'HTMLText',
        'ColumnTwo' => 'HTMLText',
        'ColumnThree' => 'HTMLText',
        'ColumnFour' => 'HTMLText',
        'ColumnType' => 'Int',
        'BackgroundType' => 'Varchar',
        'BackgroundColor' => 'Varchar',
        'Padding' => 'Boolean(0)',
        'SortOrder' => 'Int'
    );

    static $has_one = array (
        'Page' => 'Page',
        'BackgroundImage' => 'Image'
    );

    private static $default_sort = 'SortOrder';

    function getCMSFields() {

        $fields = FieldList::create(TabSet::create('Root'));

        /* -----------------------------------------
         * Color Picker
        ------------------------------------------*/

        Requirements::css('boilerplate/css/colorpicker.css');
        Requirements::javascript('boilerplate/javascript/colorpicker.min.js');
        Requirements::javascript('boilerplate/javascript/colorpicker.init.js');

        $fields->addFieldToTab('Root.Main',
            new TabSet(
                $name = "WidgetTabs",
                /* -----------------------------------------
                 * Item Title
                ------------------------------------------*/
                new Tab(
                    $title = 'Page Item',
                    new HeaderField(_t('PageItem.PageItemTabText', 'Title')),
                    $titleField = new TextField('Title', _t('PageItem.TitleLabel', 'Page Item Title')),
                    new HtmlEditorField('Content', _t('PageItem.ContentLabel', 'Content'))
                ),
                /* -----------------------------------------
                 * Columns
                ------------------------------------------*/
                new Tab(
                    $title = 'Columns',
                    new HeaderField(_t('PageItem.ColumnsTabText', 'Columns')),
                    $columnType = new DropdownField('ColumnType', 'Column Type', array(
                        0 => 'Default',
                        1 => '1/3, 2/3',
                        2 => '2/3, 1/3'
                    )),
                    $columnOne = new HtmlEditorField('ColumnOne', _t('PageItem.ColumnOneLabel', 'Column One')),
                    $columnTwo = new HtmlEditorField('ColumnTwo', _t('PageItem.ColumnTwoLabel', 'Column Two')),
                    $columnThree = new HtmlEditorField('ColumnThree', _t('PageItem.ColumnThreeLabel', 'Column Three')),
                    $columnFour = new HtmlEditorField('ColumnFour', _t('PageItem.ColumnFourLabel', 'Column Four'))
                ),
                /* -----------------------------------------
                 * Settings
                ------------------------------------------*/
                new Tab(
                    $title = 'Settings',
                    new HeaderField(_t('PageItem.SettingsTabText', 'Settings (Optional)')),
                    new CheckboxField('Padding', _t('PageItem.PaddingLabel', 'Remove Padding')),
                    new UploadField('BackgroundImage', _t('PageItem.BackgroundImageLabel', 'Background Image')),
                    new DropdownField('BackgroundType', _t('PageItem.BackgroundTypeLabel', 'Background Type'), array(
                        '' => 'Default',
                        'fixed' => 'Fixed'
                    )),
                    new ColorField('BackgroundColor', _t('PageItem.BackgroundColorLabel', 'Background Color'))
                )
            )
        );

        $rowHeight = 20;

        $titleField->setRightTitle(_t('PageItem.WidgetTitleDescriptionText', 'Name your page item to be easily recognisable in the page item list e.g "Pricing columns"'));
        $columnOne->setRows($rowHeight);
        $columnTwo->setRows($rowHeight);
        $columnThree->setRows($rowHeight);
        $columnFour->setRows($rowHeight);

        return $fields;

    }

    /**
     * @return bool
     */
    public function getHasColumnType(){
        if($this->ColumnType > 0){
            return true;
        }else{
            return false;
        }
    }

    /**
     * @return string
     */
    public function getColumnTypeOne(){
        $xsClass = 'col-xs-12';
        switch($this->ColumnType){
            case 1:
                return $xsClass.' col-sm-4';
                break;
            case 2:
                return $xsClass.' col-sm-8';
                break;
            default:
                return $xsClass;
        }
    }

    /**
     * @return string
     */
    public function getColumnTypeTwo(){
        $xsClass = 'col-xs-12';
        switch($this->ColumnType){
            case 1:
                return $xsClass.' col-sm-8';
                break;
            case 2:
                return $xsClass.' col-sm-4';
                break;
            default:
                return $xsClass;
        }
    }

    /**
     * @return string
     */
    public function getColumnClass() {
        $count = 1;
        $xsClass = 'col-xs-12';
        if($this->ColumnTwo){ $count++; }
        if($this->ColumnThree){ $count++; }
        if($this->ColumnFour){ $count++; }
        switch($count){
            case '2':
                $class = $xsClass.' col-sm-6';
                break;
            case '3':
                $class = $xsClass.' col-sm-4';
                break;
            case '4':
                $class = $xsClass.' col-sm-3';
                break;
            default:
                $class = $xsClass.' col-sm-12';
        }
        return $class;
    }

}