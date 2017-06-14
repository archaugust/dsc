<?php
class BanneredPage extends Page {
	
	private static $has_one = array(
			'Banner' => 'Image',
	);

	private static $allowed_children = array ();
	
	public function getCMSFields(){
		$fields = parent::getCMSFields();
		$fields->addFieldToTab('Root.Main', $uploader = UploadField::create('Banner', 'Banner Image'), 'Content');

		$uploader->getValidator()->setAllowedExtensions(array('png','gif','jpeg','jpg'));
		
		return $fields;
	}
}