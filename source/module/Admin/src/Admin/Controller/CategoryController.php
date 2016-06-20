<?php

namespace Admin\Controller;

use Admin\Controller\AdminBaseController;
use Admin\Model\CategoryEntity;
use Zend\View\Model\ViewModel;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\Iterator as paginatorIterator;

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
		if(!$cat) {
			return 'Category not found!';
		}
		$view = new ViewModel();
		$view->setTerminal(true);
		$view->setVariable('cat', $cat);
		return $view;
	}

	public function saveAction()
	{
		if($this->request->isPost()) {
			$postData = $this->request->getPost();
			$catEntity = new CategoryEntity($postData);
			if(!$catEntity) {
				$this->flashMessenger()->addErrorMessage('Sorry, something went wrong, please try again.');
				return $this->redirect()->toRoute('dashboard');
			}
			$this->getCategoryMapper()->saveCategory($catEntity);
			$this->flashMessenger()->addSuccessMessage('Save success!');
			return $this->redirect()->toRoute('categories');
		}
	}
	
	public function deleteAction() 
	{
		$id = $this->params()->fromRoute('id');
		$cat = $this->getCategoryMapper()->getCategoryById($id);
		if (!$cat) {
			$this->flashMessenger()->addWarningMessage('Category not found');
			return $this->redirect()->toRoute('categories');
		}
		$this->getCategoryMapper()->deleteCategory($id);
		$this->flashMessenger()->addSuccessMessage('Delete success');
		return $this->redirect()->toRoute('categories');
	}
}