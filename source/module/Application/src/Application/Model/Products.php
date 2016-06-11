<?php
namespace Application\Model;

class Products {
    
    public $productId;
    public $productSku;
    public $productNane;
    public $productPrice;
    public $productDesc;
    public $categoryId;
    public $createdTime;
    public $isNew;
    public $isSale;
    public $isFeatured;
    public $isRecommended;
    public $isStock;

    public function exchangeArray($data) {
        return null;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param mixed $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    /**
     * @return mixed
     */
    public function getProductSku()
    {
        return $this->productSku;
    }

    /**
     * @param mixed $productSku
     */
    public function setProductSku($productSku)
    {
        $this->productSku = $productSku;
    }

    /**
     * @return mixed
     */
    public function getProductNane()
    {
        return $this->productNane;
    }

    /**
     * @param mixed $productNane
     */
    public function setProductNane($productNane)
    {
        $this->productNane = $productNane;
    }

    /**
     * @return mixed
     */
    public function getProductPrice()
    {
        return $this->productPrice;
    }

    /**
     * @param mixed $productPrice
     */
    public function setProductPrice($productPrice)
    {
        $this->productPrice = $productPrice;
    }

    /**
     * @return mixed
     */
    public function getProductDesc()
    {
        return $this->productDesc;
    }

    /**
     * @param mixed $productDesc
     */
    public function setProductDesc($productDesc)
    {
        $this->productDesc = $productDesc;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param mixed $categoryId
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    /**
     * @return mixed
     */
    public function getCreatedTime()
    {
        return $this->createdTime;
    }

    /**
     * @param mixed $createdTime
     */
    public function setCreatedTime($createdTime)
    {
        $this->createdTime = $createdTime;
    }

    /**
     * @return mixed
     */
    public function getIsNew()
    {
        return $this->isNew;
    }

    /**
     * @param mixed $isNew
     */
    public function setIsNew($isNew)
    {
        $this->isNew = $isNew;
    }

    /**
     * @return mixed
     */
    public function getIsSale()
    {
        return $this->isSale;
    }

    /**
     * @param mixed $isSale
     */
    public function setIsSale($isSale)
    {
        $this->isSale = $isSale;
    }

    /**
     * @return mixed
     */
    public function getIsFeatured()
    {
        return $this->isFeatured;
    }

    /**
     * @param mixed $isFeatured
     */
    public function setIsFeatured($isFeatured)
    {
        $this->isFeatured = $isFeatured;
    }

    /**
     * @return mixed
     */
    public function getIsRecommended()
    {
        return $this->isRecommended;
    }

    /**
     * @param mixed $isRecommended
     */
    public function setIsRecommended($isRecommended)
    {
        $this->isRecommended = $isRecommended;
    }

    /**
     * @return mixed
     */
    public function getIsStock()
    {
        return $this->isStock;
    }

    /**
     * @param mixed $isStock
     */
    public function setIsStock($isStock)
    {
        $this->isStock = $isStock;
    }


}