<?php
namespace MyFramework\Common;

class FrontController {
	
	protected $Request;
	protected $Response;
	protected $TemplateEngine;

	public function __construct(Request $Request, Response $Response, TemplateEngine $TemplateEngine) {
		$this->Request        = $Request;
		$this->Response       = $Response;
		$this->TemplateEngine = $TemplateEngine;
	}	
	
	public function dispatch() {

		$View = new View($this, $this->TemplateEngine);
		$View->pageTitle = 'Hello World';
		$View->pageData  = array('welcome' => 'Welcome to Skeleton PHP.');

		return $View;	
	}
}
