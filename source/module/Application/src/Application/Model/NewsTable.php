<?php
namespace Application\Model;
use Zend\Db\Sql\Sql;
use Zend\Db\TableGateway\TableGateway;

class NewsTable {

    protected $tableGateway;
    protected $tableName = 'news';

    const OFFSET = 1;
    const LIMIT = 3;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function getNews()
    {
        $sql = new Sql($this->tableGateway->getAdapter());
        $select = $sql->select($this->tableName);
        $select->order('news_id DESC');
        $statement = $sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();
        $data = [];
        foreach ($results as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function getNewsById($id)
    {
        try {
            $sql = new Sql($this->tableGateway->getAdapter());
            $select = $sql->select($this->tableName);
            $select->where([
                'news_id' => $id
            ]);
            $statement = $sql->prepareStatementForSqlObject($select);
            $results = $statement->execute();
            return $results->current();
        } catch (\Exception $ex) {
            return false;
        }
    }

}
