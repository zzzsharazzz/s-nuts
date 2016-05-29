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

class PageController extends BaseController
{
    public function onDispatch(MvcEvent $e)
    {
        $this->setPageTitle('Pages');
        parent::onDispatch($e);
    }
    
    public function indexAction()
    {
        return new ViewModel();
    }

    public function newsAction()
    {
        $categories = $this->getCategoryTable()->getCategory();
        return new ViewModel([
            'categories' => $categories,
        ]);
    }

    public function contactAction()
    {
        return new ViewModel();
    }
}
