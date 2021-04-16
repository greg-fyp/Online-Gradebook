<?php

/**
* SqlQuery.php
*
*
* @author Greg
*/

class SqlQuery {
	public function __construct() {}
	public function __destruct() {}

	public static function storeNewRequest() {
		$query = 'INSERT INTO register_requests ';
		$query .= 'SET ';
		$query .= 'content = :content';
		return $query . ';';
	}

	public static function authenticateAdmin() {
		$query = 'SELECT * ';
		$query .= 'FROM administrators WHERE admin_username = :username ';
		$query .= 'LIMIT 1';
		return $query . ';';
	}

	public static function selectInstitutions() {
		$query = 'SELECT * ';
		$query .= 'FROM institutions';
		return $query . ';';
	}

	public static function selectAdmins() {
		$query = 'SELECT * ';
		$query .= 'FROM administrators';
		return $query . ';';
	}

	public static function selectQuotes() {
		$query = 'SELECT * ';
		$query .= 'FROM quotes';
		return $query . ';';
	}

	public static function selectSupportRequests() {
		$query = 'SELECT * ';
		$query .= 'FROM support_requests';
		return $query . ';';
	}

	public static function selectRegisterRequests() {
		$query = 'SELECT * ';
		$query .= 'FROM register_requests';
		return $query . ';';
	}
}