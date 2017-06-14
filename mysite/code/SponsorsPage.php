<?php
class SponsorsPage extends Page {
	
	private static $has_many = array (
			'SkiAreas' => 'SkiArea'
	);
	
	private static $allowed_children = array ();
	
	public function getCMSFields(){
		$fields = parent::getCMSFields();
		$fields->addFieldToTab('Root.SkiAreas',  GridField::create(
				'SkiAreas',
				'Ski Areas',
				$this->SkiAreas(),
				GridFieldConfig_RecordEditor::create()
			));
		
		return $fields;
	}
}

class SponsorsPage_Controller extends Page_Controller {
	public function init() {
		parent::init();
		
		Requirements::css("{$this->Themedir()}/css/sponsors.css");
	}
}