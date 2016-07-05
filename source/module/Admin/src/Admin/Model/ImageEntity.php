<?php
namespace Admin\Model;

class ImageEntity
{
	protected $imageId;
	protected $imageName;
	protected $productId;

	/**
	 * @return mixed
	 */
	public function getImageId()
	{
		return $this->imageId;
	}

	/**
	 * @param mixed $imageId
	 */
	public function setImageId($imageId)
	{
		$this->imageId = $imageId;
	}

	/**
	 * @return mixed
	 */
	public function getImageName()
	{
		return $this->imageName;
	}

	/**
	 * @param mixed $imageName
	 */
	public function setImageName($imageName)
	{
		$this->imageName = $imageName;
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

	
}