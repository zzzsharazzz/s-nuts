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
use Zend\Mvc\MvcEvent;

class BaseController extends AbstractActionController
{
    protected $productTable;
    protected $categoryTable;
    protected $imageTable;
    protected $newsTable;

    public function onDispatch(MvcEvent $e)
    {
        parent::onDispatch($e);
    }

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
    public function getCategoryTable()
    {
        if(!$this->categoryTable){
            $sm = $this->getServiceLocator();
            $this->categoryTable = $sm->get('Application\Model\CategoryTable');
        }
        return $this->categoryTable;
    }
    
    public function getCategory()
    {
        return $this->getCategoryTable()->getCategory();
    }

    public function getImageTable() {
        if(!$this->imageTable){
            $sm = $this->getServiceLocator();
            $this->imageTable = $sm->get('Application\Model\ImageTable');
        }
        return $this->imageTable;
    }

    public function getNewsTable() {
        if(!$this->newsTable){
            $sm = $this->getServiceLocator();
            $this->newsTable = $sm->get('Application\Model\NewsTable');
        }
        return $this->newsTable;
    }

}
