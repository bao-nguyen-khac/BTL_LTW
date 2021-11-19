<table class="admin-table">
        <tr>
            <td>No.</td>
            <td>Time</td>
            <td>Products name</td>
            <td>Total Price</td>
            <td>Customer ID</td>
            <td>Customer</td>
            <td>Action</td>
        </tr>
            <?php $count = 1; foreach ($order_detail as $order): ?>
            <tr>
                <td><?= $count ?></td>
                <td><?= $order['date_order'];?></td>
                <td><?php 
                    foreach($order['products'] as $product){
                        echo $product['qty'].' x '.$product['product_name'];
                        echo '<br>';
                    }
                ?></td>
                <td><?= $order['totalprice']; ?> VND</td>
                <td><?= $order['customer_id']; ?> </td>
                <td><a href="./Admin/viewCustomer/<?= $order['customer_id'] ?>">View customer</a></td>
                <td><a class="admin-action" href="#"><?=$order['status'];?></a></td>
            </tr>
            <?php $count++; endforeach; ?>
    </table>