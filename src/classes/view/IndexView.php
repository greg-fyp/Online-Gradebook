<?php

/**
* IndexView.php
*
* Creates a view of the index file.
* 
*
* @author Greg
*/

class IndexView extends TemplateView {
	public function __construct() {
		parent::__construct();
	}

	public function __destruct() {}

	public function create() {
		$this->page_title = APP_NAME . ' Index Page';
		$this->createPage();
	}

	public function addPageContent() {
		$this->html_output .= 'asdf';
	}
}