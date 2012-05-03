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

	public $dbTable;

	protected $database;

	public function __construct($params) {
		$config = new \Doctrine\DBAL\Configuration();
		$this->database = \Doctrine\DBAL\DriverManager::getConnection($params, $config);
	}

	public function findAll(array $params=array()) {
		$params = $this->processParams($params);
		$query  =  'SELECT ' . $params['fields'];
		$query .= ' FROM `' . $this->dbTable . '`';
		return $this->database->fetchAll($query);
	}

	public function findById($id, array $params=array()) {
		$params = $this->processParams($params);
		$query  =  'SELECT ' . $params['fields'];
		$query .= ' FROM `' . $this->dbTable . '`';
		$query .= ' WHERE `id` = ' . $this->database->quote($id);
		$query .= ' LIMIT 1';
		$record = $this->database->fetchAll($query);
		return array_pop($record);
	}

	protected function processParams(array $params=array()) {
		if(!empty($params['fields'])) {
			foreach($params['fields'] as $k => $v) {
				$tmp  = '`' . $this->dbTable . '`';
				$tmp .= '.';
				$tmp .= '`' . $v . '`';
				$params['fields'][$k] = $tmp;
			}
			$params['fields'] = implode(', ', $params['fields']);
		} else {
			$params['fields'] = '*';
		}
		return $params;
	}
}