<?php
namespace MyFramework\Common;

class Router {

	protected $Request;

	public function __construct(Request $Request) {
		$this->Request = $Request;
	}

	public function route() {
		$class = 'MyApp\Controller\\' . $this->Request->controller;
		if(!class_exists($class)) {
			throw new invalidClassException($class);
		}

		$Controller = new $class;

		$method = $this->Request->action;
		if(!method_exists($Controller, $method)) {
			throw new invalidMethodExeption($method);
		}

		$Controller->Request = $this->Request;

		if(!$Controller->$method($this->Request->id)) {
			throw new controllerActionReturnedFalseException();
		}
		return $Controller;
	}
}