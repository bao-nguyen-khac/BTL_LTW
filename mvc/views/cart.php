<?php
require_once "./mvc/core/basehref.php";
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
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
   
</head>
<body>
    <div class="grid wide main">
        <?php require_once "./mvc/views/blocks/header.php";?>
        <table class="cart-table">
            <tr>
                <td>No.</td>
                <td>Product name</td>
                <td>Price</td>
                <td>Quantity</td>
                <td>Total</td>
                <td>Action</td>
            </tr>
            <?php $count = 1; foreach ($productsInCart as $product): 
            if(!is_array($product)){
               continue;
            }
            ?>
            <tr>
                <td><?= $count ?></td>
                <td><?= $product['name'];?></td>
                <td><?= $product['price']; ?></td>
                <td><?= $product['qty']; ?> VND</td>
                <td><?= $product['price'] * $product['qty'];?> VND</td>
                <td><a class="delete-action" href="./Cart/deleteInCart/<?= $product['id'] ?>">Delete</a></td>
            </tr>
            <?php $count++; endforeach; ?>
        </table>
        <div id="hover">
            <i class="fas fa-arrow-left"></i>
            <a class="countinue-add" href="./Home/viewHome">Tiếp tục mua hàng</a>
        </div>
        <a href="./Orderpay/viewHome" class="pay-order">Mua Hang</a>
    </div>

</body>
</html>