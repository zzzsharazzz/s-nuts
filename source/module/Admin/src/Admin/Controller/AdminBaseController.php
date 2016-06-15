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
}