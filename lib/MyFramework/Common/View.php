<?php
namespace MyFramework\Common;

class View {

	protected $heading;
	protected $content;
	
	protected $FrontController;
	
	public function __construct(FrontController $FrontController) {
		$this->FrontController = $FrontController;
		require_once(SMARTY_DIR . 'Smarty.class.php');
		$smarty = new \Smarty();
		$smarty->template_dir = ROOT . DS . APP_DIR . DS . 'tmp' . DS . 'smarty' . DS . 'templates' . DS;
		$smarty->compile_dir  = ROOT . DS . APP_DIR . DS . 'tmp' . DS . 'smarty' . DS . 'templates_c' . DS;
		$smarty->config_dir   = ROOT . DS . APP_DIR . DS . 'tmp' . DS . 'smarty' . DS . 'configs' . DS;
		$smarty->cache_dir    = ROOT . DS . APP_DIR . DS . 'tmp' . DS . 'smarty' . DS . 'cache' . DS;
		
		$this->smarty = $smarty;
	}

	public function __set($name, $value) {
		// do some sanitisation before setting these values...        	
		$this->$name = $value;
	}

	public function render() {
		$this->smarty->assign('pageTitle',   $this->heading);
		$this->smarty->assign('pageContent', $this->content);
		ob_start();
		$this->smarty->display(TEMPLATES_DIR . DS . 'Layouts' . DS . 'default.tpl');
		$view = ob_get_clean();		
		print $view;
	}
}
