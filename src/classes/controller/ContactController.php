<?php

class ContactController extends Controller {
	public function createHtmlOutput() {
		$obj = Creator::createObject('ContactView');
		$obj->addStylesheet(CSS_PATH . 'pricing.css');
		$obj->create();
		$this->html_output = $obj->getHtmlOutput();
	}
}