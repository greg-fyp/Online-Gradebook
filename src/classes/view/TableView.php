<?php

class TableView {
	private $html_output;

	public function __construct() {
		$this->html_output = '<div style="overflow-x: auto;"><table style="width: 100%;">';
	}

	public function addHead(...$cell) {
		$output = '<tr>';
		foreach ($cell as $c) {
			$output .= '<th><div style="font-weight: bold !important;">' . $c . '</div></th>';
		}
		$this->html_output .= $output . '</tr>';
	}

	public function addRow(...$cell) {
		$output = '<tr>';
		foreach ($cell as $c) {
			$output .= '<th>' . $c . '</th>';
		}

		$this->html_output .= $output . '</tr>';
	}

	public function getHtmlOutput() {
		return $this->html_output . '</table></div>';
	}
}