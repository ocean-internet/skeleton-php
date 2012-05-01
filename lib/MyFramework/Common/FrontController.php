<?php
namespace MyFramework\Common;

class FrontController {

	protected $View;

	public function __construct(Request $Request, Router $Router, View $View) {

		$this->Request = $Request;
		$this->Router  = $Router;
		$this->View    = $View;
	}

	public function dispatch() {

		$Controller = $this->Router->route();
		$this->View->pageTitle = $Controller->pageTitle;
		$this->View->pageData  = $Controller->pageData;
	}
}
