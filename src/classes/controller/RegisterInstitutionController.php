<?php

class RegisterInstitutionController extends Controller {
	public function createHtmlOutput() {
		$validated_input = $this->validate();

		foreach ($validated_input as $item) {
			if ($item === false) {	
				$this->html_output = $this->fail();
				return;
			}
		}

		$flag = $this->addRequest($validated_input);

		if (!$flag) {
			$this->html_output = $this->fail();
		}

		$this->html_output = $this->success();
	}

	private function validate() {
		$obj = Creator::createObject('Validate');
		$tainted = $_POST;

		$validated_input['prefix'] = $obj->validateNumber($tainted, 'prefix', 5);
		$validated_input['firstname'] = $obj->validateString('firstname', $tainted, 3, 30);
		$validated_input['lastname'] = $obj->validateString('lastname', $tainted, 3, 30);
		$validated_input['personal-email'] = $obj->validateEmail($tainted, 'personal-email');
		$validated_input['personal-tel'] = $obj->validateNumber($tainted, 'personal-tel', 15);
		$validated_input['day'] = $obj->validateNumber($tainted, 'day', 2);
		$validated_input['month'] = $obj->validateNumber($tainted, 'month', 2);
		$validated_input['year'] = $obj->validateNumber($tainted, 'year', 4);

		$validated_input['institution-name'] = $obj->validateString('institution-name', $tainted, 3, 30);
		$validated_input['institution-email'] = $obj->validateEmail($tainted, 'institution-email');
		$validated_input['institution-tel'] = $obj->validateNumber($tainted, 'institution-tel', 15);
		$validated_input['addr-line1'] = $obj->validateString('addr-line1', $tainted, 1, 40);
		$validated_input['addr-line2'] = $obj->validateString('addr-line2', $tainted, 1, 40);
		$validated_input['city'] = $obj->validateString('city', $tainted, 1, 30);
		$validated_input['postcode'] = $obj->validateString('postcode', $tainted, 3, 30);
		$validated_input['country'] = $obj->validateString('country', $tainted, 1, 30);

		if ($validated_input['addr-line2'] === false) {
			$validated_input['addr-line2'] = '';
		} 

		return $validated_input;
	}

	private function addRequest($details) {
		$database = Creator::createDatabaseConnection();
		$query = SqlQuery::storeNewRequest();

		$content = 'First Name: ' . $details['firstname'];
		$params = array(':content' => $content);
		$result = $database->executeQuery($query, $params);
		return $result;
	}

	private function fail() {
		$obj = Creator::createObject('RegisterProcessView');
		$obj->setResult(false);
		$obj->create();
		return $obj->getHtmlOutput();
	}

	private function success() {
		$obj = Creator::createObject('RegisterProcessView');
		$obj->setResult(true);
		$obj->create();
		return $obj->getHtmlOutput();
	}
}