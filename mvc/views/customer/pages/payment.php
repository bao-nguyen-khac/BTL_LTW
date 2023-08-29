<?php 
    if (!isset($_SESSION["id_customer"])) {
        header("Location:" . getUrl() . "/UserController/login/PaymentController");
    }
?>
<div class="content_top">
    <div class="back-links">
        <p><a href="./HomeController/viewHome">Home</a> >> <a href="./PaymentController/viewHome">Payment</a></p>
    </div>
    <div class="clear"></div>
</div>
<div class="container __cart-table">
    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <?php
        $sum = 0;
        foreach ($productsInCart as $product) :
            if (!is_array($product)) {
                continue;
            }
            $sum += $product['gia'] * $product['qty'];
        ?>
            <tbody>
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-2 hidden-xs"><img src="./public/img/<?= $product['anh'] ?>" alt="..." class="img-responsive" /></div>
                            <div class="col-sm-10">
                                <h4 class="nomargin"><?= $product['ten']; ?></h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price"><?= number_format($product['gia']); ?>đ</td>
                    <td data-th="Quantity">
                        x <?= $product['qty']; ?>
                    </td>
                    <td data-th="Subtotal" class="text-center SubtotalCart" data-subtotal="<?= $product['id'] ?>"><?= number_format($product['gia'] * $product['qty']); ?>đ</td>
                </tr>
            </tbody>
        <?php
        endforeach;
        $_SESSION['cart']['totalprice'] = $sum ?>
        <tfoot>
            <tr>
                <td><a href="./CartController/viewHome" class="btn btn-warning"><i class="fa fa-angle-left"></i> Back to cart</a></td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>Total <?= number_format($sum) ?>đ</strong></td>
                <td><a href="./PaymentController/recordOrder" class="btn btn-success btn-block">Payment <i class="fa fa-angle-right"></i></a></td>
            </tr>
        </tfoot>
    </table>
</div>