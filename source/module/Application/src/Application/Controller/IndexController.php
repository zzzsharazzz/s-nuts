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

class IndexController extends BaseController
{
   public function onDispatch(MvcEvent $e)
   {
       $this->setPageTitle('Homepage');
        parent::onDispatch($e);
   }
    public function indexAction()
    {
        $featuredProduct = $this->getProductTable()->getFeatureProducts();
        $categories = $this->getCategoryTable()->getCategory();
        return new ViewModel([
            'featuredProduct' => $featuredProduct,
            'categories' => $categories
        ]);


    }

    public function newsAction()
    {
        
        return new ViewModel();
    }
}
