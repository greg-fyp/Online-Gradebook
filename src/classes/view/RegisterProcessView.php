<?php

class RegisterProcessView extends WelcomeTemplateView {
	
	private $register_result;

	public function __construct() {
		parent::__construct();
		$this->register_result = false;
	}

	public function __destruct() {}

	public function create() {
		$this->page_title = APP_NAME . 'Registration Page';
		$this->createPage();
	}

	public function setResult($b) {
		$this->register_result = $b;
	}

	public function addWelcomePageContent() {
		if (!$this->register_result) {
			$this->html_output .= <<< HTML
				<div style='padding-top: 100px;'>
				<p>Something went wrong. Unable to register new institution.</p>
				</div>
				HTML;
			return;
		} 
		$this->html_output .= <<< HTML
			<div style='padding-top: 100px;'>
			<h3 style='color: green;'>Success!</h3>
			<p style='color: green;'>Your Registration Request is being processed.</p>
			You will be contacted once your institution details have been confirmed.
			</div>
		HTML;
	}
}