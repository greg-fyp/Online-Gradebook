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

	public function validateString($name, $tainted, $min_length, $max_length) {

		$validated = false;
		if (!empty($tainted[$name])) {
			$sanitised = filter_var($tainted[$name], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

			if ($min_length <= strlen($sanitised) && strlen($sanitised) <= $max_length) {
				$validated = $sanitised;
			}
		}
		

		return $validated;
	}

	public function validateNumber($tainted, $name, $max) {
        $validated = false;
        if (!empty($tainted[$name])) {
        	$value = $tainted[$name];
        	if (ctype_digit($value) && strlen($value) <= $max) {
            	$validated = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
        	}
        }
        
        return $validated;
    }

    public function validateEmail($tainted, $name) {
    	$validated = false;
    	if (!empty($tainted[$name])) {
    		$sanitised = filter_var($tainted[$name], FILTER_SANITIZE_EMAIL);
    		$validated = filter_var($sanitised, FILTER_VALIDATE_EMAIL);
    	}

    	return $validated; 
    }

	public function check($clean) {
		foreach ($clean as $item) {
			if ($item === false) {
				return false;
			}
		}

		return true;
	}
}