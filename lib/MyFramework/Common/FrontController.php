<?php
namespace MyFramework\Common;

class FrontController {

	protected $View;

	public function __construct(Request $Request, View $View) {

		$this->View = $View;
	}

	public function dispatch() {

		$this->View->pageTitle = 'Hello World';
		$this->View->pageData  = array('welcome' => 'Welcome to Skeleton PHP.');
	}
}
