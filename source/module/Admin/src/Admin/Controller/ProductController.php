<?php
/**
 * Created by PhpStorm.
 * User: NguyenDong
 * Date: 6/25/2016
 * Time: 4:47 AM
 */
namespace Admin\Controller;

use Zend\View\Model\ViewModel;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\Iterator as paginatorIterator;

class ProductController extends AdminBaseController
{
    const ITEM_PER_PAGE = 2;
    const PAGE_RANGE = 5;
    
    public function indexAction()
    {
        $conditions = [];
        if($this->params()->fromRoute('id')) {
            $conditions['category_id'] = (int)$this->params()->fromRoute('id');
        }
        if($this->params()->fromRoute('type')) {
            $type = $this->params()->fromRoute('type');
            switch ($type) {
                case 'new':
                    $conditions['is_new'] = 1;
                    break;
                case 'sale':
                    $conditions['is_sale'] = 1;
                    break;
                case 'featured':
                    $conditions['is_featured'] = 1;
                    break;
                case 'recommended':
                    $conditions['is_recommended'] = 1;
                    break;
                default:
                    break;
            }
        }
        if($this->params()->fromQuery('name')) {
            $name = $this->params()->fromQuery('name');
            $like = "product_name like '%" . $name . "%'";
            $products = $this->getProductMapper()->fetchAll($conditions, $like);
        } else {
            $products = $this->getProductMapper()->fetchAll($conditions);
        }
        $categoryMapper = $this->getCategoryMapper();
        $currentPage = $this->params()->fromQuery('page') ? (int)$this->params()->fromQuery('page') : 1;
        $paginator = new Paginator(new paginatorIterator($products));
        $paginator->setPageRange(self::PAGE_RANGE);
        $paginator->setCurrentPageNumber($currentPage);
        $paginator->setItemCountPerPage(self::ITEM_PER_PAGE);
        return new ViewModel ( [
            'products'       => $paginator,
            'categoryMapper' => $categoryMapper,
            'name'           => isset($name) ? $name : '',
            'id'             => isset($id) ? $id : '',
            'type'           => isset($type) ? $type : ''
        ] );
    }
}