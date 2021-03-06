<?php

/**
* Router.php
*
* Determines which code to run for a particular request.
*
* @author Greg
*/

class Router {
	private $html_output;

	public function __construct() {
		$this->html_output = '';
	}

	public function __destruct() {}

	public function route() {
		$output = '';
		$route_name = $this->setRouteName();
		$output = $this->selectController($route_name);

		$this->html_output = $output;

	}

	public function setRouteName(): string {
		if (isset($_POST['route'])) {
			$route = $_POST['route'];
		} else if (isset($_GET['route'])) {
			$route = $_GET['route'];
		} else  {
			$route = 'index';
		}

		return $route;
	}

	/**
	* Calls an appropriate controller for a particular request.
	* 
	* @param route - value sent after submitting an HTML form.
	*
	* @return - html output generated by controller.
	*/
	public function selectController(string $route): string {
		switch ($route) {
			case 'user_login':
				$controller = Creator::createObject('UserLoginPageController');
				break;
			case 'process_login':
				$controller = Creator::createObject('UserLoginProcessController');
				break;
			case 'user_logout':
				$controller = Creator::createObject('UserLogoutController');
				break;
			case 'register':
				$controller = Creator::createObject('RegisterInstitutionPageController');
				break;
			case 'pricing':
				$controller = Creator::createObject('PricingController');
				break;
			case 'contact':
				$controller = Creator::createObject('ContactController');
				break;
			case 'terms':
				$controller = Creator::createObject('TermsController');
				break;
			case 'register_institution':
				$controller = Creator::createObject('RegisterInstitutionController');
				break;
			default:
				$controller = Creator::createObject('IndexController');
		}

		$controller->createHtmlOutput();
		$output = $controller->getHtmlOutput();
		return $output;
	}

	public function getHtmlOutput() {
		return $this->html_output;
	}
}