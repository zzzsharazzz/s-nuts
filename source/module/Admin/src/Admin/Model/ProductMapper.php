<?php

namespace Admin\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\HydratingResultSet;

class ProductMapper
{
    protected $tableName = 'products';
    protected $dbAdapter;
    protected $sql;

    public function __construct(Adapter $dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
        $this->sql = new Sql($dbAdapter);
        $this->sql->setTable($this->tableName);
    }

    public function fetchAll($conditions = null, $like = null)
    {
        $select = $this->sql->select();
        if($conditions) {
            $select->where($conditions);
        }
        if($like) {
            $select->where($like);
        }
        $statement = $this->sql->prepareStatementForSqlObject($select->order(['product_id' => 'desc']));
        $results = $statement->execute();
        $entityPrototype = new ProductEntity();
        $hydrator = new ClassMethods();
        $resultset = new HydratingResultSet($hydrator, $entityPrototype);
        $resultset->initialize($results);
        $resultset->buffer();
        return $resultset;
    }

    public function getProductById($id)
    {
        $select = $this->sql->select();
        $select->where(array('product_id' => $id));
        $statement = $this->sql->prepareStatementForSqlObject($select);
        $result = $statement->execute()->current();
        if (!$result) {
            return null;
        }
        $hydrator = new ClassMethods();
        $product = new ProductEntity();
        $hydrator->hydrate($result, $product);
        return $product;
    }

}