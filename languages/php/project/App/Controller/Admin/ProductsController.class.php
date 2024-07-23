<?php

/**
 *商品控制器类，用来执行商品的业务逻辑
 *命名规范：控制器名+Controller
 *方法名：方法名+Action
 */
class ProductsController extends BaseController
{
    public function indexAction()
    {
        $model = new ProductsModel();
        $rs = $model->getList();
        require __VIEW__.'showList.html';    //引入视图
    }

    //删除商品
    public function delAction()
    {
        $id = $_GET['id'];
        $model = new ProductsModel();
        if ($model->delProductsById($id)) {
            $this->jump('index.php?p=Admin&c=Products&a=index', '删除成功', 1);
        } else {
            $this->jump('index.php?p=Admin&c=Products&a=index', '删除失败');
        }
    }

    public function testSessAction()
    {
        $session = new SessionLib();
        $_SESSION['name'] = 'tom';
        $_SESSION['age'] = 20;
    }
}
