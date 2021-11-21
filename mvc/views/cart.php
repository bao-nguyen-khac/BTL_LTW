<?php
require_once "./mvc/core/basehref.php";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="./public/css/style.css?v=1" rel="stylesheet" type="text/css" media="all" />
    <link href="./public/css/style2.css?v=1" rel="stylesheet" type="text/css" media="all" />
    <!-- <link href="./public/css/menu.css" rel="stylesheet" type="text/css" media="all" /> -->
</head>

<body>
    <div class="wrap">
        <?php require_once "./mvc/views/blocks/header.php"; ?>
        <div class="main">
            <div class="content">
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
                        <?php $count = 1; $sum = 0;
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
                                        <input type="number" class="form-control text-center cart-qty" data-prodid="<?= $product['id'] ?>" value="<?= $product['qty']; ?>">
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
                                <td><a href="" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
                            </tr>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="./public/js/main.js?v=1"></script>
</html>