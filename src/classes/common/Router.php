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
		} else {
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
				$controller = Creator::createObject('UserLogoutProcessController');
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