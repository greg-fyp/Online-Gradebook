<?php

class Quote {
	private $id;
	private $author;
	private $content;

	public function __construct() {
		$this->id = '';
		$this->author = '';
		$this->content = '';
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function setAuthor($author) {
		$this->author = $author;
	}

	public function setContent($content) {
		$this->content = $content;
	}

	public function getId() {
		return $this->id;
	}

	public function getAuthor() {
		return $this->author;
	}

	public function getContent() {
		return $this->content;
	}
}