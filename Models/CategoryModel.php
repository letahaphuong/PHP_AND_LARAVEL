<?php

class CategoryModel extends BaseModel
{
    const TABLE = 'categories';

    public function getAll($select = ['*'], $orderBy = [], $limit = 10)
    {
        return $this->all(self::TABLE, $select, $orderBy, $limit);
    }

    public function finById($id)
    {
        return $this->findId(self::TABLE, $id);
    }

    public function edit($id, $data)
    {
        $this->update(self::TABLE, $id, $data);
    }

    public function destroy($id)
    {
        $this->destroy(self::TABLE, $id);
    }
}