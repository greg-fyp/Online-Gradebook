<?php

class UserLoginProcessController extends Controller {
	public function createHtmlOutput() {
		$login_result = [];
		$validated_input = $this->validate();

		if ($validated_input['error']) {
			$this->html_output = $this->loginUser($validated_input);
		} else {
			$this->html_output = $this->fail();
		} 
	}

	private function validate() {
		$obj = Creator::createObject('Validate');
		$tainted = $_POST;

		$validated['username'] = $obj->validateEmail($tainted, 'user-email');
		$validated['password'] = $obj->validateString('password', $tainted, 5, 30);
		$validated['type'] = $obj->validateString('login_type', $tainted, 3, 11);
		$validated['error'] = $obj->check($validated);

		return $validated;
	}

	private function loginUser($validated_input) {
		$db_handle = null;
		if ($validated_input['type'] === 'user') {
			// todo
			echo 'user';
			$db_handle = Creator::createDatabaseConnection();
		} else if ($validated_input['type'] === 'institution') {
			// todo
			echo 'institution';
			$db_handle = Creator::createDatabaseConnection();
		} else {
			$db_handle = Creator::createDatabaseConnection();
			return $this->loginAdministrator($db_handle, $validated_input);
		}
	}

	private function loginAdministrator($db_handle, $validated_input) {
		$obj = Creator::createObject('Model');
		$obj->setDatabaseHandle($db_handle);

		$login_result = $obj->getAdmin(array('username' => $validated_input['username']));

		if (!$login_result) {
			return $this->fail();
		}

		if ($login_result->getPassword() === $validated_input['password']) {
			$details = [];
			SessionWrapper::setSession('username', $login_result->getUsername());
			$view = Creator::createObject('AdministratorView');
			$view->addStylesheet(CSS_PATH . 'view.css');
			$view->addScript(JS_PATH . 'view.js');

			$details['personal'] = $login_result;
			$details['administrators'] = $obj->getAllAdmins();
			$details['institutions'] = $obj->getAllInstitutions();
			$details['register_requests'] = $obj->getAllRegisterRequests();
			$details['support_requests'] = $obj->getAllSupportRequests();
			$details['quotes'] = $obj->getAllQuotes();

			$view->setDetails($details);
			$view->create();
			return $view->getHtmlOutput();
		} else {
			return $this->fail();
		}
	}

	private function fail() {
		$obj = Creator::createObject('LoginView');
		$obj->addStylesheet(CSS_PATH . 'login.css');
		$obj->create();
		return $obj->getHtmlOutput();
	} 
}