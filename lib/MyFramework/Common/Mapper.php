<?php
namespace MyFramework\Common;
/**
 * Description of Mapper
 *
 * @author andy
 */
interface Mapper {

	public function findAll(array $conditions=array());

	public function findById($id, array $conditions=array());
}