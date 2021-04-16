<?php

class RegisterRequest {
	private $id;
	private $added_timestamp;
	private $content;

	public function __construct() {
		$this->id = '';
		$this->added_timestamp = '';
		$this->content = '';
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function setAddedTimestamp($timestamp) {
		$this->added_timestamp = $timestamp;
	}

	public function setContent($content) {
		$this->content = $content;
	}

	public function getId() {
		return $this->id;
	}

	public function getAddedTimestamp() {
		return $this->added_timestamp;
	}

	public function getContent() {
		return $this->content;
	}
}