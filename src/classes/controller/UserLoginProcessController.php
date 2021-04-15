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
		$records = [];
		$retrieved_details;

		$query = SqlQuery::authenticateAdmin();
		$params = array(':username' => $validated_input['username']);
		$result = $db_handle->executeQuery($query, $params);

		if ($db_handle->countRows() == 1) {
			$records = $db_handle->fetch()[0];
			if ($records['admin_password'] === $validated_input['password']) {
				$obj = Creator::createObject('Administrator');
				$obj->setUserId($records['admin_id']);
				$obj->setUsername($records['admin_username']);
				$obj->setFullname($records['admin_fullname']);
				$obj->setPassword($records['admin_password']);
				$obj->setGender($records['admin_gender']);
				$obj->setDob($records['admin_dob']);
				$obj->setBirthPlace($records['admin_birth_place']);
				$obj->setAddedTimestamp($records['admin_added_timestamp']);
	
				$retrieved_details['personal'] = $obj;
				$retrieved_details['institutions'] = $this->loadInstitutions();

				SessionWrapper::setSession('username', $records['admin_username']);

				$view = Creator::createObject('AdministratorView');
				$view->setDetails($retrieved_details);
				$view->addStylesheet(CSS_PATH . 'view.css');
				$view->addScript(JS_PATH . 'view.js');
				$view->create();
				return $view->getHtmlOutput();
			} else {
				return $this->fail();
			}
		} else {
			return $this->fail();
		}
	}

	private function loadInstitutions() {
		$records = [];
		$db_handle = Creator::createDatabaseConnection();
		$query = SqlQuery::selectInstitutions();
		$params = array();
		$result = $db_handle->executeQuery($query, $params);

		if ($db_handle->countRows() == 0) {
			$records = [];
		} else {
			$data = $db_handle->fetch();
			foreach ($data as $item) {
				$obj = Creator::createObject('Institution');
				$obj->setId($item['institution_id']);
				$obj->setName($item['institution_name']);
				$obj->setPhone($item['institution_phone']);
				$obj->setEmail($item['institution_email']);
				$obj->setPassword($item['institution_hashed_password']);
				$obj->setAddress($item['institution_address']);
				$obj->setAddedTimestamp($item['institution_added_timestamp']);
				$obj->setDbName($item['institution_database_name']);
				$obj->setDbDomain($item['institution_domain']);
				array_push($records, $obj);
			}
		}
		
		return $records;
	}

	private function fail() {
		$obj = Creator::createObject('LoginView');
		$obj->addStylesheet(CSS_PATH . 'login.css');
		$obj->create();
		return $obj->getHtmlOutput();
	} 
}