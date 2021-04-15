<?php

class RegisterInstitutionView extends WelcomeTemplateView {
	public function __construct() {
		parent::__construct();
	}

	public function __destruct() {}

	public function create() {
		$this->page_title = APP_NAME . 'Registration Page';
		$this->createPage();
	}

	public function addWelcomePageContent() {
		$target_file = ROOT_PATH;
		$this->html_output .= <<< HTML
		<div id='content-wrap'>
			<h1 class='pb-1'>Register Institution</h1>
			<div style='border-top: 1px solid lightgray; padding-bottom: 20px;'></div>
			<form method='post' action=$target_file name='register'>
			<div class='row'>
				<div class='col-lg-6'>
					<h4><i class='icon-user'></i> Personal Deatils</h4>
					<select required name='prefix' class='form-control m-2 mt-4' required>
						<option value='' selected disabled>Select Prefix*</option>
						<option value='1'>Dr.</option>
						<option value='2'>Mr.</option>
						<option value='3'>Mrs.</option>
						<option value='4'>Ms.</option>
					</select>
					<div class='row mt-2 mb-2'>
						<div class='col-lg-6'>
							<input type='text' name='firstname' placeholder="First Name*" class='form-control m-2'
							required pattern='[a-zA-Z]+'>
						</div>
						<div class='col-lg-6'>
							<input type='text' name='lastname' placeholder="Last Name*" class='form-control m-2'
							required pattern='[A-Za-z]+'>
						</div>
					</div>
					<input type='email' name='personal-email' placeholder='Personal Email Address*' class='form-control m-2' required>
					<input type='tel' name='personal-tel' placeholder='Personal Phone Number*' class='form-control m-2 mt-3' 
					required pattern='[0-9]+'>
					<h5>Date Of Birth</h5>
					<div class='row'>
						<div class='col-lg-4'>
							<input type='text' name='day' placeholder='DD' class='form-control m-2' required pattern='[0-9]{2}'>
						</div>
						<div class='col-lg-4'>
							<input type='text' name='month' placeholder='MM' class='form-control m-2' required pattern='[0-9]{2}'>
						</div>
						<div class='col-lg-4'>
							<input type='text' name='year' placeholder='YYYY' class='form-control m-2' required pattern='[0-9]{4}'>
						</div>
					</div>
				</div>
				<div class='col-lg-6'>
					<h4><i class='icon-bank'></i> Institution Details</h4>
					<input type='text' name='institution-name' placeholder='Institution Name*' class='form-control m-2 mt-4' required>
					<input type='email' name='institution-email' placeholder='Institution Email Address*' class='form-control m-2' required>
					<input type='tel' name='institution-tel' placeholder='Institution Telephone Number*' class='form-control m-2'
					required pattern='[0-9]+'>
					<input type='text' name='addr-line1' placeholder='Address Line 1*' class='form-control m-2' required>
					<input type='text' name='addr-line2' placeholder='Address Line 2' class='form-control mt-2 ml-2 mr-2'>
					<div class='row'>
						<div class='col-lg-4'>
							<input type='text' name='postcode' placeholder='Postcode*' class='form-control m-2' required>
						</div>
						<div class='col-lg-4'>
							<input type='text' name='city' placeholder='City*' class='form-control m-2' required pattern='[A-Za-z]+'>
						</div>
						<div class='col-lg-4'>
							<input type='text' name='country' placeholder='Country*' class='form-control m-2' required pattern='[A-Za-z]+'>
						</div>
					</div>
				</div>
			</div>
			<button type='submit' name='route' value='register_institution' class='btn btn-info'>Submit</button>
			</form>
		</div>
		HTML;
	}
}