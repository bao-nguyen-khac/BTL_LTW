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
    <link href="./public/css/style.css?v=1" rel="stylesheet" type="text/css" media="all" />
    <link href="./public/css/style2.css?v=1" rel="stylesheet" type="text/css" media="all" />
    <link href='//fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>

</head>

<body>
    <div class="wrap">
        <?php require_once "./mvc/views/blocks/header.php"; ?>
        
        <div class="main">
            <div class="content">
                <?php if($data['Page'] == 'detailproduct'){
                    foreach ($categories as $category) {
                        if ($category['id'] == $product['category_id']) {
                            echo '
                                <div class="content_top">
                                    <div class="back-links">
                                        <p><a href="./HomeController/ViewHome">Home</a> >> <a href="./HomeController/viewCategory/'. $category['id'] .'">'. $category['name'] .'</a></p>
                                    </div>

                                    <div class="clear"></div>
                                </div>';
                        }
                    }
                } ?>
                <div class="section group">
                    
                    <?php require_once "./mvc/views/pages/" . $data["Page"] . ".php"; ?>
                    
                    <?php require_once "./mvc/views/blocks/sliderbar.php"; ?>
                </div>
            </div>
        </div>
    </div>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
</body>

</html>