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
use Zend\Paginator\Adapter\ArrayAdapter;
use Zend\Paginator\Paginator;

class PageController extends BaseController
{
    const PAGE_RANGE = 5;
    const ITEM_PER_PAGE = 2;

    public function onDispatch(MvcEvent $e)
    {
        // upload by phpstorm
        $this->setPageTitle('Pages');
        parent::onDispatch($e);
    }
    
    public function indexAction()
    {
        return new ViewModel();
    }

    public function newsAction()
    {
        $currentPage = $this->params()->fromQuery('page') ? (int)$this->params()->fromQuery('page') : 1;

        $categories = $this->getCategoryTable()->getCategory();
        $news = $this->getNewsTable()->getNews();

        $paginator = new Paginator(new ArrayAdapter($news));
        $paginator->setPageRange(self::PAGE_RANGE);
        $paginator->setCurrentPageNumber($currentPage);
        $paginator->setItemCountPerPage(self::ITEM_PER_PAGE);

        return new ViewModel([
            'categories' => $categories,
            'news' => $paginator
        ]);
    }

    public function contactAction()
    {
        return new ViewModel();
    }

    public function getNewsAction()
    {
        $id = $this->params()->fromRoute('id');
        if(!$id) {
            return $this->redirect()->toUrl('/');
        }
        $news = $this->getNewsTable()->getNewsById($id);
        $this->setPageTitle($news['news_title']);
        return new ViewModel([
            'news' => $news
        ]);
    }
}
