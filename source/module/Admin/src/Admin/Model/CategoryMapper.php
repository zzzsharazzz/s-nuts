<?php

namespace Admin\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\HydratingResultSet;

use Admin\Model\CategoryEntity;
 

class CategoryMapper
{
	protected $tableName = 'categories';
	protected $dbAdapter;
	protected $sql;
	
	public function __construct(Adapter $dbAdapter)
	{
		$this->dbAdapter = $dbAdapter;
		$this->sql = new Sql($dbAdapter);
		$this->sql->setTable($this->tableName);
	}
	
	public function fetchAll()
	{
		$select = $this->sql->select();
		
		$statement = $this->sql->prepareStatementForSqlObject($select);
		$results = $statement->execute();
	
		$entityPrototype = new CategoryEntity();
		$hydrator = new ClassMethods();
		$resultset = new HydratingResultSet($hydrator, $entityPrototype);
		$resultset->initialize($results);
		$resultset->buffer();
		return $resultset;
	}
	
	
}