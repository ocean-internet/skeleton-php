<?php
namespace MyFramework\Common;

$CommonLoader    = new \Doctrine\Common\ClassLoader('Doctrine\Common', ROOT . DS . 'doctrine2/common/lib');
$DbalLoader      = new \Doctrine\Common\ClassLoader('Doctrine\DBAL',   ROOT . DS . 'doctrine2/dbal/lib');
$CommonLoader->register();
$DbalLoader->register();

/**
 * Description of DoctrineMapper
 *
 * @author andy
 */
class DoctrineMapper implements Mapper {

	protected $database;

	public function __construct($params) {
		$config = new \Doctrine\DBAL\Configuration();
		$this->database = \Doctrine\DBAL\DriverManager::getConnection($params, $config);
	}

	public function findAll(array $params=array()) {
	}

	public function findById($id, array $params=array()) {
	}
}