<?php
namespace Application\Model;
use Zend\Db\Sql\Sql;
use Zend\Db\TableGateway\TableGateway;

class ImageTable{

    public $tableGateway;
    protected $tableName = 'images';

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function getImagesByProductId($productId) {

        $sql = new Sql($this->tableGateway->getAdapter());
        $select = $sql->select($this->tableName);

        $select->where([
            'product_id' => (int)$productId
        ]);

        $statement = $sql->prepareStatementForSqlObject($select);

        $results = $statement->execute();

        $data = [];
        foreach ($results as $item) {
            $data[] = $item;
        }

        return $data;

    }



}
