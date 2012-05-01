<?php
namespace MyFramework\Common;

class View {

	protected $pageTitle = '';
	protected $pageData  = array();

	protected $TemplateEngine;


	public function __construct(TemplateEngine $TemplateEngine) {
		$this->TemplateEngine  = $TemplateEngine;
	}

	public function __set($name, $value) {
		// do some sanitisation before setting these values...
		$this->$name = $value;
	}

	public function __get($value) {
		return $this->$value;
	}

	public function render() {
		$this->TemplateEngine->pageTitle  = $this->pageTitle;
		$this->TemplateEngine->set($this->pageData);
		$this->TemplateEngine->render('Pages' . DS . 'home');
	}
}
