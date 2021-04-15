<?php

abstract class User {
	private $userId;
	private $username;
	private $fullname;
	private $password;
	private $gender;
	private $dob;
	private $birth_place;
	private $added_timestamp;

	public function __construct() {
		$this->userId = '';
		$this->username = '';
		$this->fullname = '';
		$this->password = '';
		$this->gender = '';
		$this->dob = '';
		$this->birth_place = '';
		$this->added_timestamp = '';
	}

	public function setUserId($id) {
		$this->userId = $id;
	}

	public function setUsername($uname) {
		$this->username = $uname;
	}

	public function setFullname($fname) {
		$this->fullname = $fname;
	}

	public function setPassword($pass) {
		$this->password = $pass;
	}

	public function setGender($gnd) {
		$this->gender = $gnd;
	} 

	public function setDob($d) {
		$this->dob = $d;
	}

	public function setBirthPlace($birth) {
		$this->birth_place = $birth;
	}

	public function setAddedTimestamp($timestamp) {
		$this->added_timestamp = $timestamp;
	}

	public function getUserId() {
		return $this->userId;
	}

	public function getUsername() {
		return $this->username;
	} 

	public function getFullname() {
		return $this->fullname;
	}

	public function getPassword() {
		return $this->password;
	}

	public function getGender() {
		return $this->gender;
	}

	public function getDob() {
		return $this->dob;
	}

	public function getBirthPlace() {
		return $this->birth_place;
	}

	public function getAddedTimestamp() {
		return $this->added_timestamp;
	}

	public function getFirstname() {
		return strtok($this->fullname, ' ');
	}

}