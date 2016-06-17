<?php

namespace Admin\Controller;

use Admin\Controller\AdminBaseController;
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
}