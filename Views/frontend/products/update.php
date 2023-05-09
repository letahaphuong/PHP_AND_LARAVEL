<?php
include_once(DOC_ROOT . "header.php")
?>

    <div class="container">
        <h1>Sua San Pham</h1>
        <form action="<?=DOC_URL?>controller=product&&action=updateProduct" method="post" enctype="multipart/form-data">
            <input type="hidden" id="id" name="id" class="form-control" value="<?php echo $product['id'] ?>">
            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo $product['name'] ?>">
            </div>
            <div class="form-group">
                <label for="price">Giá sản phẩm</label>
                <input type="text" id="price" name="price" class="form-control" value="<?php echo $product['price'] ?>">
            </div>
            <div class="form-group">
                <label for="imageUpload">Ảnh sản phẩm</label>
                <?php
                if (empty($product['image'])) { ?>
                    <h4> Chua co anh san pham!</h4>
                <?php } else { ?>
                    <img style="width: 50px;height: 50px" src="<?= $product['image'] ?>" alt="">
                <?php }
                ?>
                <input type="file" id="imageUpload" name="imageUpload" class="form-control">
            </div>
            <div class="form-group">
                <label for="category_id">Danh mục</label>
                <select name="category_id" id="category_id">
                    <option <?php if ($product['category_id'] == 2) {
                        echo 'selected';
                    } ?> value="2">Mobile
                    </option>
                    <option <?php if ($product['category_id'] == 3) {
                        echo 'selected';
                    } ?> value="3">Apple
                    </option>
                    <option <?php if ($product['category_id'] == 4) {
                        echo 'selected';
                    } ?> value="4">Laptop
                    </option>
                    <option <?php if ($product['category_id'] == 5) {
                        echo 'selected';
                    } ?> value="5">Desktop
                    </option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

<?php
include_once(DOC_ROOT . "footer.php")
?>