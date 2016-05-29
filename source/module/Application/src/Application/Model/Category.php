<?php
namespace Application\Model;

class Category
{
    public $CategoryID;
    public $CategoryName;

    public function exchangeArray($data)
    {
        $this->CategoryID = (!empty($data['CategoryID']))?$data['CategoryID']:null;
        $this->CategoryID = (!empty($data['CategoryName']))?$data['CategoryName']:null;
    }

    /**
     * @return mixed
     */
    public function getCategoryID()
    {
        return $this->CategoryID;
    }

    /**
     * @param mixed $CategoryID
     */
    public function setCategoryID($CategoryID)
    {
        $this->CategoryID = $CategoryID;
    }

    /**
     * @return mixed
     */
    public function getCategoryName()
    {
        return $this->CategoryName;
    }

    /**
     * @param mixed $CategoryName
     */
    public function setCategoryName($CategoryName)
    {
        $this->CategoryName = $CategoryName;
    }

    
}