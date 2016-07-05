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
use Admin\Form\LoginForm;

class AuthController extends AdminBaseController
{
    protected $form;

    public function getForm()
    {
        if (! $this->form) {
            $this->form = new LoginForm();
        }

        return $this->form;
    }

    public function loginAction()
    {
        //if already login, redirect to success page
        if ($this->getAuthService()->hasIdentity()){
            return $this->redirect()->toRoute('dashboard');
        }

        $form       = $this->getForm();

        $view = new ViewModel();
        $view->setTerminal(true);
        $view->setVariables([
            'form'      => $form,
            'messages'  => $this->flashmessenger()->getMessages()
        ]);

        return $view;
    }

    public function authenticateAction()
    {
        $form       = $this->getForm();
        $redirect = 'admin';

        $request = $this->getRequest();
        if ($request->isPost()){
            $form->setInputFilter($form->getInputFilter());
            $form->setData($request->getPost());
            if ($form->isValid()){
                //check authentication...
                $this->getAuthService()->getAdapter()
                    ->setIdentity($request->getPost('email'))
                    ->setCredential($request->getPost('password'));

                $result = $this->getAuthService()->authenticate();
                foreach($result->getMessages() as $message)
                {
                    //save message temporary into flashmessenger
                    //$this->flashmessenger()->addMessage($message);
                }

                if ($result->isValid()) {
                    $redirect = 'dashboard';
                    //check if it has rememberMe :
                    if ($request->getPost('rememberme') == 1 ) {
                        $this->getSessionStorage()
                            ->setRememberMe(1);
                        //set storage again
                        $this->getAuthService()->setStorage($this->getSessionStorage());
                    }
                    $this->getAuthService()->getStorage()->write($request->getPost('email'));
                }
            } else {
                foreach ($form->getMessages() as $message) {
                    $this->flashmessenger()->addMessage($message);
                }
            }
        }

        return $this->redirect()->toRoute($redirect);
    }

    public function logoutAction()
    {
        $this->getSessionStorage()->forgetMe();
        $this->getAuthService()->clearIdentity();

        $this->flashmessenger()->addMessage("You've been logged out");
        return $this->redirect()->toRoute('admin');
    }

}
