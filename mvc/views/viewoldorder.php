<?php
	require_once "./mvc/core/basehref.php";
    if (!isset($_SESSION["id_customer"])) {
        header("Location:".getUrl()."/User/login");
    }
    $home_url = getUrl().'/';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        echo "<base href='${home_url}'>";
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Shop</title>
    <link rel="stylesheet" href="./public/css/main.css">
    <link rel="stylesheet" href="./public/css/grid.css">
</head>
<body>
    Welcome <?php echo $_SESSION["name_customer"]; ?>
    Click here to <a href="./User/logout" tite="Logout">Logout.
    <div class="grid wide main">
        <?php require_once "./mvc/views/blocks/header.php";?>
    <table class="admin-table">
        <tr>
            <td>No.</td>
            <td>Time</td>
            <td>Products name</td>
            <td>Total Price</td>
            <td>Status</td>
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
                <td><?=$order['status'];?></a></td>
            </tr>
            <?php $count++; endforeach; ?>
    </table>
    </div>
</body>
</html>