<?php

class RegisterInstitutionPageController extends Controller {
	public function createHtmlOutput() {
		$obj = Creator::createObject('RegisterInstitutionView');
		$obj->addStylesheet(CSS_PATH . 'register.css');
		$obj->addScript(JS_PATH . 'register.js');
		$obj->create();
		$this->html_output = $obj->getHtmlOutput();
	}
}