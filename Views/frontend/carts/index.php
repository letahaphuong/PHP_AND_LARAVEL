<?php
include_once(DOC_ROOT . "header.php");
?>
<div *ngIf="cartList?.length != 0" class="container px-3 my-5 clearfix">
    <!-- Shopping cart table -->
    <div class="card">
        <?php if (count($products) != 0) { ?>
            <div class="card-header">
                <h2 class="fw-bold">Giỏ hàng</h2>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <form action="<?= DOC_URL ?>controller=cart&&action=updateCart" method="post">
                        <table class="table table-bordered m-0">
                            <thead>
                            <tr>
                                <!-- Set columns width -->
                                <th class="text-center py-3 px-4" style="min-width: 400px;">Tên sản phẩm và thông tin
                                    chi
                                    tiết
                                </th>
                                <th class="text-right py-3 px-4" style="width: 100px;">Đơn giá</th>
                                <th class="text-center py-3 px-4" style="width: 120px;">Số lượng</th>
                                <th class="text-center py-3 px-4" style="width: 120px;">Thành tiền</th>
                                <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#"
                                                                                                       class="shop-tooltip float-none text-light"
                                                                                                       title=""
                                                                                                       data-original-title="Clear cart"><i
                                            class="ino ion-md-trash"></i></a></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($products)) : foreach ($products as $item) { ?>
                                <tr>
                                    <td class="p-4">
                                        <div class="d-flex media align-items-center">
                                            <img style="height:90px;width: 90px " src="<?= $item['image'] ?>"
                                                 class="d-block ui-w-40 ui-bordered mr-4" alt=""/>
                                            <div class="media-body">
                                                <a class="d-block text-dark"><?= $item['name'] ?></a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right font-weight-semibold align-middle p-4"><?= number_format($item['price'], 0, ',', '.') . ' ' ?>
                                        d
                                    </td>
                                    <td class="align-middle p-4">
                                        <input type="number" name="qty[<?= $item['id'] ?>]"
                                               class="form-control text-center" value="<?= $item['qty'] ?>"/>
                                    </td>
                                    <td class="text-right font-weight-semibold align-middle p-4"><?= number_format($item['qty'] * $item['price'], 0, ',', '.') . ' ' ?>
                                        d
                                    </td>
                                    <td class="text-center align-middle px-0">
                                        <a onclick="return confirm('Ban co muon xoa : [ <?php echo $item['name'] ?> ] khong?');" href="<?= DOC_URL ?>controller=cart&&action=delete&&id=<?= $item['id'] ?>"
                                           class="text-danger">×</a></td>
                                </tr>
                            <?php } endif; ?>
                            </tbody>
                        </table>
                        <br>
                        <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
                            <div class="mt-4">
                            </div>
                            <div class="d-flex">
                                <div class="text-right mt-4">
                                    <label class="text-muted font-weight-normal m-0">Tổng tiền</label>
                                    <?php foreach ($products as $item) {
                                        $total += ($item['price'] * $item['qty']) ?>
                                    <?php } ?>
                                    <div class="text-large"><strong><?= number_format($total, 0, ',', '.') . ' ' ?>
                                            d</strong>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <p style="float: right">
                            <a onclick="return confirm('Ban co muon xoa tat ca khong?');" class="btn-danger btn" href="<?= DOC_URL ?>controller=cart&&action=deleteAll">Xoa tat
                                ca</a>
                            <button class="btn btn-success" type="submit">cap nhat</button>

                            <a href="<?= DOC_URL ?>controller=home">Tiep tuc mua hang</a>
                        </p>
                    </form>
                    <br>
                    <br>

                    <p>
                        <button onclick="showForm()" class="btn btn-primary">Dat hang</button>
                    </p>
                    <br>
                    <br>
                    <div id="form-order" class="form-order" style="display: none">
                        <form action="?controller=order&&action=store" method="post">
                            <label>Ten khach hang</label>
                            <input type="text" name="customer_name">
                            <br>
                            <label>Email khach hang</label>
                            <input type="text" name="customer_email">
                            <br>
                            <label>So dien thoai khach hang</label>
                            <input type="text" name="customer_phone">
                            <br>
                            <label>&nbsp; </label>
                            <button>Gui don hang</button>
                            <br>
                        </form>
                    </div>
                </div>


            </div>
        <?php } else { ?>
            <div class="row">
                <h3>Giỏ hàng trống!</h3>
                <a href="<?= DOC_URL ?>controller=home">Tiep tuc mua hang</a>
            </div>
        <?php } ?>
    </div>
</div>


<?php
include_once(DOC_ROOT . "footer.php");
?>
<style>
    .form-order label {
        width: 200px;
        float: left;
    }

    .form-order input {
        padding: 5px;
        width: 200px;
        margin-bottom: 10px;
    }
</style>
<script>
    function showForm() {
        $(".form-order").slideToggle();
    }
</script>