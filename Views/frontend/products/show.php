<?php
include_once(DOC_ROOT . "header.php");
?>
    <div class="row">
        <div class="row">
            <form>
                <div class="container d-flex justify-content-between">
                    <div class="col-xs-5 item-photo me-5">
                        <img src="<?= $product['image'] ?>" style="max-width:100%;width: 675px; height: 540px" alt=""/>
                    </div>
                    <div class="col-xs-6 justify-content-between" style="border:0px">
                        <br>
                        <br>
                        <h3><?= $product['name'] ?></h3>
                        <h5 class=""><span>Product price:</span></h5>
                        <span class="title-text"><?= number_format($product['price'], 0, '.', ',') . " " ?> đ</span>
                        <div class="section">
                            <h6 class="title-attr" style="margin-top:15px;"><span
                                    style="color: blue">Tư vấn mua hàng :</span> <span
                                    class="title-attr">0964 80 81 85</span></h6>
                        </div>
                        <div class="section" style="padding-bottom:20px;">
                            <a class="btn btn-primary"
                               href="<?php echo DOC_URL ?> controller=cart&&action=store&&id=<?php echo $product['id']; ?>">Mua hàng</a>
                        </div>
                        <div>
                        </div>
                    </div>
                    <div class="col-xs-1"></div>

                </div>
            </form>
        </div>
        <div class="row container">
            <hr>
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <h3>Sản phẩm liên quan</h3>
                <div class="row">
                    <?php if (!empty($productByCate)) {
                        foreach ($productByCate as $item) :
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
                                        <img class="card-img-top" src="<?php echo $item['image'] ?>"
                                             alt="Card image cap">
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
                                           href="<?php echo DOC_URL ?> controller=cart&&action=store&&id=<?php echo $product['id']; ?>">Mua hàng</a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endforeach;
                    } else { ?>
                        <strong style="color: red">Không có sản phẩm liên quan!!</strong>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>
<?php
include_once(DOC_ROOT . "footer.php");
?>