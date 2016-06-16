<?php
namespace Admin\Model;

class CategoryEntity
{
	protected $categoryId;
	protected $categoryName;
	
	public function setCategoryId($categoryId)
	{
		$this->categoryId = $categoryId;
	}
	
	public function getCategoryId() 
	{
		return $this->categoryId;
	}
	
	public function setCategoryName($categoryName)
	{
		$this->categoryName = $categoryName;
	}
	
	public function getCategoryName()
	{
		return $this->categoryName;
	}
}