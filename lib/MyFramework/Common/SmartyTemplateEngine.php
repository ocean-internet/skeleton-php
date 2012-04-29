<?php
namespace MyFramework\Common;

class SmartyTemplateEngine implements TemplateEngine {
	
	public    $pageTitle;
	protected $pageContent;
	protected $Smarty;

	public function __construct(\Smarty $Smarty) {
		$Smarty->template_dir = TMP_DIR . DS . 'smarty' . DS . 'templates' . DS;
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
		ob_start();
		$this->Smarty->display(TEMPLATES_DIR . DS . $template . '.tpl');
		$this->pageContent = ob_get_clean();
		
		$this->Smarty->assign('pageTitle',   $this->pageTitle);
		$this->Smarty->assign('pageContent', $this->pageContent);
		$this->Smarty->display(TEMPLATES_DIR . DS . 'Layouts' . DS . 'default.tpl');
	}
}