<?php
namespace Application\Model;
use Zend\Db\Sql\Sql;
use Zend\Db\TableGateway\TableGateway;

class CategoryTable{

    public $tableGateway;
    protected $tableName = 'productcategories';

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function getCategory()
    {
        $sql = new Sql($this->tableGateway->getAdapter());
        $select = $sql->select($this->tableName);
        $select->order('CategoryID');
        $statement = $sql->prepareStatementForSqlObject($select);
        $result = $statement->execute();
        return $result;
    }


    public function getCategoryById($id)
    {
        $sql = new Sql($this->tableGateway->getAdapter());
        $select = $sql->select($this->tableName);
        $select->where([
           'CategoryID' => $id
        ]);
        $statement = $sql->prepareStatementForSqlObject($select);
        $result = $statement->execute()->current(); 
        return $result;
    }

}
