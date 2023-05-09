<?php
include_once(DOC_ROOT . 'header.php');
?>

<section class="section-name padding-y-sm">
    <div class="container">
        <header class="section-heading">
            <h3 class="section-title">Danh sách <?php while ($item = $getProductByCategory[0]) {echo $item['categoryName']; break;}  ?></h3>
        </header>
        <div class="row">
            <?php
            if (!empty($getProductByCategory)) {
                foreach ($getProductByCategory as $item) :
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
                                   href="<?php echo DOC_URL ?> controller=product&&action=show&&id=<?php echo $item['id']; ?>">Detail</a>
                                <a class="btn btn-primary"
                                   href="<?php echo DOC_URL ?> controller=cart&&action=store&&id=<?php echo $item['id']; ?>">Mua hàng</a>
                            </div>
                        </div>
                    </div>
                <?php
                endforeach;
            } else { ?>
                <div class="col-md-3">
                    <strong style="color: red">No content</strong>
                </div>
                <?php
            }
//            include_once(DOC_FE . 'home/pagination.php');
            ?>
        </div>
        <br>
    </div>
</section>

<?php
include_once(DOC_ROOT . 'footer.php');
?>


