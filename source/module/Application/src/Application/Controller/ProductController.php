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

class ProductController extends BaseController
{
    public function onDispatch(MvcEvent $e)
    {
        $this->setPageTitle('Products');
        parent::onDispatch($e);
    }

    public function indexAction()
    {
        $categories = $this->getCategoryTable()->getCategory();
        $product = $this->getProductTable()->fetchAll();
        return new ViewModel([
            'categories' => $categories,
            'products' => $product
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
            $recommended = $this->getProductTable()->getProductByCategoryId($product->ProductID);
        }


        return new ViewModel([
            'categories' => $categories,
            'product'    => $product,
            'recommended' => $recommended
        ]);

    }
}
