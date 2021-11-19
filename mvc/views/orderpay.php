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
        <table class="cart-table">
            <tr>
                <td>No.</td>
                <td>Product name</td>
                <td>Price</td>
                <td>Quantity</td>
                <td>Total</td>
            </tr>
            <?php $count = 1; $sum = 0; foreach ($productsInCart as $product): $sum += $product['price'] * $product['qty'];
            if(!is_array($product)){
                continue;
            }
            ?>
            <tr>
                <td><?= $count ?></td>
                <td><?= $product['name'];?></td>
                <td><?= $product['price']; ?> VND</td>
                <td><?= $product['qty']; ?></td>
                <td><?= $product['price'] * $product['qty'];?> VND</td>
            </tr>
            <?php $count++; endforeach; $_SESSION['cart']['totalprice'] = $sum?>
        </table>
        <div class="order-sum">Sum: <?= $sum; ?> VND</div>
        <a href="./Orderpay/recordOrder" class="pay-order">Thanh Toan</a> 
        <a href="./Cart/viewHome">Tro lai gio hang</a>
    </div>
</body>
</html>