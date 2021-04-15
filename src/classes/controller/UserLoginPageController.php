<?php

/**
* UserLoginPageController.php
*
* Creates html view for the login page.
*
* @author Greg
*/

class UserLoginPageController extends Controller {
	public function createHtmlOutput() {
		$obj = Creator::createObject('LoginView');
		$obj->addStylesheet(CSS_PATH . 'login.css');
		$obj->create();
		$this->html_output = $obj->getHtmlOutput();
	}
}