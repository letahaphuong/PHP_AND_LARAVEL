<?php
//include_once(DOC_ROOT . "header.php");
//?>
<div class="row">
    <div class="container row">
        <div class="col-2"></div>
        <div class="col-8">
            <h1>Thêm sản phẩm</h1>
            <form action="/mvcproject/index.php?controller=product&action=store" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Tên sản phẩm: </label>
                    <input type="text" id="name" name="name" class="form-control">
                    <p style="color: red"><?php if (!empty($nameErr)) {
                            echo $nameErr;
                        } ?></p>
                </div>
                <div class="form-group">
                    <label for="image">Link ảnh: </label>
                    <input type="file" id="image" name="imageUpload" class="form-control">
                    <p style="color: red"><?php if (!empty($imageErr)) {
                            echo $imageErr;
                        } ?></p>
                </div>
                <div class="form-group">
                    <label for="price">Giá: </label>
                    <input type="text" id="price" name="price" class="form-control">
                    <p style="color: red"><?php if (!empty($priceErr)) {
                            echo $priceErr;
                        } ?></p>
                </div>
                <div class="form-group">
                    <label for="category_id">Danh mục sản phẩm: </label>
                    <select name="category_id" id="category_id">
                        <option value="2">Mobile</option>
                        <option value="3">Apple</option>
                        <option value="4">Laptop</option>
                        <option value="5">Desktop</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
        <div class="col-2"></div>
    </div>
</div>
<?php
//include_once(DOC_ROOT . "footer.php");
//?>