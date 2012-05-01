<?php

namespace MyFramework\Common;

require_once dirname(__FILE__) . '/../../../../lib/MyFramework/Common/Request.php';

/**
 * Test class for Request.
 * Generated by PHPUnit on 2012-05-01 at 22:10:56.
 */
class RequestTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @var Request
	 */
	protected $object;

	/**
	 * @covers MyFramework\Common\Request::__get
	 * @todo Implement test__get().
	 */
	public function testEmptyConstruct() {
		// act
		$this->object = new Request(NULL, NUll, NULL);

		$this->assertEquals($this->object->controller, 'Pages', 'controller set to default: Pages');
		$this->assertEquals($this->object->action,     'index', 'action set to default: index');
		$this->assertEquals($this->object->id,         NULL,    'id set to null');
		$this->assertEquals($this->object->filters,    array(), 'filters set to empty array');
	}

}

?>
