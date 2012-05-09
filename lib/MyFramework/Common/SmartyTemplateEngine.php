<?php
namespace MyFramework\Common;

class SmartyTemplateEngine implements TemplateEngine {

	public    $pageTitle;
	protected $pageContent;
	protected $Smarty;

	public function __construct(\Smarty $Smarty) {
		$Smarty->template_dir = APP_DIR . DS . 'View' . DS;
		$Smarty->compile_dir  = TMP_DIR . DS . 'smarty' . DS . 'templates_c' . DS;
		$Smarty->config_dir   = TMP_DIR . DS . 'smarty' . DS . 'configs' . DS;
		$Smarty->cache_dir    = TMP_DIR . DS . 'smarty' . DS . 'cache' . DS;

		$this->Smarty = $Smarty;
	}

	public function set(array $pageData) {
		foreach ($pageData as $k => $v) {
			$this->Smarty->assign($k, $v);
		}
	}

	public function render($template, $layout='default') {
		$this->pageContent = $this->Smarty->fetch(TEMPLATES_DIR . DS . $template . '.tpl');

		$this->Smarty->assign('pageTitle',   $this->pageTitle);
		$this->Smarty->assign('pageContent', $this->pageContent);
		$this->Smarty->display(TEMPLATES_DIR . DS . 'Layouts' . DS . 'default.tpl');
	}
}