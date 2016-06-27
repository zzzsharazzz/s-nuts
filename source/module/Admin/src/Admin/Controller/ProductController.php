<?php
/**
 * Created by PhpStorm.
 * User: NguyenDong
 * Date: 6/25/2016
 * Time: 4:47 AM
 */
namespace Admin\Controller;

use Zend\View\Model\ViewModel;

class ProductController extends AdminBaseController
{
    public function indexAction()
    {
        return new ViewModel();
    }
}