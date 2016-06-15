<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Admin\Controller;


use Admin\Controller\AdminBaseController;
use Zend\Mvc\MvcEvent;
use Zend\View\Model\ViewModel;

class IndexController extends AdminBaseController
{
    public function onDispatch(MvcEvent $e)
    {
        $this->checkPermission();
        parent::onDispatch($e); // TODO: Change the autogenerated stub
    }

    public function indexAction()
    {
        return new ViewModel();
    }
}
