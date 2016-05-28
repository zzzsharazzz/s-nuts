<?php
/**
 * Created by PhpStorm.
 * User: NguyenDong
 * Date: 5/28/2016
 * Time: 5:51 PM
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class BaseController extends AbstractActionController
{

    public function setPageTitle($title)
    {
        return $this->getServiceLocator()
            ->get('ViewHelperManager')
            ->get('HeadTitle')->set($title);
    }
}