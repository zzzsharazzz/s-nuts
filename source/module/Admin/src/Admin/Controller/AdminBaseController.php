<?php
/**
 * Created by PhpStorm.
 * User: dongnguyen
 * Date: 6/15/2016
 * Time: 11:38 AM
 */
namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\MvcEvent;

class AdminBaseController extends  AbstractActionController
{
    public function onDispatch(MvcEvent $e)
    {
        parent::onDispatch($e);
    }

    protected $authservice;
    protected $storage;
    
    protected $categoryMapper;
    protected $productMapper;
    protected $connection;
    protected $imageMapper;

    const ERROR_MSG = 'Sorry, something went wrong! Please try again.';

    public function getAuthService()
    {
        if (! $this->authservice) {
            $this->authservice = $this->getServiceLocator()
                ->get('AuthService');
        }

        return $this->authservice;
    }

    public function getSessionStorage()
    {
        if (! $this->storage) {
            $this->storage = $this->getServiceLocator()
                ->get('Admin\Model\MyAuthStorage');
        }

        return $this->storage;
    }

    public function checkPermission()
    {
        $result = $this->getServiceLocator()
            ->get('AuthService')->hasIdentity();
        if(!$result) {
            $this->flashMessenger()->addErrorMessage('Please login first!');
            return $this->redirect()->toRoute('admin');
        }
    }
    
    public function getCategoryMapper()
    {
    	if(!$this->categoryMapper) {
    		$sm = $this->getServiceLocator();
    		$this->categoryMapper = $sm->get('CategoryMapper');
    	}
    	return $this->categoryMapper;
    }

    public function getProductMapper()
    {
        if(!$this->productMapper) {
            $sm = $this->getServiceLocator();
            $this->productMapper = $sm->get('ProductMapper');
        }
        return $this->productMapper;
    }

    public function getImageMapper()
    {
        if(!$this->imageMapper) {
            $sm = $this->getServiceLocator();
            $this->imageMapper = $sm->get('ImageMapper');
        }
        return $this->imageMapper;
    }

    public function getConnection()
    {
        if(!$this->connection) {
            $sm = $this->getServiceLocator();
            $this->connection = $sm->get('Zend\Db\Adapter\Adapter')->getDriver()->getConnection();
        }
        return $this->connection;
    }
}