<?php

class SupportRequest {
	private $id;
	private $user_id;
	private $institution_id;
	private $content;
	private $added_timestamp;

	public function __construct() {
		$this->id = '';
		$this->user_id = '';
		$this->institution_id = '';
		$this->content = '';
		$this->added_timestamp = '';
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function setUserId($user_id) {
		$this->user_id = $user_id;
	}

	public function setInstitutionId($institution_id) {
		$this->institution_id = $institution_id;
	}

	public function setContent($content) {
		$this->content = $content;
	}

	public function setAddedTimestamp($timestamp) {
		$this->added_timestamp = $timestamp;
	}

	public function getId() {
		return $this->id;
	}

	public function getUserId() {
		return $this->user_id;
	}

	public function getInstitutionId() {
		return $this->institution_id;
	}

	public function getContent() {
		return $this->content;
	}

	public function getAddedTimestamp() {
		return $this->added_timestamp;
	}
}