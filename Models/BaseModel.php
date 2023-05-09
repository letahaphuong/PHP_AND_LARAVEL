<?php

class BaseModel extends Database
{
    protected $connect;

    public function __construct()
    {
        $this->connect = $this->connect();
    }

    /**
     * Lay ra tat ca du lieu trong bang
     */
    public function all($table, $select = ['*'], $orderBys = [], $limit = 10, $offset = '', $search = '')
    {

        $columns = implode(',', $select);

        $orderByString = implode(' ', $orderBys);
        if ($orderByString) {
            $sql = "select ${columns} from ${table} WHERE name LIKE '%${search}%' order by ${orderByString} limit  ${limit} offset ${offset}";
        } else {
            $sql = "select ${columns} from ${table} limit  ${limit}";
        }

        $query = $this->_query($sql);

//        $data = $query->fetch_all();
//        for ($i = 0; $i < count($data); $i++) {
//            var_dump($data[$i]);
//        }
//        die($data);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }

    /**
     * Lay ra bang ghi trong bang
     */
    public function findId($table, $id)
    {
        $sql = "select * from ${table} where id = ${id} limit 1";

        $query = $this->_query($sql);
        return mysqli_fetch_assoc($query);
    }

    /**
     * Lay ra sản phẩm liên quan
     */
    public function getProductByCategory($table, $category_id, $productId)
    {
        $sql = "SELECT ${table}.*, categories.name as categoryName FROM ${table} JOIN categories ON ${table}.category_id = categories.id WHERE ${table}.category_id = $category_id and ${table}.id != '${productId}'";
        $query = $this->_query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }

    /**
     * Them du lieu vao bang
     */
    public function create($table, $data = [])
    {
        $columns = implode(',', array_keys($data));
        $newValues = array_map(function ($value) {
            return "'" . $value . "'";
        }, array_values($data));

        $values = implode(',', $newValues);

        $sql = "insert into ${table} (${columns}) value (${values}) ";
        $this->_query($sql);

        return $this->getFirstByQuery("select * from ${table} order by id desc limit 1");
    }

    /**
     * Update du lieu vao bang
     */
    public function update($table, $id, $data)
    {
        $dataSets = [];

        foreach ($data as $key => $value) {
            array_push($dataSets, "${key} = '" . $value . "'");
        }

        $columnValue = implode(',', $dataSets);

        $sql = "update ${table} set ${columnValue} where id = ${id}";

        $this->_query($sql);
    }

    /**
     * Delete du lieu vao bang
     */
    public function delete($table, $id)
    {
        $sql = "delete from ${table} where id = ${id}";
        $this->_query($sql);
    }

    /**
     * GetAll
     */

    public function getAllProduct($table)
    {
        $sql = "select * from ${table}";
        $query = $this->_query($sql);
        return $query;
    }

    private function _query($sql)
    {
        return mysqli_query($this->connect, $sql);
    }

    public function getFirstByQuery($sql)
    {
        $query = $this->_query($sql);
        return mysqli_fetch_assoc($query);
    }
}