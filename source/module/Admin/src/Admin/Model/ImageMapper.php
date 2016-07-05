<?php

namespace Admin\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\HydratingResultSet;

use Admin\Model\CategoryEntity;
 

class ImageMapper
{
	protected $tableName = 'images';
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
		
		$statement = $this->sql->prepareStatementForSqlObject($select->order(['image_id' => 'desc']));
		$results = $statement->execute();
	
		$entityPrototype = new ImageEntity();
		$hydrator = new ClassMethods();
		$resultset = new HydratingResultSet($hydrator, $entityPrototype);
		$resultset->initialize($results);
		$resultset->buffer();
		return $resultset;
	}

	public function getImageById($id)
	{
		$select = $this->sql->select();
		$select->where(array('image_id' => $id));

		$statement = $this->sql->prepareStatementForSqlObject($select);
		$result = $statement->execute()->current();
		if (!$result) {
			return null;
		}

		$hydrator = new ClassMethods();
		$img = new ImageEntity();
		$hydrator->hydrate($result, $img);

		return $img;
	}

	public function deleteImageByProductId($productId)
	{
		$delete = $this->sql->delete();
		$delete->where(['product_id' => $productId]);

		$statement = $this->sql->prepareStatementForSqlObject($delete);
		return $statement->execute();
	}
	
}