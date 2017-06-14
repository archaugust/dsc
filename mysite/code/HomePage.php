<?php
class HomePage extends Page {
	private static $db = array (
			'BannerButtonText' => 'Varchar',
			'BannerButtonLink' => 'Varchar(100)',
			'SubIntroLeftTitle' => 'Varchar',
			'SubIntroLeftTitleMobile' => 'Varchar',
			'SubIntroLeftText' => 'Varchar(255)',
			'SubIntroLeftLink' => 'Varchar(100)',
			'SubIntroRightTitle' => 'Varchar',
			'SubIntroRightTitleMobile' => 'Varchar',
			'SubIntroRightText' => 'Varchar(255)',
			'SubIntroRightLink' => 'Varchar(100)',
			'InstagramUserID' => 'Varchar',
			'InstagramAccessToken' => 'Varchar(60)',
			'RecaptchaSiteKey' => 'Varchar',
			'RecaptchaSecret' => 'Varchar',
			'SubscribeTitle' => 'Varchar',
			'SubscribeText' => 'HTMLText',
			'MailChimpApiKey' => 'Varchar',
			'MailChimpListID' => 'VarChar'
	);
	
	private static $has_one = array(
			'Banner' => 'Image',
			'SubIntroLeftImage' => 'Image',
			'SubIntroRightImage' => 'Image',
			'SubscribeImage' => 'Image',
	);
	
	private static $allowed_children = array ();
	
	public function getCMSFields(){
		$uploader = array();
		$fields = parent::getCMSFields();
		$fields->addFieldToTab('Root.Main', $uploader[] = UploadField::create('Banner', 'Banner Image'), 'Content');
		$fields->addFieldToTab('Root.Main', TextField::create('BannerButtonText', 'Banner Button Text'), 'Content');
		$fields->addFieldToTab('Root.Main', TextField::create('BannerButtonLink', 'Banner Button Link'), 'Content');
		$fields->addFieldToTab('Root.Main', TextField::create('SubscribeTitle', 'Subscribe Title'), 'Metadata');
		$fields->addFieldToTab('Root.Main', HtmlEditorField::create('SubscribeText', 'Subscribe Text')->setRows(10), 'Metadata');
		$fields->addFieldToTab('Root.Main', $uploader[] = UploadField::create('SubscribeImage', 'Subscribe Background Image'), 'Metadata');
		$fields->addFieldToTab('Root.SubIntroLeft', TextField::create('SubIntroLeftTitle', 'Title'));
		$fields->addFieldToTab('Root.SubIntroLeft', TextField::create('SubIntroLeftTitleMobile', 'Title - Mobile'));
		$fields->addFieldToTab('Root.SubIntroLeft', TextField::create('SubIntroLeftText', 'Text'));
		$fields->addFieldToTab('Root.SubIntroLeft', TextField::create('SubIntroLeftLink', 'Link'));
		$fields->addFieldToTab('Root.SubIntroLeft', $uploader[] = UploadField::create('SubIntroLeftImage', 'Image'));
		$fields->addFieldToTab('Root.SubIntroRight', TextField::create('SubIntroRightTitle', 'Title'));
		$fields->addFieldToTab('Root.SubIntroRight', TextField::create('SubIntroRightTitleMobile', 'Title - Mobile'));
		$fields->addFieldToTab('Root.SubIntroRight', TextField::create('SubIntroRightText', 'Text'));
		$fields->addFieldToTab('Root.SubIntroRight', TextField::create('SubIntroRightLink', 'Link'));
		$fields->addFieldToTab('Root.SubIntroRight', $uploader[] = UploadField::create('SubIntroRightImage', 'Image'));
		$fields->addFieldToTab('Root.Integrations', TextField::create('InstagramAccessToken', 'Instagram Access Token'));
		$fields->addFieldToTab('Root.Integrations', TextField::create('InstagramUserID', 'Instagram User ID'));
		$fields->addFieldToTab('Root.Integrations', TextField::create('RecaptchaSecret', 'Google Recaptcha Secret'));
		$fields->addFieldToTab('Root.Integrations', TextField::create('RecaptchaSiteKey', 'Google Recaptcha Site Key'));
		$fields->addFieldToTab('Root.Integrations', TextField::create('MailChimpApiKey', 'MailChimp API Key'));
		$fields->addFieldToTab('Root.Integrations', TextField::create('MailChimpListID', 'MailChimp List ID'));
		
		foreach ($uploader as $UploaderField) {
			$UploaderField->getValidator()->setAllowedExtensions(array('png','gif','jpeg','jpg'));
		}
		
		return $fields;
	}
}

class HomePage_Controller extends Page_Controller {
	private static $allowed_actions = array (
			'SubscribeForm',
	);
	
	public function init() {
		parent::init();

		Requirements::css("{$this->Themedir()}/css/home.css");
		Requirements::css("{$this->Themedir()}/css/carousel.css");
		
		$mobile_browser   = false; // set mobile browser as false till we can prove otherwise
		$user_agent       = $_SERVER['HTTP_USER_AGENT']; // get the user agent value - this should be cleaned to ensure no nefarious input gets executed
		$accept           = $_SERVER['HTTP_ACCEPT']; // get the content accept value - this should be cleaned to ensure no nefarious input gets executed
		
		switch(true){ // using a switch against the following statements which could return true is more efficient than the previous method of using if statements
			
			case (preg_match('/ipad/i',$user_agent)); // we find the word ipad in the user agent
			$mobile_browser = false; // mobile browser is either true or false depending on the setting of ipad when calling the function
			// ends the if for ipad being a url
			break; // break out and skip the rest if we've had a match on the ipad // this goes before the iphone to catch it else it would return on the iphone instead
			
			case (preg_match('/ipod/i',$user_agent)||preg_match('/iphone/i',$user_agent)); // we find the words iphone or ipod in the user agent
			$mobile_browser = true; // mobile browser is either true or false depending on the setting of iphone when calling the function
			
			break; // break out and skip the rest if we've had a match on the iphone or ipod
			
			case (preg_match('/android/i',$user_agent));  // we find android in the user agent
			$mobile_browser = true; // mobile browser is either true or false depending on the setting of android when calling the function
			
			break; // break out and skip the rest if we've had a match on android
			
			case (preg_match('/opera mini/i',$user_agent)); // we find opera mini in the user agent
			$mobile_browser = true; // mobile browser is either true or false depending on the setting of opera when calling the function
			
			break; // break out and skip the rest if we've had a match on opera
			
			case (preg_match('/blackberry/i',$user_agent)); // we find blackberry in the user agent
			$mobile_browser = true; // mobile browser is either true or false depending on the setting of blackberry when calling the function
			
			break; // break out and skip the rest if we've had a match on blackberry
			
			case (preg_match('/(pre\/|palm os|palm|hiptop|avantgo|plucker|xiino|blazer|elaine)/i',$user_agent)); // we find palm os in the user agent - the i at the end makes it case insensitive
			$mobile_browser = true; // mobile browser is either true or false depending on the setting of palm when calling the function
			
			break; // break out and skip the rest if we've had a match on palm os
			
			case (preg_match('/(iris|3g_t|windows ce|opera mobi|windows ce; smartphone;|windows ce; iemobile)/i',$user_agent)); // we find windows mobile in the user agent - the i at the end makes it case insensitive
			$mobile_browser = true; // mobile browser is either true or false depending on the setting of windows when calling the function
			
			break; // break out and skip the rest if we've had a match on windows
			
			case (preg_match('/(Motorola|DROIDX|DROID BIONIC|HTC|HTC.*(Sensation|Evo|Vision|Explorer|6800|8100|8900|A7272|S510e|C110e|Legend|Desire|T8282)|APX515CKT|Qtek9090|APA9292KT|HD_mini|Sensation.*Z710e|PG86100|Z715e|Desire.*(A8181|HD)|ADR6200|ADR6400L|ADR6425|001HT|Inspire 4G|Android.*\bEVO\b|T-Mobile G1|Z520m|Nexus One|Nexus S|Galaxy.*Nexus|Android.*Nexus.*Mobile|Nexus 4|Nexus 5|Nexus 6|mini 9.5|vx1000|lge |m800|e860|u940|ux840|compal|wireless| mobi|ahong|lg380|lgku|lgu900|lg210|lg47|lg920|lg840|lg370|sam-r|mg50|s55|g83|t66|vx400|mk99|d615|d763|el370|sl900|mp500|samu3|samu4|vx10|xda_|samu5|samu6|samu7|samu9|a615|b832|m881|s920|n210|s700|c-810|_h797|mob-x|sk16d|848b|mowser|s580|r800|471x|v120|rim8|c500foma:|160x|x160|480x|x640|t503|w839|i250|sprint|w398samr810|m5252|c7100|mt126|x225|s5330|s820|htil-g1|fly v71|s302|-x113|novarra|k610i|-three|8325rc|8352rc|sanyo|vx54|c888|nx250|n120|mtk |c5588|s710|t880|c5005|i;458x|p404i|s210|c5100|teleca|s940|c500|s590|foma|samsu|vx8|vx9|a1000|_mms|myx|a700|gu1100|bc831|e300|ems100|me701|me702m-three|sd588|s800|8325rc|ac831|mw200|brew |d88|htc\/|htc_touch|355x|m50|km100|d736|p-9521|telco|sl74|ktouch|m4u\/|me702|8325rc|kddi|phone|lg |sonyericsson|samsung|240x|x320|vx10|nokia|sony cmd|motorola|up.browser|up.link|mmp|symbian|smartphone|midp|wap|vodafone|o2|pocket|kindle|mobile|psp|treo)/i',$user_agent)); // check if any of the values listed create a match on the user agent - these are some of the most common terms used in agents to identify them as being mobile devices - the i at the end makes it case insensitive
			$mobile_browser = true; // set mobile browser to true
			break; // break out and skip the rest if we've preg_match on the user agent returned true
			
			case ((strpos($accept,'text/vnd.wap.wml')>0)||(strpos($accept,'application/vnd.wap.xhtml+xml')>0)); // is the device showing signs of support for text/vnd.wap.wml or application/vnd.wap.xhtml+xml
			$mobile_browser = true; // set mobile browser to true
			break; // break out and skip the rest if we've had a match on the content accept headers
			
			case (isset($_SERVER['HTTP_X_WAP_PROFILE'])||isset($_SERVER['HTTP_PROFILE'])); // is the device giving us a HTTP_X_WAP_PROFILE or HTTP_PROFILE header - only mobile devices would do this
			$mobile_browser = true; // set mobile browser to true
			break; // break out and skip the final step if we've had a return true on the mobile specfic headers
			
			case (in_array(strtolower(substr($user_agent,0,4)),array('1207'=>'1207','3gso'=>'3gso','4thp'=>'4thp','501i'=>'501i','502i'=>'502i','503i'=>'503i','504i'=>'504i','505i'=>'505i','506i'=>'506i','6310'=>'6310','6590'=>'6590','770s'=>'770s','802s'=>'802s','a wa'=>'a wa','acer'=>'acer','acs-'=>'acs-','airn'=>'airn','alav'=>'alav','asus'=>'asus','attw'=>'attw','au-m'=>'au-m','aur '=>'aur ','aus '=>'aus ','abac'=>'abac','acoo'=>'acoo','aiko'=>'aiko','alco'=>'alco','alca'=>'alca','amoi'=>'amoi','anex'=>'anex','anny'=>'anny','anyw'=>'anyw','aptu'=>'aptu','arch'=>'arch','argo'=>'argo','bell'=>'bell','bird'=>'bird','bw-n'=>'bw-n','bw-u'=>'bw-u','beck'=>'beck','benq'=>'benq','bilb'=>'bilb','blac'=>'blac','c55/'=>'c55/','cdm-'=>'cdm-','chtm'=>'chtm','capi'=>'capi','cond'=>'cond','craw'=>'craw','dall'=>'dall','dbte'=>'dbte','dc-s'=>'dc-s','dica'=>'dica','ds-d'=>'ds-d','ds12'=>'ds12','dait'=>'dait','devi'=>'devi','dmob'=>'dmob','doco'=>'doco','dopo'=>'dopo','el49'=>'el49','erk0'=>'erk0','esl8'=>'esl8','ez40'=>'ez40','ez60'=>'ez60','ez70'=>'ez70','ezos'=>'ezos','ezze'=>'ezze','elai'=>'elai','emul'=>'emul','eric'=>'eric','ezwa'=>'ezwa','fake'=>'fake','fly-'=>'fly-','fly_'=>'fly_','g-mo'=>'g-mo','g1 u'=>'g1 u','g560'=>'g560','gf-5'=>'gf-5','grun'=>'grun','gene'=>'gene','go.w'=>'go.w','good'=>'good','grad'=>'grad','hcit'=>'hcit','hd-m'=>'hd-m','hd-p'=>'hd-p','hd-t'=>'hd-t','hei-'=>'hei-','hp i'=>'hp i','hpip'=>'hpip','hs-c'=>'hs-c','htc '=>'htc ','htc-'=>'htc-','htca'=>'htca','htcg'=>'htcg','htcp'=>'htcp','htcs'=>'htcs','htct'=>'htct','htc_'=>'htc_','haie'=>'haie','hita'=>'hita','huaw'=>'huaw','hutc'=>'hutc','i-20'=>'i-20','i-go'=>'i-go','i-ma'=>'i-ma','i230'=>'i230','iac'=>'iac','iac-'=>'iac-','iac/'=>'iac/','ig01'=>'ig01','im1k'=>'im1k','inno'=>'inno','iris'=>'iris','jata'=>'jata','java'=>'java','kddi'=>'kddi','kgt'=>'kgt','kgt/'=>'kgt/','kpt '=>'kpt ','kwc-'=>'kwc-','klon'=>'klon','lexi'=>'lexi','lg g'=>'lg g','lg-a'=>'lg-a','lg-b'=>'lg-b','lg-c'=>'lg-c','lg-d'=>'lg-d','lg-f'=>'lg-f','lg-g'=>'lg-g','lg-k'=>'lg-k','lg-l'=>'lg-l','lg-m'=>'lg-m','lg-o'=>'lg-o','lg-p'=>'lg-p','lg-s'=>'lg-s','lg-t'=>'lg-t','lg-u'=>'lg-u','lg-w'=>'lg-w','lg/k'=>'lg/k','lg/l'=>'lg/l','lg/u'=>'lg/u','lg50'=>'lg50','lg54'=>'lg54','lge-'=>'lge-','lge/'=>'lge/','lynx'=>'lynx','leno'=>'leno','m1-w'=>'m1-w','m3ga'=>'m3ga','m50/'=>'m50/','maui'=>'maui','mc01'=>'mc01','mc21'=>'mc21','mcca'=>'mcca','medi'=>'medi','meri'=>'meri','mio8'=>'mio8','mioa'=>'mioa','mo01'=>'mo01','mo02'=>'mo02','mode'=>'mode','modo'=>'modo','mot '=>'mot ','mot-'=>'mot-','mt50'=>'mt50','mtp1'=>'mtp1','mtv '=>'mtv ','mate'=>'mate','maxo'=>'maxo','merc'=>'merc','mits'=>'mits','mobi'=>'mobi','motv'=>'motv','mozz'=>'mozz','n100'=>'n100','n101'=>'n101','n102'=>'n102','n202'=>'n202','n203'=>'n203','n300'=>'n300','n302'=>'n302','n500'=>'n500','n502'=>'n502','n505'=>'n505','n700'=>'n700','n701'=>'n701','n710'=>'n710','nec-'=>'nec-','nem-'=>'nem-','newg'=>'newg','neon'=>'neon','netf'=>'netf','noki'=>'noki','nzph'=>'nzph','o2 x'=>'o2 x','o2-x'=>'o2-x','opwv'=>'opwv','owg1'=>'owg1','opti'=>'opti','oran'=>'oran','p800'=>'p800','pand'=>'pand','pg-1'=>'pg-1','pg-2'=>'pg-2','pg-3'=>'pg-3','pg-6'=>'pg-6','pg-8'=>'pg-8','pg-c'=>'pg-c','pg13'=>'pg13','phil'=>'phil','pn-2'=>'pn-2','pt-g'=>'pt-g','palm'=>'palm','pana'=>'pana','pire'=>'pire','pock'=>'pock','pose'=>'pose','psio'=>'psio','qa-a'=>'qa-a','qc-2'=>'qc-2','qc-3'=>'qc-3','qc-5'=>'qc-5','qc-7'=>'qc-7','qc07'=>'qc07','qc12'=>'qc12','qc21'=>'qc21','qc32'=>'qc32','qc60'=>'qc60','qci-'=>'qci-','qwap'=>'qwap','qtek'=>'qtek','r380'=>'r380','r600'=>'r600','raks'=>'raks','rim9'=>'rim9','rove'=>'rove','s55/'=>'s55/','sage'=>'sage','sams'=>'sams','sc01'=>'sc01','sch-'=>'sch-','scp-'=>'scp-','sdk/'=>'sdk/','se47'=>'se47','sec-'=>'sec-','sec0'=>'sec0','sec1'=>'sec1','semc'=>'semc','sgh-'=>'sgh-','shar'=>'shar','sie-'=>'sie-','sk-0'=>'sk-0','sl45'=>'sl45','slid'=>'slid','smb3'=>'smb3','smt5'=>'smt5','sp01'=>'sp01','sph-'=>'sph-','spv '=>'spv ','spv-'=>'spv-','sy01'=>'sy01','samm'=>'samm','sany'=>'sany','sava'=>'sava','scoo'=>'scoo','send'=>'send','siem'=>'siem','smar'=>'smar','smit'=>'smit','soft'=>'soft','sony'=>'sony','t-mo'=>'t-mo','t218'=>'t218','t250'=>'t250','t600'=>'t600','t610'=>'t610','t618'=>'t618','tcl-'=>'tcl-','tdg-'=>'tdg-','telm'=>'telm','tim-'=>'tim-','ts70'=>'ts70','tsm-'=>'tsm-','tsm3'=>'tsm3','tsm5'=>'tsm5','tx-9'=>'tx-9','tagt'=>'tagt','talk'=>'talk','teli'=>'teli','topl'=>'topl','hiba'=>'hiba','up.b'=>'up.b','upg1'=>'upg1','utst'=>'utst','v400'=>'v400','v750'=>'v750','veri'=>'veri','vk-v'=>'vk-v','vk40'=>'vk40','vk50'=>'vk50','vk52'=>'vk52','vk53'=>'vk53','vm40'=>'vm40','vx98'=>'vx98','virg'=>'virg','vite'=>'vite','voda'=>'voda','vulc'=>'vulc','w3c '=>'w3c ','w3c-'=>'w3c-','wapj'=>'wapj','wapp'=>'wapp','wapu'=>'wapu','wapm'=>'wapm','wig '=>'wig ','wapi'=>'wapi','wapr'=>'wapr','wapv'=>'wapv','wapy'=>'wapy','wapa'=>'wapa','waps'=>'waps','wapt'=>'wapt','winc'=>'winc','winw'=>'winw','wonu'=>'wonu','x700'=>'x700','xda2'=>'xda2','xdag'=>'xdag','yas-'=>'yas-','your'=>'your','zte-'=>'zte-','zeto'=>'zeto','acs-'=>'acs-','alav'=>'alav','alca'=>'alca','amoi'=>'amoi','aste'=>'aste','audi'=>'audi','avan'=>'avan','benq'=>'benq','bird'=>'bird','blac'=>'blac','blaz'=>'blaz','brew'=>'brew','brvw'=>'brvw','bumb'=>'bumb','ccwa'=>'ccwa','cell'=>'cell','cldc'=>'cldc','cmd-'=>'cmd-','dang'=>'dang','doco'=>'doco','eml2'=>'eml2','eric'=>'eric','fetc'=>'fetc','hipt'=>'hipt','http'=>'http','ibro'=>'ibro','idea'=>'idea','ikom'=>'ikom','inno'=>'inno','ipaq'=>'ipaq','jbro'=>'jbro','jemu'=>'jemu','java'=>'java','jigs'=>'jigs','kddi'=>'kddi','keji'=>'keji','kyoc'=>'kyoc','kyok'=>'kyok','leno'=>'leno','lg-c'=>'lg-c','lg-d'=>'lg-d','lg-g'=>'lg-g','lge-'=>'lge-','libw'=>'libw','m-cr'=>'m-cr','maui'=>'maui','maxo'=>'maxo','midp'=>'midp','mits'=>'mits','mmef'=>'mmef','mobi'=>'mobi','mot-'=>'mot-','moto'=>'moto','mwbp'=>'mwbp','mywa'=>'mywa','nec-'=>'nec-','newt'=>'newt','nok6'=>'nok6','noki'=>'noki','o2im'=>'o2im','opwv'=>'opwv','palm'=>'palm','pana'=>'pana','pant'=>'pant','pdxg'=>'pdxg','phil'=>'phil','play'=>'play','pluc'=>'pluc','port'=>'port','prox'=>'prox','qtek'=>'qtek','qwap'=>'qwap','rozo'=>'rozo','sage'=>'sage','sama'=>'sama','sams'=>'sams','sany'=>'sany','sch-'=>'sch-','sec-'=>'sec-','send'=>'send','seri'=>'seri','sgh-'=>'sgh-','shar'=>'shar','sie-'=>'sie-','siem'=>'siem','smal'=>'smal','smar'=>'smar','sony'=>'sony','sph-'=>'sph-','symb'=>'symb','t-mo'=>'t-mo','teli'=>'teli','tim-'=>'tim-','tosh'=>'tosh','treo'=>'treo','tsm-'=>'tsm-','upg1'=>'upg1','upsi'=>'upsi','vk-v'=>'vk-v','voda'=>'voda','vx52'=>'vx52','vx53'=>'vx53','vx60'=>'vx60','vx61'=>'vx61','vx70'=>'vx70','vx80'=>'vx80','vx81'=>'vx81','vx83'=>'vx83','vx85'=>'vx85','wap-'=>'wap-','wapa'=>'wapa','wapi'=>'wapi','wapp'=>'wapp','wapr'=>'wapr','webc'=>'webc','whit'=>'whit','winw'=>'winw','wmlb'=>'wmlb','xda-'=>'xda-',))); // check against a list of trimmed user agents to see if we find a match
			$mobile_browser = true; // set mobile browser to true
			break; // break even though it's the last statement in the switch so there's nothing to break away from but it seems better to include it than exclude it
			
			default;
			$mobile_browser = false; // set mobile browser to false
			break; // break even though it's the last statement in the switch so there's nothing to break away from but it seems better to include it than exclude it
			
		}
		
		
		if ($mobile_browser == true)
			Requirements::customCSS('
				/* mobile only css */
				figure.instagram:hover figcaption {
					display: none;
				}
			');
			
		Requirements::customScript(<<<JS
			var recaptchaButton;
			var onloadCallback = function() {
				
				recaptchaButton = grecaptcha.render('recaptchaButton', {
				    'sitekey' : '$this->RecaptchaSiteKey',
				    'callback' : onFormSubmit
				  });
			};

		    var feed = new Instafeed({
		        get: 'user',
		        userId: '$this->InstagramUserID',
				accessToken: '$this->InstagramAccessToken',
				resolution: 'standard_resolution',
				limit: 8,
				after: mobileTap,
		        template: '<div class="o-layout__item u-pl-35 u-1/4@desktop u-1/2@mobile"><figure class="instagram"><img src="{{image}}" /><a href="{{link}}" target="_blank"><figcaption>{{caption}}</figcaption></a></figure></div>'
		    });
		    feed.run();
JS
		);
		Requirements::javascript("{$this->Themedir()}/js/home.js");
		Requirements::javascript("https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit", true, true);
	}
	
	public function SubscribeForm() {
		Session::set('subscribed',false);
		$subscribed = Session::get('subscribed');
		
		$form = Form::create(
				$this,
				__FUNCTION__,
				FieldList::create(
						TextField::create('Name')
							->setAttribute('aria-required', true)
							->setAttribute('placeholder', 'Name *'),
						EmailField::create('Email')
							->setAttribute('aria-required', true)
							->setAttribute('placeholder', 'Email *')
						),
				FieldList::create(
						FormAction::create('handleSubmission','SIGN ME UP!')
						->setUseButtonTag(true)
						->setTemplate('SubmitRecaptcha')
						),
				RequiredFields::create('Name','Email')
				);
		
		foreach ($form->Fields() as $field) {
			$field
			->addExtraClass('u-form-control')
			;
		}
		
		$form->setTemplate('SubscribeForm');
		
		if ($subscribed) {
			foreach ($form->Fields() as $field)
				$field->setDisabled(true);
		}
		
		$data = Session::get("FormData.{$form->getName()}.data");
		
		return $data ? $form->loadDataFrom($data) : $form;
	}
	
	public function handleSubmission($data, $form) {
		
		if(isset($data['g-recaptcha-response']) && !empty($data['g-recaptcha-response'])) {
			$secret = $this->RecaptchaSecret;
			$response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$data['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
			
			if ($response['success'] != false) {
				
				Session::set("FormData.{$form->getName()}.data", $data);
				
				$existing = Subscriber::get()->filter(array(
						'Email' => $data['Email']
				));
				
				if($existing->exists())
					return 'Email is already subscribed.';
					else {
						$contact = ContactPage::get()->first();
						
						$subscriber = Subscriber::create();
						
						$form->saveInto($subscriber);
						
						$subscriber->write();
						
						$email = new Email();
						
						$email->setTo($contact->EmailRecipient);
						$email->setFrom('info@disabledsnowsportscanterbury.org.nz');
						$email->setSubject("New Subscriber: ". $data['Name'] .'<'. $data['Email'] .'>');
						
						$messageBody = '
						<p>Manage Subscribers at the <a href="http://disabledsnowsportscanterbury.org.nz/admin">CMS</a></p>
					';
						$email->setBody($messageBody);
//						$email->send();
						
						Session::set('subscribed', true);
						
						// add to MailChimp list
						if ($this->MailChimpApiKey && $this->MailChimpListID) {
							$name = explode(' ', $data['Name']);
							
							$apiKey = $this->MailChimpApiKey;
							$listID = $this->MailChimpListID;
							
							// MailChimp API URL
							$memberID = md5(strtolower($data['Email']));
							$dataCenter = substr($apiKey,strpos($apiKey,'-')+1);
							$url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listID . '/members/' . $memberID;
							
							// member information
							$json = json_encode([
									'email_address' => $data['Email'],
									'status'        => 'subscribed',
									'merge_fields'  => [
											'FNAME'     => $name[0],
											'LNAME'     => empty($name[1]) ? ' ' : $name[1]
									]
							]);
							
							// send a HTTP POST request with curl
							$ch = curl_init($url);
							curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
							curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_TIMEOUT, 10);
							curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
							curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
							curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
							curl_exec($ch);
							$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
							curl_close($ch);
							
							// store the status message based on response code
							if ($httpCode == 200) {
								$msg = 'Thanks for subscribing!';
							} else {
								switch ($httpCode) {
									case 214:
										$msg = 'You are already subscribed.';
										break;
									default:
										$msg = 'Some problem occurred, please try again.';
										break;
								}
							}
						}
						else {
							$msg = 'Thanks for subscribing!';
						}
						
						return $msg;
					}
			}
			else
				return 'Robot verification failed, please try again.';
		}
		else
			return 'Robot verification failed, please try reloading this page.';
	}
}