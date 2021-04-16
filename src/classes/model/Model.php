<?php

class Model {
	private $db_handle;

	public function __construct() {
		$this->db_handle = null;
	}

	public function __destruct() {}

	public function setDatabaseHandle($db_handle) {
		$this->db_handle = $db_handle;
	}

	public function getAllAdmins() {
		$records = [];
		$query = SqlQuery::selectAdmins();
		$params = [];
		$result = $this->db_handle->executeQuery($query, $params);

		$data = $this->db_handle->fetch();
		foreach ($data as $item) {
			$obj = Creator::createObject('Administrator');
			$obj->setUserId($item['admin_id']);
			$obj->setUsername($item['admin_username']);
			$obj->setFullname($item['admin_fullname']);
			$obj->setPassword($item['admin_password']);
			$obj->setGender($item['admin_gender']);
			$obj->setDob($item['admin_dob']);
			$obj->setBirthPlace($item['admin_birth_place']);
			$obj->setAddedTimestamp($item['admin_added_timestamp']);
			array_push($records, $obj);
		}

		return $records;
	}

	public function getAllQuotes() {
		$records = [];
		$query = SqlQuery::selectQuotes();
		$params = array();
		$result = $this->db_handle->executeQuery($query, $params);

		$data = $this->db_handle->fetch();
		foreach ($data as $item) {
			$obj = Creator::createObject('Quote');
			$obj->setId($item['quote_id']);
			$obj->setAuthor($item['quote_author']);
			$obj->setContent($item['quote_content']);
			array_push($records, $obj);
		}

		return $records;
	}

	public function getAllRegisterRequests() {
		$records = [];
		$query = SqlQuery::selectRegisterRequests();
		$params = array();
		$result = $this->db_handle->executeQuery($query, $params);

		$data = $this->db_handle->fetch();
		foreach ($data as $item) {
			$obj = Creator::createObject('RegisterRequest');
			$obj->setId($item['request_id']);
			$obj->setContent($item['content']);
			$obj->setAddedTimestamp($item['request_timestamp']);
			array_push($records, $obj);
		}

		return $records;
	}

	public function getAllInstitutions() {
		$records = [];
		$query = SqlQuery::selectInstitutions();
		$params = array();
		$result = $this->db_handle->executeQuery($query, $params);

		$data = $this->db_handle->fetch();
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
		
		return $records;
	}

	public function getAllSupportRequests() {
		$records = [];
		$query = SqlQuery::selectSupportRequests();
		$params = array();
		$result = $this->db_handle->executeQuery($query, $params);

		$data = $this->db_handle->fetch();
		foreach ($data as $item) {
			$obj = Creator::createObject('SupportRequests');
			$obj->setId($item['request_id']);
			$obj->setUserId($item['user_id']);
			$obj->setInstitutionId($item['institution_id']);
			$obj->setContent($item['content']);
			$obj->setAddedTimestamp($item['request_timestamp']);
			array_push($records, $obj);
		}

		return $records;
	}

	public function getAdmin($params) {
		$query = SqlQuery::authenticateAdmin();
		$result = $this->db_handle->executeQuery($query, $params);

		if ($this->db_handle->countRows() == 1) {
			$data = $this->db_handle->fetch()[0];
			$obj = Creator::createObject('Administrator');
			$obj->setUserId($data['admin_id']);
			$obj->setUsername($data['admin_username']);
			$obj->setFullname($data['admin_fullname']);
			$obj->setPassword($data['admin_password']);
			$obj->setGender($data['admin_gender']);
			$obj->setDob($data['admin_dob']);
			$obj->setBirthPlace($data['admin_birth_place']);
			$obj->setAddedTimestamp($data['admin_added_timestamp']);
			return $obj;
		} else {
			return false;
		}
	}

}