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

    /**
     * @return mixed
     */
    public function getProductCartDesc()
    {
        return $this->ProductCartDesc;
    }

    /**
     * @param mixed $ProductCartDesc
     */
    public function setProductCartDesc($ProductCartDesc)
    {
        $this->ProductCartDesc = $ProductCartDesc;
    }

    /**
     * @return mixed
     */
    public function getProductCategoryID()
    {
        return $this->ProductCategoryID;
    }

    /**
     * @param mixed $ProductCategoryID
     */
    public function setProductCategoryID($ProductCategoryID)
    {
        $this->ProductCategoryID = $ProductCategoryID;
    }

    /**
     * @return mixed
     */
    public function getProductID()
    {
        return $this->ProductID;
    }

    /**
     * @param mixed $ProductID
     */
    public function setProductID($ProductID)
    {
        $this->ProductID = $ProductID;
    }

    /**
     * @return mixed
     */
    public function getProductImage()
    {
        return $this->ProductImage;
    }

    /**
     * @param mixed $ProductImage
     */
    public function setProductImage($ProductImage)
    {
        $this->ProductImage = $ProductImage;
    }

    /**
     * @return mixed
     */
    public function getProductLive()
    {
        return $this->ProductLive;
    }

    /**
     * @param mixed $ProductLive
     */
    public function setProductLive($ProductLive)
    {
        $this->ProductLive = $ProductLive;
    }

    /**
     * @return mixed
     */
    public function getProductLocation()
    {
        return $this->ProductLocation;
    }

    /**
     * @param mixed $ProductLocation
     */
    public function setProductLocation($ProductLocation)
    {
        $this->ProductLocation = $ProductLocation;
    }

    /**
     * @return mixed
     */
    public function getProductLongDesc()
    {
        return $this->ProductLongDesc;
    }

    /**
     * @param mixed $ProductLongDesc
     */
    public function setProductLongDesc($ProductLongDesc)
    {
        $this->ProductLongDesc = $ProductLongDesc;
    }

    /**
     * @return mixed
     */
    public function getProductName()
    {
        return $this->ProductName;
    }

    /**
     * @param mixed $ProductName
     */
    public function setProductName($ProductName)
    {
        $this->ProductName = $ProductName;
    }

    /**
     * @return mixed
     */
    public function getProductPrice()
    {
        return $this->ProductPrice;
    }

    /**
     * @param mixed $ProductPrice
     */
    public function setProductPrice($ProductPrice)
    {
        $this->ProductPrice = $ProductPrice;
    }

    /**
     * @return mixed
     */
    public function getProductShortDesc()
    {
        return $this->ProductShortDesc;
    }

    /**
     * @param mixed $ProductShortDesc
     */
    public function setProductShortDesc($ProductShortDesc)
    {
        $this->ProductShortDesc = $ProductShortDesc;
    }

    /**
     * @return mixed
     */
    public function getProductSKU()
    {
        return $this->ProductSKU;
    }

    /**
     * @param mixed $ProductSKU
     */
    public function setProductSKU($ProductSKU)
    {
        $this->ProductSKU = $ProductSKU;
    }

    /**
     * @return mixed
     */
    public function getProductStock()
    {
        return $this->ProductStock;
    }

    /**
     * @param mixed $ProductStock
     */
    public function setProductStock($ProductStock)
    {
        $this->ProductStock = $ProductStock;
    }

    /**
     * @return mixed
     */
    public function getProductThumb()
    {
        return $this->ProductThumb;
    }

    /**
     * @param mixed $ProductThumb
     */
    public function setProductThumb($ProductThumb)
    {
        $this->ProductThumb = $ProductThumb;
    }

    /**
     * @return mixed
     */
    public function getProductUnlimited()
    {
        return $this->ProductUnlimited;
    }

    /**
     * @param mixed $ProductUnlimited
     */
    public function setProductUnlimited($ProductUnlimited)
    {
        $this->ProductUnlimited = $ProductUnlimited;
    }

    /**
     * @return mixed
     */
    public function getProductUpdateDate()
    {
        return $this->ProductUpdateDate;
    }

    /**
     * @param mixed $ProductUpdateDate
     */
    public function setProductUpdateDate($ProductUpdateDate)
    {
        $this->ProductUpdateDate = $ProductUpdateDate;
    }

    /**
     * @return mixed
     */
    public function getProductWeight()
    {
        return $this->ProductWeight;
    }

    /**
     * @param mixed $ProductWeight
     */
    public function setProductWeight($ProductWeight)
    {
        $this->ProductWeight = $ProductWeight;
    }
    
}