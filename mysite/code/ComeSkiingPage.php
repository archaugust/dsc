<?php
class ComeSkiingPage extends Page {
	
	private static $db = array(
			'TestimonialsIntro' => 'HTMLText',
			'ContentBottom' => 'HTMLText',
			'MapLat' => 'Varchar',
			'MapLng' => 'Varchar',
			'MapZoom' => 'Varchar',
	);
	
	private static $has_one = array(
			'Banner' => 'Image',
	);

	private static $has_many = array (
			'Testimonials' => 'Testimonial'
	);
	
	private static $allowed_children = array ();
	
	public function getCMSFields(){
		$fields = parent::getCMSFields();
		$fields->addFieldToTab('Root.Main', $uploader = UploadField::create('Banner', 'Banner Image'), 'Content');
		$fields->addFieldToTab('Root.Main', HtmlEditorField::create('TestimonialsIntro', 'Testimonials Intro')->setRows(10), 'Metadata');
		$fields->addFieldToTab('Root.Main', HtmlEditorField::create('ContentBottom', 'Content Bottom')->setRows(10), 'Metadata');
		$fields->addFieldToTab('Root.Testimonials',  GridField::create(
				'Testimonials',
				'Testimonials',
				$this->Testimonials(),
				GridFieldConfig_RecordEditor::create()
		));
		$fields->addFieldToTab('Root.Map', TextField::create('MapLat', 'Latitude'));
		$fields->addFieldToTab('Root.Map', TextField::create('MapLng', 'Longitude'));
		$fields->addFieldToTab('Root.Map', TextField::create('MapZoom', 'Zoom Level'));
		
		$uploader->getValidator()->setAllowedExtensions(array('png','gif','jpeg','jpg'));
		
		return $fields;
	}
}

class ComeSkiingPage_Controller extends Page_Controller {
	public function init() {
		parent::init();
		
		Requirements::css("{$this->Themedir()}/css/carousel.css");
		Requirements::css("{$this->ThemeDir()}/css/come-skiing.css");
	}
}