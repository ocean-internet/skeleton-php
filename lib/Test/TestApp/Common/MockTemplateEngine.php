<?php
namespace TestApp\Common;
/**
 * Description of MockTemplateEngine
 *
 * @author andy
 */
class MockTemplateEngine implements \MyFramework\Common\TemplateEngine {

	public $pageTitle;
	public $pageData;
	public $renderHasBeenCalled;

	public function set(array $pageData) {
		foreach ($pageData as $k => $v) {
			$this->pageData[$k] = $v;
		}
	}

	public function render($template, $layout='default') {
		$this->renderHasBeenCalled = array($template, $layout);
	}
}