<?php
namespace Application\Model;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Where;
use Zend\Db\TableGateway\TableGateway;

class ProductTable
{
    protected $tableGateway;
    
    const OFFSET = 0;
    const LIMIT = 10;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }


    public function getFeatureProducts()
    {
        $sql = new Sql($this->tableGateway->getAdapter());

        $select = $sql->select('products');

        $select->offset(self::OFFSET)->limit(self::LIMIT)->order('ProductID DESC');

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
            throw new \Exception("Could not find row $id");
        }
        return $row;
        
    }
}