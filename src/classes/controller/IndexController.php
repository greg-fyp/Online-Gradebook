<?php

/**
* IndexController.php
*
* Creates html view for the index file.
*
* @author Greg
*/

class IndexController extends Controller {
	public function createHtmlOutput() {
		$obj = Creator::createObject('IndexView');
		$obj->create();
		$this->html_output = $obj->getHtmlOutput();
	}
}