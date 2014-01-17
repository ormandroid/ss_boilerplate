<?php

class PageItem extends DataObject{

    static $db = array (
        'Title' => 'Varchar(255)',
        'Content' => 'HTMLText',
        'ColumnOne' => 'HTMLText',
        'ColumnTwo' => 'HTMLText',
        'ColumnThree' => 'HTMLText',
        'ColumnFour' => 'HTMLText',
        'AlertContent' => 'HTMLText',
        'AlertClass' => 'Varchar',
        'SortOrder' => 'Int'
    );

    static $has_one = array (
        'Page' => 'Page'
    );

    private static $default_sort = 'SortOrder';

    function getCMSFields() {

        $fields = FieldList::create(TabSet::create('Root'));

        $fields->addFieldToTab('Root.Main',
            new TabSet(
                $name = "WidgetTabs",
                /* ========================================
                * Widget Title
                =========================================*/
                new Tab(
                    $title = 'Widget',
                    new HeaderField('Title'),
                    new TextField('Title', 'Widget title'),
                    new LiteralField('WidgetTitleDescription', '<p>Name your widget to be easily recognisable in the widget list e.g "Pricing columns"</p>'),
                    new HtmlEditorField('Content', 'Content')
                ),
                /* ========================================
                * Alerts
                =========================================*/
                new Tab(
                    $title = 'Alerts',
                    new HeaderField('Alert'),
                    new LiteralField('ColumnDescription', '<p>Alert Description</p>'),
                    new DropdownField('AlertClass','Alert Type',
                        array(
                            'alert-info' => 'Info',
                            'alert-success' => 'Success',
                            'alert-warning' => 'Warning',
                            'alert-danger' => 'Danger'
                        )
                    ),
                    new HtmlEditorField('AlertContent', 'Content')
                ),
                /* ========================================
                * Columns
                =========================================*/
                new Tab(
                    $title = 'Columns',
                    new HeaderField('Columns'),
                    new LiteralField('ColumnDescription', '<p>Column Description</p>'),
                    new HtmlEditorField('ColumnOne', 'Column One'),
                    new HtmlEditorField('ColumnTwo', 'Column Two'),
                    new HtmlEditorField('ColumnThree', 'Column Three'),
                    new HtmlEditorField('ColumnFour', 'Column Four')
                )
            )
        );

        return $fields;

    }

    public function ColumnClass() {
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