<?php
class Page extends SiteTree {

	private static $db = array(
        'PageSlider' => 'int'
    );

	private static $has_one = array();

    function getCMSFields() {

        $fields = parent::getCMSFields();

        $fields->addFieldToTab('Root.Settings', new HeaderField('Slider'));
        $sliders = $this->SiteConfig->Sliders()->map();
        $pageSliders = new DropDownField('PageSlider', 'Slider', $sliders);
        $pageSliders->setEmptyString('(No Slider)');
        $fields->addFieldToTab('Root.Settings', $pageSliders);

        return $fields;

    }

}
class Page_Controller extends ContentController {

	/**
	 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * <code>
	 * array (
	 *     'action', // anyone can access this action
	 *     'action' => true, // same as above
	 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
	 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
	 * );
	 * </code>
	 *
	 * @var array
	 */
	private static $allowed_actions = array (
	);

	public function init() {
		parent::init();

		// Note: you should use SS template require tags inside your templates
		// instead of putting Requirements calls here.  However these are
		// included so that our older themes still work
		Requirements::themedCSS('reset');
		Requirements::themedCSS('layout');
		Requirements::themedCSS('typography');
		Requirements::themedCSS('form');

     //   var_dump(SiteConfig::current_site_config()); die();
	}


    //TODO: Loop through sliders instead of sliderItems. Y U NO WORK PROPERLY?
    public function GetSliderItems(){
        if($this->PageSlider){
            $sliderItems = SliderItem::get()->filter('SliderID', $this->PageSlider);
            return $sliderItems;
        }else{
            return;
        }
    }

}