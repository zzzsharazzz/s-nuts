<?php
namespace Application\Model;
use Zend\Db\Sql\Sql;
use Zend\Db\TableGateway\TableGateway;

class CategoryTable{
    public $tableGateway;
    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function getCategory()
    {
        $sql = new Sql($this->tableGateway->getAdapter());
        $select = $sql->select('productcategories');
        $select->order('CategoryID');
        $statement = $sql->prepareStatementForSqlObject($select);
        $result = $statement->execute();
        return $result;
    }
}
