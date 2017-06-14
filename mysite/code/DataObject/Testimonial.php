<?php 
class Testimonial extends DataObject {
	
	private static $db = array (
			'Name' => 'Varchar',
			'Title' => 'Varchar(100)',
			'Content' => 'HTMLText',
	);
	
	private static $has_one = array (
			'ParentPage' => 'ComeSkiingPage'
	);
	
	private static $summary_fields = array (
			'Name' => 'Name',
			'Title' => 'Title',
			'Content.BigSummary' => 'Content'
	);
	
	public function getCMSFields() {
		$fields = FieldList::create(
				TextField::create('Name'),
				TextField::create('Title'),
				HtmlEditorField::create('Content')
		);
		
		return $fields;
	}
}
?>