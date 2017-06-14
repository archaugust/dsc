<?php
class ActivityHolder extends Page {
	
	private static $allowed_children = array (
			'ActivityPage'
	);
}

class ActivityHolder_Controller extends Page_Controller {
	
	public function init() {
		parent::init();
		
		Requirements::css("{$this->ThemeDir()}/css/activity.css");
	}
}