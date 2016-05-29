<?php
namespace Application\Model;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Where;
use Zend\Db\TableGateway\TableGateway;

class ProductTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }


    public function getFeatureProducts()
    {
        $sql = new Sql($this->tableGateway->getAdapter());

        $select = $sql->select('products');

        $select->offset(0)->limit(10)->order('ProductID DESC');

        $statement = $sql->prepareStatementForSqlObject($select);

        $results = $statement->execute();

        return $results;
        
    }
}