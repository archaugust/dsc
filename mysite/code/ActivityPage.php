<?php
class ActivityPage extends Page {
	
	private static $db = array (
			'Date' => 'Date'
	);
	
	private static $has_one = array (
			'Photo' => 'Image'
	);
	
	private static $has_many = array (
			'AdditionalPhotos' => 'ActivityPagePhoto'
	);
	
	private static $can_be_root = false;
	
	private static $allowed_children = array ();
	
	public function getCMSFields(){
		$fields = parent::getCMSFields();
		$fields->addFieldToTab('Root.Main', DateField::create('Date','Date of Article')
				->setConfig('showcalendar', true), 'Content');
		$fields->addFieldToTab('Root.Main', $uploader = UploadField::create('Photo'), 'Content');
		$fields->addFieldToTab('Root.AdditionalPhotos',  GridField::create(
				'AdditionalPhotos',
				'Additional Photos',
				$this->AdditionalPhotos(),
				GridFieldConfig_RecordEditor::create()
		));

		$uploader->getValidator()->setAllowedExtensions(array('png','gif','jpeg','jpg'));
		
		return $fields;
	}
}

class ActivityPage_Controller extends Page_Controller {
	public function init() {
		parent::init();
		
		Requirements::css("{$this->ThemeDir()}/css/activity.css");
	}
}
