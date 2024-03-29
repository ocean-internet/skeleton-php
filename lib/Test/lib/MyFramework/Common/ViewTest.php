<?php

namespace MyFramework\Common;

require_once FRAMEWORK_DIR . DS . 'Common' . DS . 'View.php';

/**
 * Test class for View.
 * Generated by PHPUnit on 2012-05-03 at 11:13:00.
 */
class ViewTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @covers MyFramework\Common\View::__set
	 * @todo Implement test__set().
	 */
	public function testSetAndGet() {
		$Request = new Request(NULL, NULL, NULL);
		$MockTemplateEngine = new \TestApp\Common\MockTemplateEngine;
		$View = new View($Request, $MockTemplateEngine);

		$View->testVar = 'abc123';
		$testVar       = $View->testVar;
		$this->assertEquals('abc123', $testVar, 'View::testVar set then get(ed).');
	}

	/**
	 * @covers MyFramework\Common\View::render
	 * @todo Implement testRender().
	 */
	public function testRender() {
		// arrange
		$Request = new Request(NULL, NULL, NULL);
		$MockTemplateEngine = new \TestApp\Common\MockTemplateEngine;
		$View = new View($Request, $MockTemplateEngine);

		$View->pageTitle = 'This is the page title.';
		$View->pageData  = array('someData' => 'This is some page data.');

		// act
		$View->render();

		// assert
		$this->assertEquals(
			array('Pages' . DS . 'index', 'default'),
			$MockTemplateEngine->renderHasBeenCalled,
			''
		);
	}

}