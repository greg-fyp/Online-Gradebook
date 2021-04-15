<?php

class Institution {
	private $id;
	private $name;
	private $phone;
	private $email;
	private $password;
	private $address;
	private $added_timestamp;
	private $db_name;
	private $db_domain;

	public function __construct() {
		$this->id = '';
		$this->name = '';
		$this->phone = '';
		$this->email = '';
		$this->password = '';
		$this->address = '';
		$this->added_timestamp = '';
		$this->db_name = '';
		$this->db_domain = '';
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function setName($name) {
		$this->name = $name;
	}

	public function setPhone($phone) {
		$this->phone = $phone;
	}

	public function setEmail($email) {
		$this->email = $email;
	}

	public function setPassword($password) {
		$this->password = $password;
	}

	public function setAddress($address) {
		$this->address = $address;
	}

	public function setAddedTimestamp($timestamp) {
		$this->added_timestamp = $timestamp;
	}

	public function setDbName($db_name) {
		$this->db_name = $db_name;
	}

	public function setDbDomain($db_domain) {
		$this->db_domain = $db_domain;
	}

	public function getId() {
		return $this->id;
	}

	public function getName() {
		return $this->name;
	}

	public function getPhone() {
		return $this->phone;
	}

	public function getEmail() {
		return $this->email;
	}

	public function getPassword() {
		return $this->password;
	}

	public function getAddress() {
		return $this->address;
	}

	public function getAddedTimestamp() {
		return $this->added_timestamp;
	}

	public function getDbName() {
		return $this->db_name;
	}

	public function getDbDomain() {
		return $this->db_domain;
	}
}