<?php
class AboutPage extends Page {
	
	private static $has_one = array(
			'Banner' => 'Image',
	);

	private static $has_many = array (
			'Instructors' => 'Instructor'
	);
	
	private static $allowed_children = array ();
	
	public function getCMSFields(){
		$fields = parent::getCMSFields();
		$fields->addFieldToTab('Root.Main', $uploader = UploadField::create('Banner', 'Banner Image'), 'Content');
		$fields->addFieldToTab('Root.Instructors',  GridField::create(
				'Instructors',
				'Instructors',
				$this->Instructors(),
				GridFieldConfig_RecordEditor::create()
			));
		
		$uploader->getValidator()->setAllowedExtensions(array('png','gif','jpeg','jpg'));
		
		return $fields;
	}
}

class AboutPage_Controller extends Page_Controller {
	public function init() {
		parent::init();
		
		Requirements::css("{$this->ThemeDir()}/css/about.css");
	}
}