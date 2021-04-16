<?php

class AdministratorView extends TemplateView {

	private $details;

	public function __construct() {
		parent::__construct();
		$this->details = null;
	}

	public function __destruct() {}

	public function setDetails($details) {
		$this->details = $details;
	} 

	public function create() {
		$this->page_title = APP_NAME . 'Admin View';
		$this->createPage();
	}

	public function addPageContent() {
		$target_file = ROOT_PATH;
		$first_name = $this->details['personal']->getFirstname();
		$admin_table = $this->buildAdminTable();
		$institution_table = $this->buildInstitutionTable();
		$register_table = $this->buildRegisterTable();
		$support_table = $this->buildSupportTable();
		$quote_table = $this->buildQuotesTable();

		$this->html_output .= <<< HTML
		<header>
		<nav class="navbar navbar-dark bg-primary fixed-top">
			<div class='navbar-brand ml-1'>Online Gradebook</div>
			<button class="btn btn-primary order-first" type="button" data-toggle="collapse" data-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false" aria-label="navbar switch" onclick="switchNav();">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class='dropdown ml-auto'>
				<button class='btn btn-primary dropdown-toggle' type='button' id='submenu' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class='icon-user'></i>$first_name </button>
				<div class='dropdown-menu dropdown-menu-right' aria-labelledby='submenu'>
					<a class='dropdown-item' href='#'><i class='icon-pencil'></i> Edit Profile</a>
					<a class='dropdown-item' href='#'><i class='icon-key'></i> Change Password</a>
					<div class="dropdown-divider"></div>
					<a class='dropdown-item' href='$target_file?route=user_logout'><i class='icon-logout'></i> Logout</a>
				</div>
			</div>
		</nav>
		</header>
		<nav class='collapse show col-md-4' id='mainmenu'>
		<a href='#'><i class='icon-home'></i>  Home</a>
		<div class='menu-sep'></div>
		<a href='javascript:showAdmins()'><i class='icon-wrench'></i> Administrators</a>
		<a href='javascript:showInstitutions()'><i class='icon-bank'></i> Institutions</a>
		<a href='javascript:showRegs()'><i class='icon-user-plus'></i>  Registration Requests</a>
		<a href='javascript:showSups()'><i class='icon-question-circle-o'></i>  Support Requests</a>
		<a href='javascript:showQuotes()'><i class='icon-quote-right'></i> Quotes</a>
		<a href='#'><i class='icon-database'></i> Databases</a>
		<div class='menu-sep'></div>
		<a href='#'><i class='icon-user'></i> My Details</a>
		<a href="#"><i class='icon-cog-alt'></i>  Settings</a>
		</nav>
		<main>
		<div id='container'>
			<div id='admin'>
				$admin_table
			</div>
			<div id='institution'>
				$institution_table
			</div>
			<div id='r_reqs'>
				$register_table
			</div>
			<div id='s_reqs'>
				$support_table
			</div>
			<div id='quotes'>
				$quote_table
			</div>
		</div>
		</main>
		HTML;
	}

	private function buildAdminTable() {
		$obj = Creator::createObject('TableView');
		$obj->addHead('ID', 'Username', 'Fullname', 'Password', 'Gender', 'DoB', 'Birth Place', 'Added Timestamp', 'Action', 'Action');
		$button_edit = '<button class="btn btn-success m-1">Edit</button>';
		$button_delete = '<button class="btn btn-danger m-1">Delete</button>';

		foreach ($this->details['administrators'] as $item) {
			$obj->addRow($item->getUserId(), $item->getUsername(), $item->getFullname(), $item->getPassword(), $item->getGender(), $item->getDob(), $item->getBirthPlace(), $item->getAddedTimestamp(), $button_edit, $button_delete);
		}

		return $obj->getHtmlOutput();
	}

	private function buildInstitutionTable() {
		$obj = Creator::createObject('TableView');
		$obj->addHead('ID', 'Name', 'Phone', 'Username', 'Password', 'Address', 'Added Timestamp', 'Database Name', 'Domain', 'Action', 'Action');
		$button_edit = '<button class="btn btn-success m-1">Edit</button>';
		$button_delete = '<button class="btn btn-danger m-1">Delete</button>';

		if (empty($this->details['institutions'])) {
			$obj->addRow('-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-');
		} else {
			foreach ($this->details['institutions'] as $item) {
				$obj->addRow($item->getId(), $item->getName(), $item->getPhone(), $item->getEmail(), $item->getPassword(), $item->getAddress(),
				$item->getAddedTimestamp(), $item->getDbName(), $item->getDomain(), $button_edit, $button_delete);
			}	
		}

		return $obj->getHtmlOutput();
	}

	private function buildRegisterTable() {
		$obj = Creator::createObject('TableView');
		$obj->addHead('ID', 'Content', 'Added Timestamp', 'Action', 'Action');
		$button_edit = '<button class="btn btn-success m-1">Edit</button>';
		$button_delete = '<button class="btn btn-danger m-1">Delete</button>';

		if (empty($this->details['register_requests'])) {
			$obj->addRow('-', '-', '-', '-', '-');
		} else {
			foreach ($this->details['register_requests'] as $item) {
				$obj->addRow($item->getId(), $item->getContent(), $item->getAddedTimestamp(), $button_edit, $button_delete);
			}	
		}

		return $obj->getHtmlOutput();
	}

	private function buildSupportTable() {
		$obj = Creator::createObject('TableView');
		$obj->addHead('ID', 'User ID', 'Institution ID', 'Content', 'Added Timestamp', 'Action', 'Action');
		$button_edit = '<button class="btn btn-success m-1">Edit</button>';
		$button_delete = '<button class="btn btn-danger m-1">Delete</button>';

		if (empty($this->details['support_requests'])) {
			$obj->addRow('-', '-', '-', '-', '-', '-', '-');
		} else {
			foreach ($this->details['support_requests'] as $item) {
				$obj->addRow($item->getId(), $item->getUserId(), $item->getInstitutionId(), $item->getContent(), $item->getAddedTimestamp(), 
					$button_edit, $button_delete);
			}	
		}

		return $obj->getHtmlOutput();
	}

	private function buildQuotesTable() {
		$obj = Creator::createObject('TableView');
		$obj->addHead('ID', 'Content', 'Author', 'Action', 'Action');
		$button_edit = '<button class="btn btn-success m-1">Edit</button>';
		$button_delete = '<button class="btn btn-danger m-1">Delete</button>';

		if (empty($this->details['quotes'])) {
			$obj->addRow('-', '-', '-', '-', '-');
		} else {
			foreach ($this->details['quotes'] as $item) {
				$obj->addRow($item->getId(), $item->getContent(), $item->getAuthor(), $button_edit, $button_delete);
			}	
		}

		return $obj->getHtmlOutput();
	}
}