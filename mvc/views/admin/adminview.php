<?php
require_once "./mvc/core/basehref.php";
$home_url = getUrl() . '/';

if (!isset($_SESSION["id_admin"])) {
	header("Location:".getUrl()."/AdminController/login");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./public/css/admin.css?v=2">
</head>

<body id="admin">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php require_once "./mvc/views/admin/blocks/header.php"; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-2 left-col">
                <?php require_once "./mvc/views/admin/blocks/sidebar.php"; ?>
            </div>
            <div class="col-10 right-col">
                <div class="__content-admin">
                    <?php if ($page == 'home') : ?>
                        <h3>Dashboard</h3>
                        <p>Welcome admin page</p>
                    <?php else : ?>
                        <?php require_once "./mvc/views/admin/pages/" . $data["page"] . ".php"; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 footer">
                <p>BTL Web group 1</p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>