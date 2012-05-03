<?php
namespace MyFramework\Common;

class ControllerFactory {

	protected $Request;
	protected $Mapper;

	public function __construct(Request $Request, Mapper $Mapper) {
		$this->Request = $Request;
		$this->Mapper  = $Mapper;
	}

	public function route() {
		$classFile = APP_DIR . DS . 'Controller' . DS . $this->Request->controller . '.php';
		if(!file_exists($classFile)) {
			throw new \MyFramework\Exception\InvalidControllerFileException($classFile);
		}

		$class = APP_NAME . '\Controller\\' . $this->Request->controller;
		if(!class_exists($class)) {
			throw new \MyFramework\Exception\InvalidControllerClassException($class);
		}

		$Controller = new $class($this->Request, $this->Mapper);

		$method = $this->Request->action;
		if(!method_exists($Controller, $method)) {
			throw new \MyFramework\Exception\InvalidControllerMethodException($method);
		}

		$Controller->$method($this->Request->id);

		return $Controller;
	}
}