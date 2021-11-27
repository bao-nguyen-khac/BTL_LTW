<?php 
    if (!isset($_SESSION["id_customer"])) {
        header("Location:" . getUrl() . "/UserController/login/PaymentController");
    }
?>
<div class="content_top">
    <div class="back-links">
        <p><a href="./HomeController/viewHome">Home</a> >> <a href="./PaymentController/viewStatusOldOrder">View Orders Placed</a></p>
    </div>
    <div class="clear"></div>
</div>
<div class="list-products">
    <div class="container __cart-table">
        <table class="customer-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Time</th>
                    <th>Products</th>
                    <th>Total Price</th>
                    <th>Status</th>
                </tr>
            </thead>
            <?php $count = $page*$qty - $qty + 1;
            foreach ($order_detail as $order) :
                $status = '';
                if ($order['status'] == 0) {
                    $status = 'Pending';
                } else if ($order['status'] == 1) {
                    $status = 'Shipping...';
                } else {
                    $status = 'Done';
                }
            ?>
                <tr>
                    <td><?= $count ?></td>
                    <td><?= $order['date_order']; ?></td>
                    <td><?php
                        foreach ($order['products'] as $product) {
                            echo $product['product_name'] . ' x ' . $product['qty'];
                            echo '<br>';
                        }
                        ?></td>
                    <td><?= number_format($order['totalprice']) ?>đ</td>
                    <td><?= $status; ?></a></td>
                </tr>
            <?php $count++;
            endforeach; ?>
        </table>
    </div>
</div>
<div class="select-page">
    <?php if ($page > 1) : ?>
        <div class="pre-page">
            <a href="./PaymentController/viewStatusOldOrder/<?= $_SESSION['id_customer'] ?>/<?= $page - 1 ?>">
                << Prev </a>
        </div>
    <?php endif; ?>
    <?php if ($checkNext == 1) : ?>
        <div class="next-page">
            <a href="./PaymentController/viewStatusOldOrder/<?= $_SESSION['id_customer'] ?>/<?= $page + 1 ?>"> Next >></a>
        </div>
    <?php endif; ?>

    <div class="clear"></div>
</div>