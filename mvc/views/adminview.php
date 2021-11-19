<?php
	require_once "./mvc/core/basehref.php";
    $home_url = getUrl().'/';
?>
<?php

if (!isset($_SESSION["id_admin"])) {
	header("Location:".getUrl()."/Admin/login");
}
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
    <title>Admin</title>
    <link rel="stylesheet" href="./public/css/main.css">
    <link rel="stylesheet" href="./public/css/grid.css">
</head>
<body>
    <div class="grid wide main">
        <?php require_once "./mvc/views/blocks/header_admin.php";?>
    Welcome <?php echo $_SESSION["name_admin"]; ?>. Click here to <a href="./Admin/logout" tite="Logout">Logout.</a>
   
    <?php require_once "./mvc/views/pages/".$data["page"].".php";?>
    
    </div>

</body>
</html>