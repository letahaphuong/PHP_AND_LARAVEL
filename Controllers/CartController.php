<?php

class CartController extends BaseController
{
    private $productModel;

    public function __construct()
    {
        $this->loadModel('ProductModel');
        $this->productModel = new ProductModel();
    }

    public function index()
    {
//        echo __METHOD__;
        $products = $_SESSION['carts'] ?? [];
        $this->loadView('frontend.carts.index', [
            'pageTitle' => 'Gio hang',
            'products' => $products,
        ]);
    }

    public function store()
    {
        $productId = $_GET['id'];
        $product = $this->productModel->findById($productId);

        if (empty($_SESSION['carts']) || !array_key_exists($productId, $_SESSION['carts'])) {
            $product['qty'] = 1;
            $_SESSION['carts'][$productId] = $product;
            } else {
            $product['qty'] = $_SESSION['carts'][$productId]['qty'] + 1;
            $_SESSION['carts'][$productId] = $product;
        }

        header('location: index.php?controller=cart');
    }

    public function updateCart()
    {
        foreach ($_POST['qty'] as $productId => $qty) {
            if ($qty < 0 || !is_numeric($qty)) {
                continue;
            }
            if ($qty == 0) {
                unset($_SESSION['carts'][$productId]);
            } else {
                $_SESSION['carts'][$productId]['qty'] = $qty;
            }
        }
        header('location:index.php?controller=cart');
    }

    public function delete()
    {
        $productId = $_GET['id'];
        unset($_SESSION['carts'][$productId]); // xóa 1 phần tử trong array session
        header('location:index.php?controller=cart');

    }

    public function deleteAll()
    {
        unset($_SESSION['carts']);
        header('location:index.php?controller=cart');
    }
}