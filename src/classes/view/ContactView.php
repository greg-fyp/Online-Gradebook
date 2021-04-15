<?php

class ContactView extends WelcomeTemplateView {
	public function __construct() {
		parent::__construct();
	}

	public function create() {
		$this->page_title = APP_NAME . ' Contact Us';
		$this->createPage();
	}

	public function addWelcomePageContent() {
		$this->html_output .= <<< HTML
		<div id='content-wrap'>
			<div id='banner' style='padding-bottom: 10px;'>
				<h1>Contact Us</h1>
			</div>
			<div class='card-deck mb-3'>
					<div class='card mb-4 box-shadow'>
						<div class='card-header'>
							<h4 class="my-0 font-weight-normal">Telephone</h4>
						</div>
						<div class='card-body'>
							<h1 class='card-title pricing-card-title'><small class='text-muted'>+44 1112223334</small></h1>
							<ul class='list-unstyled mt-3 mb-4'>
								<li>Monday - Friday</li>
								<li>8.00 - 15.00</li>
							</ul>
						</div>
					</div>
				</div>
					<div class='card mb-4 box-shadow'>
						<div class='card-header'>
							<h4 class="my-0 font-weight-normal">Email</h4>
						</div>
						<div class='card-body'>
							<h1 class='card-title pricing-card-title'><small class='text-muted'>gradebook@example.com</small></h1>
							<ul class='list-unstyled mt-3 mb-4'>
								<li>We respond within 7 working days</li>
							</ul>
						</div>
					</div>
			</div>
		HTML;
	}
}