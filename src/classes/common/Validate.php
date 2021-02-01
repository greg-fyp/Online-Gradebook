<?php

/**
* Validate.php
*
* This class provides methods which are used to check whether the user input contains malicious content.
*
* @author Greg
*/ 

class Validate {
	public function __construct() {}
	public function __destruct() {}

	public function validateString($data_name, $tainted, $min_length, $max_length) {

		$validated = false;
		if (!empty($tainted[$data_name])) {
			$sanitised = filter_var($tainted[$data_name], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

			if ($min_length <= strlen($sanitised) && strlen($sanitised) <= $max_length) {
				$validated = $sanitised;
			}
		}
		

		return $validated;
	}

	public function check($clean) {
		foreach ($clean as $item) {
			if ($item === false) {
				return true;
			}
		}

		return false;
	}
}