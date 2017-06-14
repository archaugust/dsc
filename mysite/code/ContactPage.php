<?php
class ContactPage extends Page {
	private static $db = array(
			'EmailRecipient' => 'Varchar',
			'Footer1' => 'HTMLText',
			'Footer2' => 'HTMLText'
	);
	
	private static $has_many = array (
			'Contacts' => 'Contact'
	);
	
	private static $allowed_children = array ();

	public function getCMSFields(){
		$fields = parent::getCMSFields();
		$fields->addFieldToTab('Root.Main', TextField::create('EmailRecipient', 'Email Recipient'), 'Content');
		$fields->addFieldToTab('Root.Main', HtmlEditorField::create('Footer1', 'Footer 1')->setRows(10), 'Metadata');
		$fields->addFieldToTab('Root.Main', HtmlEditorField::create('Footer2', 'Footer 2')->setRows(10), 'Metadata');
		
		return $fields;
	}
}

class ContactPage_Controller extends Page_Controller {
	public function init() {
		parent::init();
		
		Requirements::css("{$this->Themedir()}/css/contact.css");
		Requirements::javascript("{$this->Themedir()}/js/contact.js");
		Requirements::javascript("https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit", true, true);
	}
	
	private static $allowed_actions = array (
			'ContactForm',
	);
	
	public function ContactForm() {
		$form = Form::create(
				$this,
				__FUNCTION__,
				FieldList::create(
						TextField::create('Name','')
							->setAttribute('placeholder', 'Name *')
							->setAttribute('aria-required', true)
							->setAttribute('class', 'u-form-control'),
						EmailField::create('Email','')
							->setAttribute('placeholder', 'Email *')
							->setAttribute('aria-required', true)
							->setAttribute('class', 'u-form-control'),
						TextField::create('Subject','')
							->setAttribute('placeholder', 'Subject')
							->setAttribute('class', 'u-form-control')
						,
						TextareaField::create('Message','')
							->setAttribute('placeholder', 'Message *')
							->setAttribute('aria-required', true)
							->setAttribute('class', 'u-form-control')
						),
				FieldList::create(
						FormAction::create('handleSubmission','Send')
							->setUseButtonTag(true)
							->setTemplate('SubmitRecaptcha')
						),
				RequiredFields::create('Name','Email','Message')
				);
		
		foreach ($form->Fields() as $field) {
			$field
				->setFieldHolderTemplate('CustomFormField_holder')
			;
		}
		
		$data = Session::get("FormData.{$form->getName()}.data");
		
		return $data ? $form->loadDataFrom($data) : $form;
	}
	
	public function handleSubmission($data, $form) {
		
		if(isset($data['g-recaptcha-response']) && !empty($data['g-recaptcha-response'])) {
			$secret = '6LcaLCQUAAAAAI-JKM4tuX94U9IyTioH_CEnUYkI';
			$response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$data['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
			
			if ($response['success'] != false) {
				
				Session::set("FormData.{$form->getName()}.data", $data);
				
				$existing = Contact::get()->filter(array(
						'Message' => $data['Message']
				));
				
				if($existing->exists())
					return 'Message already sent.';
				else {
					$contact = Contact::create();
					$contact->ContactPageID = $this->ID;
					$form->saveInto($contact);
					
					$contact->write();
					
					$email = new Email();
					
					$email->setTo($this->EmailRecipient);
					$email->setFrom('info@disabledsnowsportscanterbury.org.nz');
					$email->setSubject("Contact Message - ". $data['Subject']);
					
					$messageBody = '
						<p>Name: <br />'.
						$data['Name'] .'</p>
						<p>Email: <br />'.
						$data['Email'] .'</p>
						<p>Message: <br />'.
						$data['Message'] .'</p>
					';
					
					$email->setBody($messageBody);
//					$email->send();
					
					Session::clear("FormData.{$form->getName()}.data");
					return "Your message has been sent. Thanks for getting in touch, we'll be with you soon.";
				}
			}
			else
				return 'Robot verification failed, please try again.';
		}
		else
			return 'Robot verification failed, please try reloading this page.';
	}
	
}
