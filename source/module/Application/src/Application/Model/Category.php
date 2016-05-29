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
}