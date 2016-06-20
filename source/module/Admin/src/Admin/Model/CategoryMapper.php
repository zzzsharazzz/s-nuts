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

	public function getCategoryById($id)
	{
		$select = $this->sql->select();
		$select->where(array('category_id' => $id));

		$statement = $this->sql->prepareStatementForSqlObject($select);
		$result = $statement->execute()->current();
		if (!$result) {
			return null;
		}

		$hydrator = new ClassMethods();
		$cat = new CategoryEntity();
		$hydrator->hydrate($result, $cat);

		return $cat;
	}

	public function saveCategory(CategoryEntity $cat)
	{
		$hydrator = new ClassMethods();
		$data = $hydrator->extract($cat);

		if ($cat->getCategoryId()) {
			// update action
			$action = $this->sql->update();
			$action->set($data);
			$action->where(array('category_id' => $cat->getCategoryId()));
		} else {
			// insert action
			$action = $this->sql->insert();
			unset($data['category_id']);
			$action->values($data);
		}
		$statement = $this->sql->prepareStatementForSqlObject($action);
		$result = $statement->execute();

		if (!$cat->getCategoryId()) {
			$cat->setCategoryId($result->getGeneratedValue());
		}
		return $result;

	}

	public function deleteCategory($id)
	{
		$delete = $this->sql->delete();
		$delete->where(array('category_id' => $id));

		$statement = $this->sql->prepareStatementForSqlObject($delete);
		return $statement->execute();
	}
	
	
}