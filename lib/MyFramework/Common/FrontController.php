<?php
namespace MyFramework\Common;

class FrontController {
	
	protected $Request;
	protected $Response;

	public function __construct(Request $Request, Response $Response) {
		$this->Request  = $Request;
		$this->Response = $Response;
	}	
	
	public function dispatch() {

		$View = new View($this);
		$View->heading = 'Hello World';
		$View->content = 'This is a test...!';

		return $View;	
	}
}
