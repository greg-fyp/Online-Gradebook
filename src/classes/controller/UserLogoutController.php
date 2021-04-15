<?php

class UserLogoutController extends Controller {
	public function createHtmlOutput() {
		$this->logout();
		$obj = Creator::createObject('IndexView');
		$obj->addStylesheet(CSS_PATH . 'main.css');
		$obj->create();
		$this->html_output = $obj->getHtmlOutput();
	}

	private function logout() {
		$session = session_id();
		if ($session != '') {
			setcookie ($session, "", time() - 3600);
        	unset($_SESSION);
        	unset($_POST);
        	session_destroy();
        	session_unset();
		}
        
	}
}