<?php
namespace Application\Model;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Where;
use Zend\Db\TableGateway\TableGateway;

class ProductTable
{
    const OFFSET = 0;
    const LIMIT = 10;

    protected $tableGateway;
    protected $tableName = 'products';

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }


    public function getFeatureProducts()
    {
        $sql = new Sql($this->tableGateway->getAdapter());

        $select = $sql->select($this->tableName);

        $select->where([
            'IsFeatured' => 1
        ])->offset(self::OFFSET)
            ->limit(self::LIMIT)
            ->order('ProductID DESC');

        $statement = $sql->prepareStatementForSqlObject($select);

        $results = $statement->execute();

        return $results;
        
    }
    public function getProductById($id){

        $rowset = $this->tableGateway->select([
            'ProductID' => $id
        ]);

        $row = $rowset->current();
        if (!$row) {
            return false;
        }
        return $row;
        
    }

    public function getProductByCategoryId($categoryId) {
        $result = $this->tableGateway->select([
            'ProductCategoryID' => $categoryId
        ]);

        if (!$result) {
            return false;
        }
        return $result;
    }

    public function fetchAll() {
        return $this->tableGateway->select();
    }
}