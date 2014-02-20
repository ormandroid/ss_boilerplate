<?php

class PageItem extends DataObject{

    static $db = array (
        'Title' => 'Varchar(255)',
        'Content' => 'HTMLText',
        'ColumnOne' => 'HTMLText',
        'ColumnTwo' => 'HTMLText',
        'ColumnThree' => 'HTMLText',
        'ColumnFour' => 'HTMLText',
        'BackgroundType' => 'Varchar',
        'BackgroundColor' => 'Varchar',
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

        Requirements::javascript('Boilerplate/javascript/colorpicker.min.js');
        Requirements::css('Boilerplate/css/colorpicker.css');

        $fields->addFieldToTab('Root.Main', new LiteralField('js',
            '<script type="text/javascript">
                (function($) {
                    $(document).ready(function() {
                        $(\'.color-picker\').on(\'click\', function(){
                            $(this).iris({
                                hide: false,
                                change: function(event, ui) {
                                    var $c, $r, $g, $b, $mid;
                                    $(this).css(\'backgroundColor\', ui.color.toString());
                                }
                            });
                        });
                    });
                })(jQuery);
            </script>'
        ));

        $fields->addFieldToTab('Root.Main',
            new TabSet(
                $name = "WidgetTabs",
                /* ========================================
                * Item Title
                =========================================*/
                new Tab(
                    $title = 'Page Item',
                    new HeaderField('Title'),
                    new TextField('Title', 'Page Item Title'),
                    new LiteralField('WidgetTitleDescription', '<p>Name your page item to be easily recognisable in the page item list e.g "Pricing columns"</p>'),
                    new HtmlEditorField('Content', 'Content')
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
                ),
                /* ========================================
                * Settings
                =========================================*/
                new Tab(
                    $title = 'Settings',
                    new HeaderField('Settings (Optional)'),
                    new UploadField('BackgroundImage', 'Background Image'),
                    new DropdownField('BackgroundType', 'Background Type', array(
                        '' => 'Default',
                        'fixed' => 'Fixed'
                    )),
                    new ColorField('BackgroundColor', 'Background Color')
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