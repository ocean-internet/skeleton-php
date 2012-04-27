<?php
namespace MyFramework\Common;

class View {

	protected $heading;
	protected $content;
	
	protected $FrontController;
	
	public function __construct(FrontController $FrontController) {
		$this->FrontController = $FrontController;
	}

	public function __set($name, $value) {
		// do some sanitisation before setting these values...        	
		$this->$name = $value;
	}

	public function render() {
		echo '<h1>' . $this->heading . '</h1>';
		echo '<p>'  . $this->content . '</p>';
		$view = ob_get_clean();
		return $view;
	}
}
