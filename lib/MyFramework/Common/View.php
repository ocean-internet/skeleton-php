<?php
namespace MyFramework\Common;

class View {

	protected $pageTitle;
	protected $pageData;
	
	protected $FrontController;
	protected $TemplateEngine;


	public function __construct(FrontController $FrontController, TemplateEngine $TemplateEngine) {
		$this->FrontController = $FrontController;
		$this->TemplateEngine  = $TemplateEngine;
	}

	public function __set($name, $value) {
		// do some sanitisation before setting these values...        	
		$this->$name = $value;
	}

	public function render() {
		$this->TemplateEngine->pageTitle  = $this->pageTitle;
		$this->TemplateEngine->set($this->pageData);
		$this->TemplateEngine->render('Pages' . DS . 'home');
	}
}
