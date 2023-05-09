<?php

class ProductController extends BaseController
{
    private $productModel;

    public function __construct()
    {
        // nhuoc diem la du thua`
        $this->loadModel('ProductModel');
        $this->productModel = new ProductModel();
    }

    public function store()
    {
        $nameErr = $priceErr = $imageErr = $categoryErr = "";
        $name = $price = $image = $category = "";
        $flag = true;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                $nameErr = "Name is required";
                $flag = false;
            } else {
                $name = $this->_testInput($_POST['name']);
            }
            if (empty($_POST["price"])) {
                $priceErr = "Price is required";
                $flag = false;
            } else {
                $price = $this->_testInput($_POST['price']);
            }

            $imagePath = basename($_FILES['imageUpload']['name']);
            $target_dir = 'uploads/';
            $imageUrl = $target_dir . $imagePath;
            $source = $_FILES["imageUpload"]["tmp_name"];
            $imageFileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));
            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["imageUpload"]["tmp_name"]);
                if ($check !== false) {
                    $status_message = "File is an image - " . $check["mime"] . ".";
                } else {
                    $imageErr = "File không phải hình ảnh.";
                }
            }
            // Check if file already exists
            if (file_exists($image)) {
                $imageErr = "Xin lỗi, file đã tồn tại.";
            }

            // Check file size
            if ($_FILES["imageUpload"]["size"] > 6020) {
                $imageErr = "Xin lỗi, kích thước file ảnh không được quá 5MB.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif") {
                $imageErr = "Xin lỗi, chỉ cho phép file JPG, JPEG, PNG & GIF.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error

            if (move_uploaded_file($source, $imageUrl)) {
                $image = $target_dir . $imagePath;
            } else {
                $imageErr = "Lỗi trong quá trình upload.";
            }

            if (empty($_POST["category_id"])) {
                $categoryErr = "Category is required";
                $flag = false;
            } else {
                $category = $this->_testInput($_POST['category_id']);
            }
            if ($flag) {
                $data = [
                    "name" => $name,
                    "price" => $price,
                    "image" => $image,
                    "category_id" => $category,
                ];
                $this->productModel->store($data);
            } else {
                return $this->loadView('frontend.products.store', [
                    "nameErr" => $nameErr,
                    "priceErr" => $priceErr,
                    "imageErr" => $imageErr,
                    "categoryIdErr" => $categoryErr
                ]);
            }
        }


    }

    public function update()
    {
        $id = $_GET['id'];
        $product = $this->productModel->findById($id);

        return $this->loadView('frontend.products.update', [
            'pageTitle' => 'Sua san pham',
            'product' => $product
        ]);
//        $this->productModel->edit($id, $data);
    }

    public function updateProduct()
    {
        $nameErr = $priceErr = $imageErr = $categoryErr = "";
        $name = $price = $image = $category = "";
        $id = $_POST['id'];
        $flag = true;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                $nameErr = "Name is required";
                $flag = false;
            } else {
                $name = $this->_testInput($_POST['name']);
            }
            if (empty($_POST["price"])) {
                $priceErr = "Price is required";
                $flag = false;
            } else {
                $price = $this->_testInput($_POST['price']);
            }

            $imagePath = basename($_FILES['imageUpload']['name']);
            $target_dir = 'uploads/';
            $imageUrl = $target_dir . $imagePath;
            $source = $_FILES["imageUpload"]["tmp_name"];

            $imageFileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));
            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["imageUpload"]["tmp_name"]);
                if ($check !== false) {
                    $status_message = "File is an image - " . $check["mime"] . ".";
                } else {
                    $imageErr = "File không phải hình ảnh.";
                }
            }
            // Check if file already exists
            if (file_exists($image)) {
                $imageErr = "Xin lỗi, file đã tồn tại.";
            }

            // Check file size
            if ($_FILES["imageUpload"]["size"] > 6020) {
                $imageErr = "Xin lỗi, kích thước file ảnh không được quá 5MB.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif") {
                $imageErr = "Xin lỗi, chỉ cho phép file JPG, JPEG, PNG & GIF.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error

            if (move_uploaded_file($source, $imageUrl)) {
                $image = $target_dir . $imagePath;
            } else {
                $imageErr = "Lỗi trong quá trình upload.";
            }

            if (empty($_POST["category_id"])) {
                $categoryErr = "Category is required";
                $flag = false;
            } else {
                $category = $this->_testInput($_POST['category_id']);
            }
            if ($flag) {
                $data = [
                    "name" => $name,
                    "price" => $price,
                    "image" => $image,
                    "category_id" => $category,
                ];
                $this->productModel->edit($id, $data);
            } else {
                return $this->loadView('frontend.products.store', [
                    "nameErr" => $nameErr,
                    "priceErr" => $priceErr,
                    "imageErr" => $imageErr,
                    "categoryIdErr" => $categoryErr
                ]);
            }
        }
    }

    public function index()
    {
        $orderBy = $_POST['sort'] ?? 'ASC';
        $selectColumns = ['id', 'name','image', 'category_id', 'price'];
        $orders = ['column' => 'id', 'order' => $orderBy];
        $limit = !empty($_GET['limit']) ? $_GET['limit'] : 4;
        $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $limit;
        $total_records = $this->productModel->getAllpro()->num_rows;
        $total_page = ceil($total_records / $limit);
        $search = !empty($_POST['search']) ? trim($_POST['search']) : '';

        $products = $this->productModel->getAll($selectColumns, $orders, $limit, $offset, $search);

//        print_r($products);
        // doc view html
        return $this->loadView('frontend.products.index', [
            'pageTitle' => 'Trang danh sach san pham',
            'products' => $products,
            'total_page' => $total_page,
            'limit' => $limit,
            'current_page' => $current_page
        ]);

    }

    public function show()
    {
        $id = $_GET['id'];
        $product = $this->productModel->findById($id);
        $category_id = $product['category_id'];
        $productByCate = $this->productModel->getProductByCate($category_id, $id);

        return $this->loadView('frontend.products.show', [
            'pageTitle' => 'Trang chi tiet',
            'product' => $product,
            'productByCate' => $productByCate
        ]);
    }

    public function showByCategory()
    {
        $getProductByCategory = $this->productModel->getProductByCate($_GET['id'], '');
//        echo "<pre>";
//        print_r($getProductByCategory);
//        exit();
        return $this->loadView('frontend.products.showByCategory', [
            'pageTitle' => 'Danh sach Apple',
            'getProductByCategory' => $getProductByCategory
        ]);
    }

    public function delete()
    {
        $id = $_GET['id'];
        $this->productModel->destroy($id);
    }

    function _testInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
