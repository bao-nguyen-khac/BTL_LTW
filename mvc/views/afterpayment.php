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
                <div class="container">
                    <h3 class="tks-for-payment">Thank you for payment</h3>
                </div>
            </div>
        </div>
    </div>
</body>
</html>