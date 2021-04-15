<?php

class TermsController extends Controller {
	public function createHtmlOutput() {
		$obj = Creator::createObject('TermsView');
		$obj->create();
		$this->html_output = $obj->getHtmlOutput();
	}
}