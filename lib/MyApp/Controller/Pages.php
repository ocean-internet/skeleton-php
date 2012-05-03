<?php
namespace MyApp\Controller;
/**
 * Description of Pages
 *
 * @author andy
 */
class Pages {
	public $pageTitle = 'Welcome';
	public $pageData  = array();

	protected $Request;
	protected $Mapper;

	public function __construct(\MyFramework\Common\Request $Request, \MyFramework\Common\Mapper $Mapper) {
		$this->Request = $Request;
		$this->Mapper  = $Mapper;
		$this->Mapper->dbTable = 'pages';
	}

	public function index() {
		$Pages = $this->Mapper->findAll(array(
			'fields' => array('id', 'title', 'short_title', 'intro')
		));
		$this->pageTitle = 'Pages';
		$this->pageData['Pages'] = $Pages;
		$this->pageData['menu'] = $this->menu();
	}

	public function view($id) {
		$Page = $this->Mapper->findById($id);
		$this->pageTitle = $Page['title'];
		$this->pageData  = $Page;
		$this->pageData['menu'] = $this->menu();
	}

	protected function menu() {
		$Pages = $this->Mapper->findAll(array(
			'fields' => array('id', 'title', 'short_title')
		));
		return $Pages;
	}
}