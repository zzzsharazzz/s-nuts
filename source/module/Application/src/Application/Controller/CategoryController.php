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

class CategoryController extends BaseController
{
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
        $this->setPageTitle($category['CategoryName']);
        $products = $this->getProductTable()->getProductByCategoryId($catId);

        $categories = $this->getCategoryTable()->getCategory();
        return new ViewModel([
            'category_name' => $category['CategoryName'],
            'products' => $products,
            'categories' => $categories
        ]);
    }

}
