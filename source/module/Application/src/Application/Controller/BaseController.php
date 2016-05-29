<?php
/**
 * Created by PhpStorm.
 * User: NguyenDong
 * Date: 5/28/2016
 * Time: 5:51 PM
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Application\Model\ProductTable;

class BaseController extends AbstractActionController
{
    protected $productTable;
    public function setPageTitle($title)
    {
        return $this->getServiceLocator()
            ->get('ViewHelperManager')
            ->get('HeadTitle')->set($title);
    }

    public function getProductTable()
    {
        if (!$this->productTable) {
            $sm = $this->getServiceLocator();
            $this->productTable = $sm->get('Application\Model\ProductTable');
        }
        return $this->productTable;
    }
}
