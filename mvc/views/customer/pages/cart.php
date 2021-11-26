<div class="content_top">
    <div class="back-links">
        <p><a href="./HomeController/viewHome">Home</a> >> <a href="./CartController/viewHome">Carts</a></p>
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
        <?php $count = 1;
        $sum = 0;
        foreach ($productsInCart as $product) :
            if (!is_array($product)) {
                continue;
            }
            $sum += $product['price'] * $product['qty'];
        ?>
            <tbody>
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-2 hidden-xs"><img src="./public/img/<?= $product['image'] ?>" alt="..." class="img-responsive" /></div>
                            <div class="col-sm-10">
                                <h4 class="nomargin"><?= $product['name']; ?></h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price"><?= number_format($product['price']); ?>đ</td>
                    <td data-th="Quantity">
                        <input type="number" class="form-control text-center cart-qty" data-prodid="<?= $product['id'] ?>" value="<?= $product['qty']; ?>" min="1">
                    </td>
                    <td data-th="Subtotal" class="text-center SubtotalCart" data-subtotal="<?= $product['id'] ?>"><?= number_format($product['price'] * $product['qty']); ?>đ</td>
                    <td class="actions" data-th="">
                        <a href="./CartController/viewHome"><button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button></a>
                        <a href="./CartController/deleteInCart/<?= $product['id'] ?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></a>
                    </td>
                </tr>
            </tbody>
        <?php $count++;
        endforeach; ?>
        <tfoot>
            <tr>
                <td><a href="./HomeController/viewHome" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue
                        Shopping</a></td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>Total <?= number_format($sum) ?>đ</strong></td>
                <?php if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) : ?>
                    <td><button class="btn btn-success btn-block" onclick="alert('Cart is empty can not check out!')">Checkout <i class="fa fa-angle-right"></i></button></td>
                <?php else : ?>
                    <td><a href="./PaymentController/viewHome" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
                <?php endif; ?>
            </tr>
        </tfoot>

    </table>
</div>