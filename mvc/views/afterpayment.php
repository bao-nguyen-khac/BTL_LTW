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
    <title>Document</title>
    <link rel="stylesheet" href="./public/css/main.css">
    <link rel="stylesheet" href="./public/css/grid.css">
</head>
<body>
    <div class="grid wide main">
        <?php require_once "./mvc/views/blocks/header.php";?>
        <div class="row">
            <div id="leftCol" class="col l-3">
            <?php require_once "./mvc/views/blocks/categoriesblock.php";?>
            </div>
            <div id="rightCol" class="col l-9">
                <h3 class="tks-for-payment">Cảm ơn đã mua hàng</h3>
                <a class="countinue-add" href="./Home/viewHome">Trở về trang chủ</a>
            </div>
        </div>
        
    </div>
</body>
</html>