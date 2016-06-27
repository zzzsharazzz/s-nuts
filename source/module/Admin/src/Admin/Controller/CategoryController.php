<?php

namespace Admin\Controller;

use Admin\Controller\AdminBaseController;
use Admin\Model\CategoryEntity;
use Zend\Json\Json;
use Zend\View\Model\ViewModel;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\Iterator as paginatorIterator;
use Zend\View\Model\JsonModel;

class CategoryController extends AdminBaseController 
{
	const ITEM_PER_PAGE = 2;
	const PAGE_RANGE = 5;
	
	public function indexAction() 
	{
		$categories = $this->getCategoryMapper ()->fetchAll ();
		
		if(!$categories) {
			return $this->redirect()->toRoute('dashboard');
		}
		
		$currentPage = $this->params()->fromQuery('page') ? (int)$this->params()->fromQuery('page') : 1;
		
		$paginator = new Paginator(new paginatorIterator($categories));
		
		$paginator->setPageRange(self::PAGE_RANGE);
		$paginator->setCurrentPageNumber($currentPage);
		$paginator->setItemCountPerPage(self::ITEM_PER_PAGE);
		
		return new ViewModel ( [ 
				'categories' => $paginator
		] );
	}

	public function editAction()
	{
		$id = $this->params()->fromRoute('id') ? (int)$this->params()->fromRoute('id') : -1;
		$cat = $this->getCategoryMapper()->getCategoryById($id);
		$view = new ViewModel();
		$view->setTerminal(true);
		$view->setVariable('cat', $cat);
		return $view;
	}

	public function saveAction()
	{
		try {
			if($this->request->isPost()) {
				$postData = $this->request->getPost();
				$catEntity = new CategoryEntity($postData);
				if(!$catEntity->getCategoryName()) {
					$this->flashMessenger()->addErrorMessage('Please enter your category name!');
					return $this->redirect()->toRoute('categories');
				}
				$this->getCategoryMapper()->saveCategory($catEntity);
				$this->flashMessenger()->addSuccessMessage('Save success!');
				return $this->redirect()->toRoute('categories');
			}
		} catch (\Exception $ex) {
			$this->flashMessenger()->addErrorMessage(self::ERROR_MSG);
			return $this->redirect()->toRoute('categories');
		}
	}
	
	public function deleteAction() 
	{
		try {
			$id = (int)$this->params()->fromRoute('id');
			$cat = $this->getCategoryMapper()->getCategoryById($id);
			$products = $this->getProductMapper()->fetchAll(['category_id' => $id]);
			if($products->count() != 0) {
				return new JsonModel([
					'success' => false,
					'message' => 'There are products in this category. Please delete them first!'
				]);
			}
			if (!$cat) {
				return new JsonModel([
					'success' => false,
					'message' => 'Category not found!'
				]);
			}
			$this->getCategoryMapper()->deleteCategory($id);
			return new JsonModel([
				'success' => true,
				'message' => 'Delete success!'
			]);
		} catch (\Exception $ex) {
			return new JsonModel([
				'success' => false,
				'message' => 'There are products in this category. Please delete them first.'
			]);
		}
	}

	public function addAction()
	{
		$view = new ViewModel();
		$view->setTerminal(true);
		return $view;
	}
}