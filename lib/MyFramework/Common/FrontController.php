<?php
namespace MyFramework\Common;

class FrontController {

	protected $View;

	public function __construct(Request $Request, ControllerFactory $ControllerFactory, View $View) {

		$this->Request = $Request;
		$this->ControllerFactory  = $ControllerFactory;
		$this->View    = $View;
	}

	public function dispatch() {

		$Controller = $this->ControllerFactory->route();
		$this->View->pageTitle = $Controller->pageTitle;
		$this->View->pageData  = $Controller->pageData;
	}
}
