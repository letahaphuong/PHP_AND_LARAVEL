<?php

class OrderController extends BaseController
{

    private $orderModel;

    public function __construct()
    {
        $this->loadModel('OrderModel');
        $this->orderModel = new OrderModel();
    }

    public function store()
    {
        if (!empty($_SESSION['carts'])) {
            $order = $this->orderModel->store($_POST);
            foreach ($_SESSION['carts'] as $product) {
                $this->orderModel->insertOrderDetail([
                    'order_id' => $order['id'],
                    'product_id' => $product['id'],
                    'product_name' => $product['name'],
                    'product_price' => $product['price'],
                    'product_qty' => $product['qty']
                ]);
            }
            unset($_SESSION['carts']);
            header('location:index.php?controller=cart');
        }
    }


}