<?php
require_once "./mvc/core/basehref.php";
if (!isset($_SESSION["id_customer"])) {
    header("Location:" . getUrl() . "/User/login");
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
                        <p><a href="./HomeController/viewHome">Home</a> >> <a href="./CartController/viewHome">Payment</a></p>
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
                                        x <?= $product['qty']; ?>
                                    </td>
                                    <td data-th="Subtotal" class="text-center SubtotalCart" data-subtotal="<?= $product['id'] ?>"><?= number_format($product['price'] * $product['qty']); ?>đ</td>
                                </tr>
                            </tbody>
                        <?php
                        endforeach; $_SESSION['cart']['totalprice'] = $sum?>
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
            </div>
        </div>
    </div>
    <a id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
</body>

</html>