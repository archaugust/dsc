<?php 
class Instructor extends DataObject {
	
	private static $db = array (
			'Name' => 'Varchar',
			'Description' => 'HTMLText'
	);
	
	private static $has_one = array (
			'Photo' => 'Image',
			'ParentPage' => 'AboutPage'
	);
	
	private static $casting = array(
			'Description' => 'HTMLText'
	);
	
	private static $summary_fields = array (
			'GridThumbnail' => '',
			'Name' => 'Name',
			'Description.BigSummary' => 'Description'
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
				HtmlEditorField::create('Description', 'Description')
		);
		
		$uploader->getValidator()->setAllowedExtensions(array('png','gif','jpeg','jpg'));

		return $fields;
	}
}
?>