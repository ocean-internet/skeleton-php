<?php
namespace MyFramework\Common;

class Request {

	protected $controller;
	protected $action;
	protected $id;
	protected $filter = array();
	protected $server = array();

	public function __construct($server) {
		$this->server = $server;

		$this->extract();
	}

	public function __get($var) {
		return $this->$var;
	}


	protected function extract() {

		// /ypbs2/app/webroot/index.php
		$scriptPath = explode(DS, $this->server['SCRIPT_NAME']);
		// /ypbs2/app/webroot
		array_pop($scriptPath);

		if(!empty($server['REDIRECT_URL'])) {
			// /ypbs2/app/webroot/Behaviours/edit/27
			$redirect = explode(DS, $server['REDIRECT_URL']);
		} else {
			$redirect = explode(DS, $_SERVER['REQUEST_URI']);
		}

		$query = array_merge(array_diff($scriptPath, $redirect), array_diff($redirect, $scriptPath));

		$urlValid = TRUE;
		// extract requested controller
		if(!empty($query)) {

			$controller = array_shift($query);
			$controller = preg_replace('/[^a-zA-Z]/', '', $controller);

			if(preg_match(CAMEL_CASE, $controller)) {
				$this->controller = $controller;
			} else {
				throw new controllerNotValidEexeption($controller);
			}
		}

		// extract requested action
		if(!empty($query)) {

			$action = array_shift($query);
			$action = preg_replace('/[^a-zA-Z]/', '', $action);

			if(preg_match(CAMEL_BACK, $action)) {
				$this->action = $action;
			} else {
				throw new actionNotValidExeption($action);
			}
		}

		// extract id
		if(!empty($query)) {

			$param  = array_shift($query);
			if(strpos($param, ':')) {
				// it's a param, and not an id
				array_unshift($query, $param);
			} else {
				$id = preg_replace('/[^a-zA-Z]/', '', $action);

				if(is_numeric($id) || preg_match(UUID, $id)) {
					$this->id = $id;
				} else {
					throw new idNotValidExeption($id);
				}
			}
		}

		// @TODO: extract filter(s)

	}
}
