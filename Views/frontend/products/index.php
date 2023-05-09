<?php
include_once(DOC_ROOT . "header.php");
?>
<div class="container">
    <h1 class="text-center">Danh sach san pham</h1>
    <a class="btn btn-primary float-end" href="/mvcproject/Views/frontend/products/store.php">Them moi</a>
    <div class="row">
        <div class="col-lg-6 d-">
            <form action="" method="post">

                <input type="search" name="search" placeholder="Nhập tên sản phẩm" value="<?= $_POST['search'] ?>">
                <select name="sort">
                    <option value="">--Xắp sếp--</option>
                    <option value="ASC" <?php if ($_POST['sort'] == 'ASC') {
                        echo 'selected';
                    } ?>>Giảm dần
                    </option>
                    <option value="DESC" <?php if ($_POST['sort'] == 'DESC') {
                        echo 'selected';
                    } ?>>Tăng dần
                    </option>
                </select>
                <button class="btn" style="border: #1E1F29 solid 1px" type="submit">tim kiem</button>
            </form>
        </div>
        <div class="col-lg-6">
        </div>

    </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>STT</th>
            <th>ten san pham</th>
            <th>Gia</th>
            <th>Anh san pham</th>
            <th>Categories</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php if (isset($products)) {
            foreach ($products as $key => $item) : ?>
                <tr>
                    <td><?php echo $key + 1 ?></td>
                    <td><?php echo $item['name'] ?></td>
                    <td><?php echo $item['price'] . " " ?>đ</td>
                    <td><img src="<?php echo $item['image'] ?>" style="width: 90px;height: 90px" alt=""></td>
                    <td>
                        <a class="btn btn-primary"
                           href="<?= DOC_URL ?>controller=product&action=update&id=<?php echo $item['id']; ?>">Sua</a>
                        <a class="btn btn-danger"
                           onclick="return confirm('Ban chac chan muon xoa san pham : [<?= $item['name'] ?>] khong?')"
                           href="<?= DOC_URL ?>controller=product&action=delete&id=<?php echo $item['id']; ?>">Xoa</a>
                    </td>
                </tr>
            <?php endforeach;
        } ?>
        </tbody>
    </table>
    <div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <?php
                include_once(DOC_FE . 'products/pagination.php');
                ?>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</div>

<?php
include_once(DOC_ROOT . "footer.php");
?>

