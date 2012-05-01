<?php
namespace MyFramework\Common;

class Request {

	protected $server  = array();

	protected $controller;
	protected $action;
	protected $id;
	protected $filters = array();
	protected $data;
	protected $files;

	public function __construct($server, $post, $files) {
		$this->server = $server;
		$this->data   = $post;
		$this->files  = $files;

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

		// extract requested controller
		if(!empty($query)) {

			$param  = array_shift($query);
			if(strpos($param, ':')) {
				// it's a param, and not an id
				array_unshift($query, $param);
			} else {
				$param = preg_replace('/[^a-zA-Z]/', '', $param);

				if(preg_match(CAMEL_CASE, $param)) {
					$this->controller = $param;
				} else {
					throw new controllerNotValidEexeption($param);
				}
			}
		} else {
			$this->controller = 'Pages';
		}

		// extract requested action
		if(!empty($query)) {

			$param  = array_shift($query);
			if(strpos($param, ':')) {
				// it's a param, and not an id
				array_unshift($query, $param);
			} else {
				$param = preg_replace('/[^a-zA-Z]/', '', $param);

				if(preg_match(CAMEL_BACK, $param)) {
					$this->action = $param;
				} else {
					throw new actionNotValidExeption($param);
				}
			}
		} else {
			$this->action = 'index';
		}

		// extract id
		if(!empty($query)) {

			$param  = array_shift($query);
			if(strpos($param, ':')) {
				// it's a param, and not an id
				array_unshift($query, $param);
			} else {
				$id = preg_replace('/[^a-fA-F0-9\-]/', '', $param);

				if(is_numeric($id) || preg_match(UUID, $id)) {
					$this->id = $id;
				} else {
					throw new idNotValidExeption($id);
				}
			}
		}

		// extract filter(s)
		if(!empty($query)) {
			foreach($query as $param) {
				if(strpos($param, ':')) {

					$param = explode(':', $param, 2);

					if(2 != count($param)) {
						throw new filterNotValidException($param);
					}

					$param[0] = preg_replace('/[^a-zA-Z]/', '', $param[0]);
					if(!preg_match(CAMEL_BACK, $param[0])) {
						throw new filterNotValidException($param);
					}

					$this->filters[$param[0]] = $param[1];
				}
			}
		}

	}
}
