<?php

class ProductModel extends BaseModel
{
    const TABLE = 'products';

    public function getAll($select, $orderBy, $limit, $offset, $search)
    {
        return $this->all(self::TABLE, $select, $orderBy, $limit, $offset, $search);
    }

    public function store($data)
    {
        $this->create(self::TABLE, $data);
        header("Location: ?controller=home");
    }

    public function edit($id, $data)
    {
        $this->update(self::TABLE, $id, $data);
        header("Location: ?controller=product");
    }

    public function findById($id)
    {
        return $this->findId(self::TABLE, $id);
    }

    public function getProductByCate($category_id, $productId)
    {
        return $this->getProductByCategory(self::TABLE, $category_id, $productId);
    }

    public function destroy($id)
    {
        $this->delete(self::TABLE, $id);
        header("Location: ?controller=product");
    }

    public function getAllpro()
    {
        return $this->getAllProduct(self::TABLE);
    }
}