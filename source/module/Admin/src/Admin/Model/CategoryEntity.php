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

	public function __construct($data = null)
	{
		if($data) {
			$this->categoryId = !empty($data['category_id']) ? $data['category_id'] : null;
			$this->categoryName = !empty($data['category_name']) ? $data['category_name'] : null;
		}
	}
}