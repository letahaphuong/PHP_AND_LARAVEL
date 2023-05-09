<?php
include_once(DOC_ROOT . 'header.php');
?>
<section class="section-name padding-y-sm">
    <div class="container">
        <header class="section-heading text-center">
            <br>
            <h3 class="section-title">Danh sách sản phẩm</h3>
        </header>
        <br>
        <div class="row">
            <div class="col-lg-6 d-">
                <form action="" method="post">

                    <input type="search" name="search" placeholder="Nhập tên sản phẩm" value="<?= $_POST['search'] ?>">
                    <select name="sort">
                        <option>--Xắp sếp--</option>
                        <option value="ASC" <?php if ($_POST['sort'] == 'ASC') {
                            echo 'selected';
                        } ?>>Giảm dần
                        </option>
                        <option value="RAND()" <?php if ($_POST['sort'] == 'RAND()') {
                            echo 'selected';
                        } ?>>Ngẫu nhiên
                        </option>
                        <option value="DESC" <?php if ($_POST['sort'] == 'DESC') {
                            echo 'selected';
                        } ?>>Tăng dần
                        </option>
                    </select>
                    <button class="btn" style="border: #1E1F29 solid 1px" type="submit">Search</button>
                </form>
            </div>
            <div class="col-lg-6">
            </div>

        </div>
        <br>
        <div class="row">
            <?php
            if (!empty($products)) {
                foreach ($products as $item) :
                    ?>
                    <div class="col-md-3">
                        <div class="card" style="width: 18rem; height: 384px">
                            <?php
                            if (empty($item['image'])) {
                                ?>
                                <img class="card-img-top"
                                     src="https://www.freeiconspng.com/thumbs/no-image-icon/no-image-icon-6.png"
                                     alt="Card image cap">
                            <?php } else {
                                ?>
                                <img class="card-img-top" src="<?php echo $item['image'] ?>" alt="Card image cap">
                                <?php
                            }
                            ?>

                            <div class="card-body">
                                <p class="card-text">Name Product: <?php echo $item['name'] ?></p>
                                <p class="card-text">Product
                                    price: <?= number_format($item['price'], 0, ',', '.') . " " ?>đ</p>
                            </div>
                            <div class="card-footer">
                                <a class="btn btn-primary"
                                   href="<?php echo DOC_URL ?> controller=product&&action=show&&id=<?php echo $item['id']; ?>">Chi
                                    tiết</a>
                                <a class="btn btn-primary"
                                   href="<?php echo DOC_URL ?> controller=cart&&action=store&&id=<?php echo $item['id']; ?>">Mua
                                    hàng</a>
                            </div>
                        </div>
                    </div>
                <?php
                endforeach;
            } else { ?>
                <div class="col-md-3">
                    <strong style="color: red">Không tìm thấy kết quả!!!</strong>
                </div>
                <?php
            } ?>
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <?php
                    include_once(DOC_FE . 'home/pagination.php');
                    ?>
                </div>
                <div class="col-3"></div>
            </div>

        </div>
        <br>
    </div>
</section>

<?php
include_once(DOC_ROOT . 'footer.php');
?>

