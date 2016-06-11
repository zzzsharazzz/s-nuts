<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\View\Model\ViewModel;
use Zend\Mvc\MvcEvent;
use Zend\Paginator\Adapter\ArrayAdapter;
use Zend\Paginator\Paginator;

class CategoryController extends BaseController
{

    const PAGE_RANGE = 5;
    const ITEM_PER_PAGE = 2;

    public function onDispatch(MvcEvent $e)
    {
        $this->setPageTitle('Category');
        parent::onDispatch($e);
    }

    public function indexAction()
    {
        $catId = $this->params()->fromRoute('id') ? $this->params()->fromRoute('id') : -1;
        if(!$catId) {
            return $this->redirect()->toRoute('/');
        }
        $category = $this->getCategoryTable()->getCategoryById($catId);
        if(!$category) {
            return $this->redirect()->toRoute('/');
        }
        $this->setPageTitle($category['category_name']);
        $products = $this->getProductTable()->getProductByCategoryId($catId);

        $currentPage = $this->params()->fromQuery('page') ? (int)$this->params()->fromQuery('page') : 1;

        $paginator = new Paginator(new ArrayAdapter($products));
        $paginator->setPageRange(self::PAGE_RANGE);
        $paginator->setCurrentPageNumber($currentPage);
        $paginator->setItemCountPerPage(self::ITEM_PER_PAGE);

        $categories = $this->getCategoryTable()->getCategory();

        return new ViewModel([
            'category_id' => $catId,
            'category_name' => $category['category_name'],
            'products' => $paginator,
            'categories' => $categories,
            'imageTable' => $this->getImageTable()
        ]);
    }

}
