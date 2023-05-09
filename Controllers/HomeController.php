<?php

class HomeController extends BaseController
{
    private $productModel;

    public function __construct()
    {
        $this->loadModel('ProductModel');
        $this->productModel = new ProductModel();
    }


    public function index()
    {
        $selectColumns = ['id', 'name', 'image', 'category_id', 'price'];
        $orders = ['column' => 'id', 'order' => $_POST['sort']];
        $limit = !empty($_GET['limit']) ? $_GET['limit'] : 4;
        $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $limit;
        $total_records = $this->productModel->getAllpro()->num_rows;
        $total_page = ceil($total_records / $limit);
        $search = !empty($_POST['search']) ? $_POST['search'] : '';

        $products = $this->productModel->getAll($selectColumns, $orders, $limit, $offset, $search);

        return $this->loadView('frontend.home.index', [
            'pageTitle' => 'Trang Chu',
            'products' => $products,
            'total_page' => $total_page,
            'limit' => $limit,
            'current_page' => $current_page
        ]);

    }
}