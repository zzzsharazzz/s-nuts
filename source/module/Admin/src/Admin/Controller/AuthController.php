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
use Zend\View\Model\ViewModel;

class AuthController extends AdminBaseController
{
    public function loginAction()
    {
        $view = new ViewModel();
        $view->setTerminal(true);
        return $view;
    }
}
