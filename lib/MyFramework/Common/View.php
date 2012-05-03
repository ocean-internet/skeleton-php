<?php
namespace MyFramework\Common;

class View {

	protected $pageTitle = '';
	protected $pageData  = array();
	protected $params;

	protected $Request;
	protected $TemplateEngine;

	public function __construct(Request $Request, TemplateEngine $TemplateEngine) {
		$this->Request        = $Request;
		$this->TemplateEngine = $TemplateEngine;
	}

	public function __set($name, $value) {
		$this->$name = $value;
	}

	public function render() {
		$this->TemplateEngine->pageTitle  = $this->pageTitle;
		$this->TemplateEngine->set($this->pageData);
		$this->TemplateEngine->render($this->Request->controller . DS . $this->Request->action);
	}
}
