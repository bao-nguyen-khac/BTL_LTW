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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
            <?php require_once "./mvc/views/pages/".$data["Page"].".php";?>
            </div>
        </div>
        
    </div>
    
</body>
</html>