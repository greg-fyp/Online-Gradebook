<?php

class PricingController extends Controller {
	public function createHtmlOutput() {
		$obj = Creator::createObject('PricingView');
		$obj->addStylesheet(CSS_PATH . 'pricing.css');
		$obj->create();
		$this->html_output = $obj->getHtmlOutput();
	}
}