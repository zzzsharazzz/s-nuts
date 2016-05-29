<?php
namespace Application\Model;

class Products {
    
    public $ProductCartDesc;
    public $ProductCategoryID;
    public $ProductID;
    public $ProductImage;
    public $ProductLive;
    public $ProductLocation;
    public $ProductLongDesc;
    public $ProductName;
    public $ProductPrice;
    public $ProductShortDesc;
    public $ProductSKU;
    public $ProductStock;
    public $ProductThumb;
    public $ProductUnlimited;
    public $ProductUpdateDate;
    public $ProductWeight;
    
    public function exchangeArray($data)
    {
        $this->ProductCartDesc = (!empty($data['ProductCartDesc']))? $data['ProductCartDesc']:null;
        $this->ProductCategoryID = (!empty($data['ProductCategoryID'])) ? $data['ProductCategoryID']:null;
        $this->ProductID = (!empty($data['ProductID'])) ? $data['ProductID']:null;
        $this->ProductImage = (!empty($data['ProductImage'])) ? $data['ProductImage']:null;
        $this->ProductLive = (!empty($data['ProductLive'])) ? $data['ProductLive']:null;
        $this->ProductLocation = (!empty($data['ProductLocation'])) ? $data['ProductLocation']:null;
        $this->ProductLongDesc = (!empty($data['ProductLongDesc'])) ? $data['ProductLongDesc']:null;
        $this->ProductName = (!empty($data['ProductName'])) ? $data['ProductName']:null;
        $this->ProductPrice = (!empty($data['ProductPrice'])) ? $data['ProductPrice']:null;
        $this->ProductShortDesc = (!empty($data['ProductShortDesc'])) ? $data['ProductShortDesc']:null;
        $this->ProductSKU = (!empty($data['ProductSKU'])) ? $data['ProductSKU']:null;
        $this->ProductStock = (!empty($data['ProductStock'])) ? $data['ProductStock']:null;
        $this->ProductThumb = (!empty($data['ProductThumb'])) ? $data['ProductThumb']:null;
        $this->ProductUnlimited = (!empty($data['ProductUnlimited'])) ? $data['ProductUnlimited']:null;
        $this->ProductUpdateDate = (!empty($data['ProductUpdateDate'])) ? $data['ProductUpdateDate']:null;
        $this->ProductWeight = (!empty($data['ProductWeight'])) ? $data['ProductWeight']:null;

    }
    
}