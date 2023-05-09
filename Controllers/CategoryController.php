<?php

class CategoryController extends BaseController
{
    private $categoryModel;

    public function __construct()
    {
        $this->loadModel('CategoryModel');
        $this->categoryModel = new CategoryModel;
    }

    public function index()
    {
        $pageTitle = 'Danh sach san pham theo danh muc: Laptop';

        $selectColumns = ['*'];
        $orders = ['column' => 'name', 'order' => 'desc'];

        $categories = $this->categoryModel->getAll($selectColumns, $orders);
        // truyen du lieu ra view
        return $this->loadView('frontend.categories.index', [
            'categories' => $categories,
            'pageTitle' => $pageTitle
        ]);
    }

    public function update()
    {
        $id = $_GET['id'];
        $data = [
            "name" => 'Printer'
        ];

        $this->categoryModel->edit($id, $data);
    }

    public function delete()
    {
        $id = $_GET['id'];

        $this->categoryModel->destroy($id);
    }

    public function show()
    {
        $id = $_GET['id'];
        $category = $this->categoryModel->finById($id);
        print_r($category);
    }

    public function store()
    {
//        $data = []
        echo __METHOD__;
    }
}
