<?php
require_once "./mvc/core/basehref.php";
$home_url = getUrl() . '/';
$message = "";
if (count($_POST) > 0) {
	$username = $_POST["username"];
    $password = $_POST["password"];
    $user = new UserController;
    $row = $user->checklogin($username,$password);
    if(is_array($row)){
        $_SESSION["id_customer"] = $row['id'];
        $_SESSION["name_customer"] = $row['username'];
    }else{
        $message = "Invalid Username or Password!";
    }
}
if (isset($_SESSION["id_customer"])) {
	header("Location:".getUrl()."/".$turnBack."/viewHome");
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
    <title>Login</title>
    <link rel="stylesheet" href="./public/css/login.css?v=1">
</head>

<body>
    <div class="main">
        <form action="" method="POST" class="form" id="form-1">
            <h3 class="heading">Sign up</h3>
            <p class="desc">Wellcome to BKU Shop ❤️</p>

            <div class="spacer"></div>
            <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <input id="username" name="username" type="text" placeholder="Your username" class="form-control">
                <span class="form-message"></span>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input id="password" name="password" type="password" placeholder="Your password" class="form-control">
                <span class="form-message"></span>
            </div>

            <span class="form-message"><?php if($message!="") { echo $message; } ?></span>
            <button class="form-submit">Login</button>
            <div class="register">
                <span>Not register?</span>
                <span><a href="./UserController/register">Create an account</a></span>
            </div>
        </form>
    </div>
    <script src="./public/js/validator.js"></script>
    <script>
        Validator({
            form: '#form-1',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#username'),
                Validator.isRequired('#password'),
            ],
        })
    </script>
</body>
</body>

</html>