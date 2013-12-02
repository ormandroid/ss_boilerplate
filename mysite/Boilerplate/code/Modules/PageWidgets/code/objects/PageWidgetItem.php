<?php

class PageWidgetItem extends DataObject{

    static $db = array (
        'Title' => 'Varchar(255)',
        'ColumnOne' => 'HTMLText',
        'ColumnTwo' => 'HTMLText',
        'ColumnThree' => 'HTMLText',
        'ColumnFour' => 'HTMLText'
    );

    static $has_one = array (
        'Page' => 'Page'
    );

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
                    new LiteralField('WidgetTitleDescription', '<p>Name your widget to be easily recognisable in the widget list e.g "Pricing columns"</p>')
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
        $count = 2;
        $xsClass = 'col-xs-12';
        if($this->ColumnThree){ $count++; }
        if($this->ColumnFour){ $count++; }
        switch($count){
            case '3':
                $class = $xsClass.' col-sm-4';
                break;
            case '4':
                $class = $xsClass.' col-sm-3';
                break;
            default:
                $class = $xsClass.' col-sm-6';
        }
        return $class;
    }

}