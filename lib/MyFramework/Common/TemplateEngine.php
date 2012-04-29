<?php
namespace MyFramework\Common;

interface TemplateEngine {
	
	public function set(array $vars);
	
	public function render($template, $layout='default');
}
