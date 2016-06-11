<?php
namespace Application\Model;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Where;
use Zend\Db\TableGateway\TableGateway;

class ProductTable
{
    const OFFSET = 0;
    const LIMIT = 9;

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
            'is_featured' => 1
        ])->offset(self::OFFSET)
            ->limit(self::LIMIT)
            ->order('product_id DESC');

        $statement = $sql->prepareStatementForSqlObject($select);

        $results = $statement->execute();

        return $results;
        
    }
    public function getProductById($id){

        $sql = new Sql($this->tableGateway->getAdapter());

        $select = $sql->select($this->tableName);

        $select->where([
            'product_id' => $id
        ]);

        $statement = $sql->prepareStatementForSqlObject($select);

        $result = $statement->execute()->current();

        return $result;
        
    }

    public function getProductByCategoryId($categoryId) {
        $sql = new Sql($this->tableGateway->getAdapter());

        $select = $sql->select($this->tableName);

        $select->where([
            'category_id' => $categoryId
        ]);

        $statement = $sql->prepareStatementForSqlObject($select);

        $results = $statement->execute();

        $data = [];

        foreach ($results as $row) {
            $data[] = $row;
        }

        return $data;
    }

    public function fetchAll() {
        $sql = new Sql($this->tableGateway->getAdapter());

        $select = $sql->select($this->tableName);

        $statement = $sql->prepareStatementForSqlObject($select);

        $results = $statement->execute();

        $data = [];

        foreach ($results as $row) {
            $data[] = $row;
        }

        return $data;
    }

    public function getRecommendedProducts()
    {
        $sql = new Sql($this->tableGateway->getAdapter());

        $select = $sql->select($this->tableName);

        $select->where([
            'is_recommended' => 1
        ])->offset(self::OFFSET)
            ->limit(self::LIMIT)
            ->order('product_id DESC');

        $statement = $sql->prepareStatementForSqlObject($select);

        $results = $statement->execute();

        return $results;

    }

}