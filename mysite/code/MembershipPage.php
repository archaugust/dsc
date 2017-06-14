<?php
class MembershipPage extends Page {
	
	private static $db = array(
			'MembershipFormIntro' => 'HTMLText',
			'ContentBottom' => 'HTMLText'
	);
	
	private static $has_many = array (
			'Sections' => 'MembershipSection'
	);
	
	private static $allowed_children = array ();
	
	public function getCMSFields(){
		$fields = parent::getCMSFields();
		$fields->addFieldToTab('Root.Main', HtmlEditorField::create('MembershipFormIntro', 'Membership Form Intro')->setRows(10), 'Metadata');
		$fields->addFieldToTab('Root.Main', HtmlEditorField::create('ContentBottom', 'ContentBottom')->setRows(10), 'Metadata');
		$fields->addFieldToTab('Root.Sections',  GridField::create(
				'Sections',
				'Sections',
				$this->Sections(),
				GridFieldConfig_RecordEditor::create()
			));
		
		return $fields;
	}
}

class MembershipPage_Controller extends Page_Controller {
	
	private static $allowed_actions = array (
			'MembershipForm','apply'
	);
	
	public function init() {
		parent::init();
		
		Requirements::css("{$this->ThemeDir()}/css/membership.css");
		Requirements::css("framework/thirdparty/jquery-ui-themes/smoothness/jquery-ui.css");
		Requirements::javascript("framework/thirdparty/jquery-ui/jquery-ui.js");
		Requirements::javascript("{$this->ThemeDir()}/js/membership.js");
	}
	
	public function MembershipForm() {
		
		$form = Form::create(
				$this,
				__FUNCTION__,
				FieldList::create(
						TextField::create('Name', 'Name *'),
						TextField::create('Gender','Gender'),
						TextField::create('DateOfBirth'),
						TextField::create('HomePhone', 'Home Phone'),
						TextField::create('MobilePhone', 'Mobile Phone *'),
						EmailField::create('Email', 'Email *'),
						TextField::create('PostalAddress'),
						TextField::create('Postcode', 'Postcode *'),
						TextField::create('Discipline','Discipline'),
						TextField::create('MedicalCondition','Medical Condition/Diagnosis *'),
						TextField::create('DisablingFeatures'),
						TextField::create('VisualProblems'),
						TextField::create('HearingProblems'),
						TextField::create('CommunicationProblems','Specific Communication Problems'),
						TextField::create('MethodOfCommunication','Method of Communication'),
						TextField::create('InCaseOfEmergency','Things We Should Know in an Emergency'),
						TextField::create('GP'),
						TextField::create('Medications'),
						TextField::create('Allergies'),
						TextField::create('GuardianName', 'Name *'),
						TextField::create('GuardianPhone', 'Phone *'),
						TextField::create('MembershipType','Membership Type'),
						TextField::create('Donation','Donation'),
						TextField::create('Receipt','Receipt'),
						TextField::create('OnlineConsent','Online Consent')
				),
				FieldList::create(
						FormAction::create('handleSubmission','Submit Application')
						->setUseButtonTag(true)
						->setAttribute('class', 'c-btn c-btn--primary o-submit')
						),
				RequiredFields::create('Name','Gender','Email','MobilePhone','PostalAddress','Postcode','MedicalCondition','DisablingFeatures','GuardianName','GuardianPhone','MembershipType')
				);
		
		foreach ($form->Fields() as $field) {
			$field
			->addExtraClass('u-form-control')
			;
		}
		
		$form->setTemplate('MembershipForm');
		
		$data = Session::get("FormData.{$form->getName()}.data");
//		var_dump($data);die;
		return $data ? $form->loadDataFrom($data) : $form;
	}
	
	public function apply(SS_HTTPRequest $request) {
		var_dump($request);die;
	}
	
	public function handleSubmission($data, $form) {
		
		$contact = ContactPage::get()->first();
			
		$membership = Membership::create();
			
		$form->saveInto($membership);
			
		$membership->write();
			
		$email = new Email();
		
		$email->setTo($contact->EmailRecipient);
		$email->setFrom('info@disabledsnowsportscanterbury.org.nz');
		$email->setSubject("New Subscriber: ". $data['Name'] .'<'. $data['Email'] .'>');
		
		$messageBody = '
			<p>Manage Subscribers at the <a href="http://disabledsnowsportscanterbury.org.nz/admin">CMS</a></p>
		';
		$email->setBody($messageBody);
//		$email->send();
			
		$msg = 'Thanks! We have received your application for membership.';
				
		return $msg;
	}
}