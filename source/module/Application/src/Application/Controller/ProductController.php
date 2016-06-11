<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Paginator\Paginator;
use Zend\View\Model\ViewModel;
use Zend\Mvc\MvcEvent;
use Zend\Paginator\Adapter\ArrayAdapter;

class ProductController extends BaseController
{

    const PAGE_RANGE = 5;
    const ITEM_PER_PAGE = 2;

    public function onDispatch(MvcEvent $e)
    {
        $this->setPageTitle('Products');
        parent::onDispatch($e);
    }

    public function indexAction()
    {
        $categories = $this->getCategoryTable()->getCategory();
        $product = $this->getProductTable()->fetchAll();

        $currentPage = $this->params()->fromQuery('page') ? (int)$this->params()->fromQuery('page') : 1;

        $paginator = new Paginator(new ArrayAdapter($product));
        $paginator->setPageRange(self::PAGE_RANGE);
        $paginator->setCurrentPageNumber($currentPage);
        $paginator->setItemCountPerPage(self::ITEM_PER_PAGE);

        return new ViewModel([
            'categories' => $categories,
            'products' => $paginator,
            'imageTable' => $this->getImageTable()
        ]);
    }

    public function detailAction()
    {
        $this->setPageTitle('Details');
        $categories = $this->getCategoryTable()->getCategory();

        $id = $this->params()->fromRoute('id') ? (int)$this->params()->fromRoute('id') : null;
        if(!$id) {
            return $this->redirect()->toRoute('/');
        }

        $product = $this->getProductTable()->getProductById($id);

        $recommended = [];
        if($product) {
            $recommenedProduct = $this->getProductTable()->getRecommendedProducts();
        }


        return new ViewModel([
            'categories' => $categories,
            'product'    => $product,
            'recommenedProduct' => $recommenedProduct,
            'imageTable' => $this->getImageTable()
        ]);

    }
}
