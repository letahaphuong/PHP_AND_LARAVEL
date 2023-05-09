<?php

class OrderModel extends BaseModel
{
    const TABLE = 'orders';

    public function store($input)
    {
        $orderID = $this->create(self::TABLE, [
            'code' => "MDH" . rand(1000, 9999),
            'customer_name' => $input['customer_name'],
            'customer_email' => $input['customer_email'],
            'customer_phone' => $input['customer_phone']
        ]);
        return $orderID;
    }

    public function insertOrderDetail($input)
    {
        $this->create('order_detail', [
            'order_id'      => $input['order_id'],
            'product_id'    => $input['product_id'],
            'product_name'  => $input['product_name'],
            'product_price' => $input['product_price'],
            'product_qty'   => $input['product_qty']
        ]);
    }
}
