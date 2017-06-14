<?php 
class Membership extends DataObject {

	private static $db = array(
			'PaymentConfirmed' => 'Boolean',
			'Name' => 'Varchar(100)',
			'Gender' => 'Varchar(1)',
			'DateOfBirth' => 'Date',
			'HomePhone' => 'Varchar',
			'MobilePhone' => 'Varchar',
			'Email' => 'Varchar',
			'PostalAddress' => 'Varchar(200)',
			'Postcode' => 'Varchar(10)',
			'Discipline' => 'Varchar(10)',
			'MedicalCondition' => 'Text',
			'DisablingFeatures' => 'Text',
			'VisualProblems' => 'Text',
			'HearingProblems' => 'Text',
			'CommunicationProblems' => 'Text',
			'MethodOfCommunication' => 'Text',
			'InCaseOfEmergency' => 'Text',
			'GP' => 'Text',
			'Medications' => 'Text',
			'Allergies' => 'Text',
			'GuardianName' => 'Varchar',
			'GuardianPhone' => 'Varchar',
			'MembershipType' => 'Varchar(10)',
			'Donation' => 'Int',
			'Receipt' => 'Boolean',
			'OnlineConsent' => 'Boolean'
	);
	
	private static $default_sort = 'Created DESC';
	
	private static $summary_fields = array (
			'Created.Nice' => 'Date Received',
			'Name' => 'Name',
			'Email' => 'Email',
			'MobilePhone' => 'MobilePhone',
			'MembershipType' => 'MembershipType',
			'PaymentConfirmed' => 'PaymentConfirmed'
	);
	
	public function getCMSFields() {
		$donation = array();
		for ($i = 5; $i < 100; $i+=5) {
			$donation[$i] = $i;
		}
		for ($i = 100; $i <= 2000; $i+=50) {
			$donation[$i] = $i;
		}
		
		$fields = FieldList::create(
				TextField::create('Name', 'Name *')
					->setAttribute('required', 'required')
					->setAttribute('aria-required', true),
				OptionsetField::create('Gender','Gender',array(
						'M' => 'M',
						'F' => 'F'
				)),
				DateField::create('DateOfBirth')
					->setConfig('showcalendar', true),
				TextField::create('HomePhone', 'Home Phone'),
				TextField::create('MobilePhone', 'Mobile Phone *')
				->setAttribute('required', 'required')
				->setAttribute('aria-required', true),
				EmailField::create('Email', 'Email *')
				->setAttribute('required', 'required')
				->setAttribute('aria-required', true),
				TextField::create('PostalAddress')
				->setAttribute('required', 'required')
				->setAttribute('aria-required', true),
				TextField::create('Postcode', 'Postcode *')
				->setAttribute('required', 'required')
				->setAttribute('aria-required', true),
				OptionsetField::create('Discipline','Discipline',array(
						'Skier' => 'Skier',
						'Boarder' => 'Boarder'
				)),
				TextField::create('MedicalCondition','Medical Condition/Diagnosis *')
				->setAttribute('required', 'required')
				->setAttribute('aria-required', true),
				TextField::create('DisablingFeatures')
				->setAttribute('required', 'required')
				->setAttribute('aria-required', true),
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
				OptionsetField::create('MembershipType','Membership Type',array(
						'Individual' => 'Individual ($75)',
						'Family' => 'Family ($100)'
					))
					->setAttribute('required', 'required')
					->setAttribute('aria-required', true),
				DropdownField::create('Donation','Donation', $donation),
				OptionsetField::create('Receipt','Receipt', array(
						true => 'Please send a receipt'
				)),
				OptionsetField::create('OnlineConsent','Online Consent', array(
						true => 'Yes, I consent',
						false => 'No, I do not consent'
				)),
				OptionsetField::create('PaymentConfirmed','Payment Confirmed',array(
						true => 'Yes',
						false => 'No'
				))
		);
		return $fields;
	}
}
?>