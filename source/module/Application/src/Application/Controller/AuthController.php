<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;
use Zend\Session\Container;
use Zend\View\Model\ViewModel;
use Zend\Mvc\MvcEvent;
use Application\Form\LoginForm;
use Application\Form\Filter\LoginFilter;

class AuthController extends BaseController
{

    protected $storage;
    protected $authservice;

    public function onDispatch(MvcEvent $e)
    {
        $this->setPageTitle('Authenticate');
        parent::onDispatch($e);
    }

    public function indexAction()
    {
        return new ViewModel();
    }

    public function loginAction()
    {
        $request = $this->getRequest();

        $view = new ViewModel();
        $loginForm = new LoginForm('loginForm');
        $loginForm->setInputFilter(new LoginFilter() );

        if($request->isPost()){
            $data = $request->getPost();
            $loginForm->setData($data);

            if($loginForm->isValid()){
                $data = $loginForm->getData();

                $this->getAuthService()
                    ->getAdapter()
                    ->setIdentity($data['email'])
                    ->setCredential(md5($data['password']));
                $result = $this->getAuthService()->authenticate();

                if ($result->isValid()) {

                    $session = new Container('User');
                    $session->offsetSet('email', $data['email']);

                    $this->flashMessenger()->addMessage(array('success' => 'Login Success.'));
                    // Redirect to page after successful login
                } else {
                    $this->flashMessenger()->addMessage(array('error' => 'invalid credentials.'));
                    return $this->redirect()->toRoute('auth');
                    // Redirect to page after login failure
                }
                return $this->redirect()->toUrl('/');
                // Logic for login authentication
            }else{
                $errors = $loginForm->getMessages();
                //prx($errors);
            }
        }

        $view->setVariable('loginForm', $loginForm);
        return $view;
    }

    private function getAuthService()
    {
        if (! $this->authservice) {
            $this->authservice = $this->getServiceLocator()->get('AuthService');
        }
        return $this->authservice;
    }

    public function logoutAction(){
        $session = new Container('User');
        $session->getManager()->destroy();
        $this->getAuthService()->clearIdentity();
        return $this->redirect()->toUrl('/');
    }

}
