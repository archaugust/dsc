<?php
class SkiArea extends DataObject {
	
	private static $db = array (
			'Name' => 'Varchar',
			'Website' => 'Varchar(100)'
	);
	
	private static $has_one = array (
			'Photo' => 'Image',
			'ParentPage' => 'SponsorsPage'
	);
	
	private static $summary_fields = array (
			'GridThumbnail' => '',
			'Name' => 'Name',
			'Website' => 'Website'
	);
	
	public function getGridThumbnail() {
		if($this->Photo()->exists()) {
			return $this->Photo()->SetWidth(100);
		}
		
		return "(no image)";
	}
	
	public function getCMSFields() {
		$fields = FieldList::create(
				$uploader = UploadField::create('Photo'),
				TextField::create('Name', 'Name'),
				TextField::create('Website', 'Website')
				);
		
		$uploader->getValidator()->setAllowedExtensions(array('png','gif','jpeg','jpg'));
		
		return $fields;
	}
}
?>