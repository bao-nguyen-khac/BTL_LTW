<?php
require_once "./mvc/core/basehref.php";
if (!isset($_SESSION["id_customer"])) {
    header("Location:" . getUrl() . "/UserController/login/HomeController");
}
$home_url = getUrl() . '/';
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
    <title>BKU Shop</title>
    <link href='//fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="./public/css/style.css?v=1" rel="stylesheet" type="text/css" media="all" />
    <link href="./public/css/style2.css?v=1" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
    <div class="wrap">
        <?php require_once "./mvc/views/blocks/header.php"; ?>
        <div class="main">
            <div class="content">
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
                            <?php $count = 1;
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
                            <a href="./PaymentController/viewStatusOldOrder/<?= $_SESSION['id_customer'] ?>/<?= --$page ?>">
                                << Prev </a>
                        </div>
                    <?php endif; ?>
                    <?php if ($checkNext == 1) : ?>
                        <div class="next-page">
                            <a href="./PaymentController/viewStatusOldOrder/<?= $_SESSION['id_customer'] ?>/<?= ++$page ?>"> Next >></a>
                        </div>
                    <?php endif; ?>

                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>