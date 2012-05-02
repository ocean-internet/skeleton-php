<?php
namespace TestApp\Controller;

class Pages {

	public $indexRun;

	public function index($id) {
		$this->indexRun = 'index run with id: ' . $id;
	}
}
