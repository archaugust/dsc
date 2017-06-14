<?php

class Page extends SiteTree
{
	private static $db = array(
		'IsHeader' => 'Boolean',
	);
	
	public function Contact() {
		$ContactPage = ContactPage::get()->first();
		$email = $ContactPage->EmailRecipient;
		
		$character_set = '+-.0123456789@ABCDEFGHIJKLMNOPQRSTUVWXYZ_abcdefghijklmnopqrstuvwxyz';
		$key = str_shuffle($character_set); $cipher_text = '';
		
		for ($i=0;$i<strlen($email);$i+=1) $cipher_text.= $key[strpos($character_set,$email[$i])];
		
		$script = 'var a="'.$key.'";var b=a.split("").sort().join("");var c="'.$cipher_text.'";var d="";';
		$script.= 'for(var e=0;e<c.length;e++)d+=b.charAt(a.indexOf(c.charAt(e)));';
		$script.= '$(".email-link").html("<a href=\\"mailto:"+d+"\\">"+d+"</a>")';
		$script = "eval(\"".str_replace(array("\\",'"'),array("\\\\",'\"'), $script)."\")";
		$script = '<script type="text/javascript">/*<![CDATA[*/'.$script.'/*]]>*/</script>';
		
		return new ArrayData(array(
				'Footer1' => $ContactPage->Footer1,
				'Footer2' => $ContactPage->Footer2,
				'EmailTag' => '<span class="email-link">[javascript protected email address]</span>',
				'EmailScript' => $script
		));
	}

	public function getCMSFields(){
		$fields = parent::getCMSFields();
		if($this->ParentID == 0){
			$fields->addFieldToTab('Root.Main', new CheckboxField('IsHeader','Link at Top Menu? (Yes)'),'Content');
		}
		
		return $fields;
	}
}

class Page_Controller extends ContentController {
	
	/**
	 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * <code>
	 * array (
	 *     'action', // anyone can access this action
	 *     'action' => true, // same as above
	 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
	 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
	 * );
	 * </code>
	 *
	 * @var array
	 */
	
	public function init() {
		parent::init();
		
		Requirements::css("https://fonts.googleapis.com/css?family=Raleway:400,600,800");
		Requirements::css("{$this->Themedir()}/css/font-awesome.min.css");
		Requirements::css("{$this->Themedir()}/css/main.css");
		
		Requirements::javascript("https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js");
		Requirements::javascript("{$this->Themedir()}/js/bootstrap.min.js");
		Requirements::javascript("{$this->Themedir()}/js/custom.js");
	}
	
	function ListPagesByType($class) {
		$pages = $class::get();
		return $pages->count() ? $pages : false;
	}
}
