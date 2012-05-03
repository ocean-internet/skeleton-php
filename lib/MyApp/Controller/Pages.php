<?php
namespace MyApp\Controller;
/**
 * Description of Pages
 *
 * @author andy
 */
class Pages {
	public $pageTitle = 'Hello World.';
	public $pageData  = array('welcome' => 'Welcome to my world...');

	protected $Request;
	protected $Mapper;

	public function __construct(\MyFramework\Common\Request $Request, \MyFramework\Common\Mapper $Mapper) {
		$this->Request = $Request;
		$this->Mapper  = $Mapper;
	}

	public function index($id) {
		$this->Mapper->findAll();
	}
}