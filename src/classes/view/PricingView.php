<?php

class PricingView extends WelcomeTemplateView {
	public function __construct() {
		parent::__construct();
	}

	public function __destruct() {}

	public function create() {
		$this->page_title = APP_NAME . ' Pricing';
		$this->createPage();
	}

	public function addWelcomePageContent() {
		$target_file = ROOT_PATH;
		$this->html_output .= <<< HTML
			<div id='content-wrap'>
				<div class='card-deck mb-3'>
					<div class='card mb-4 box-shadow'>
						<div class='card-header'>
							<h4 class="my-0 font-weight-normal">Basic</h4>
						</div>
						<div class='card-body'>
							<h1 class='card-title pricing-card-title'>£4,000<small class='text-muted'>/ per month</small></h1>
							<ul class='list-unstyled mt-3 mb-4'>
								<li>Up to 5 000 Users</li>
								<li>24/7 support</li>
								<li>Secure data storage</li>
							</ul>
							<button type='button' class='btn btn-success btn-lg'>
								<a href='$target_file?route=contact' style='color: white; text-decoration: none;'>Contact Us</a>
							</button>
						</div>
					</div>
				</div>
					<div class='card mb-4 box-shadow'>
						<div class='card-header'>
							<h4 class="my-0 font-weight-normal">Advanced</h4>
						</div>
						<div class='card-body'>
							<h1 class='card-title pricing-card-title'>£7,000<small class='text-muted'>/ month</small></h1>
							<ul class='list-unstyled mt-3 mb-4'>
								<li>Up to 10 000 Users</li>
								<li>24/7 support</li>
								<li>Secure data storage</li>
							</ul>
							<button type='button' class='btn btn-success btn-lg'>
								<a href='$target_file?route=contact' style='color: white; text-decoration: none;'>Contact Us</a>
							</button>
						</div>
						
					</div>
					<div class='card mb-4 box-shadow'>
						<div class='card-header'>
							<h4 class="my-0 font-weight-normal">Pro</h4>
						</div>
						<div class='card-body'>
							<h1 class='card-title pricing-card-title'>£10,000<small class='text-muted'>/ month</small></h1>
							<ul class='list-unstyled mt-3 mb-4'>
								<li>Unlimited number of Users</li>
								<li>24/7 support</li>
								<li>Secure data storage</li>
							</ul>
							<button type='button' class='btn btn-success btn-lg'>
								<a href='$target_file?route=contact' style='color: white; text-decoration: none;'>Contact Us</a>
							</button>
						</div>
						
					</div>
				</div>
		HTML;
	}
}