<?php 
class ContactAdmin extends ModelAdmin {

	private static $menu_title = 'Contact Messages';

	private static $url_segment = 'contacts';

	private static $managed_models = array (
			'Contact'
	);
	
	private static $menu_icon = 'themes/ski/images/icon-contacts.png';
}
?>