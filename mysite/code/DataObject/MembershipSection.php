<?php 
class MembershipSection extends DataObject {
	
	private static $db = array (
			'Title' => 'Varchar',
			'Content' => 'HTMLText'
	);
	
	private static $has_one = array (
			'Photo' => 'Image',
			'ParentPage' => 'MembershipPage'
	);
	
	private static $casting = array(
			'Content' => 'HTMLText'
	);
	
	private static $summary_fields = array (
			'GridThumbnail' => '',
			'Title' => 'Title',
			'Content.BigSummary' => 'Content'
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
				TextField::create('Title', 'Title'),
				HtmlEditorField::create('Content', 'Content')
		);
		
		$uploader->getValidator()->setAllowedExtensions(array('png','gif','jpeg','jpg'));

		return $fields;
	}
}
?>