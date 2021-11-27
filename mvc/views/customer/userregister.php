<?php
require_once "./mvc/core/basehref.php";
$home_url = getUrl() . '/';
$message = "";
$checkRegister = "";
if (count($_POST) > 0) {
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
	$username = $_POST["username"];
    $password = $_POST["password"];
    $user = new UserController;
    if($user->addUser($fullname,$address,$phone,$username,$password)){
        $message = "Register is susccess!";
        $checkRegister = "susccess";
    }else{
        $message = "Your username is duplicate!";
        $checkRegister = "error";
    }
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
    <title>Register</title>
    <link rel="stylesheet" href="./public/css/login.css">
</head>

<body>
    <div class="main">
        <form action="" method="POST" class="form" id="form-1">
            <h3 class="heading">Sign up</h3>
            <p class="desc">Become a member of BKU Shop ❤️</p>

            <div class="spacer"></div>
            <div class="form-group">
                <label for="fullname" class="form-label">Full Name</label>
                <input id="fullname" name="fullname" type="text" placeholder="Ex: Brian Nguyen" class="form-control">
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="address" class="form-label">Adress</label>
                <input id="address" name="address" type="text" placeholder="Your address" class="form-control">
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="phone" class="form-label">Phone number</label>
                <input id="phone" name="phone" type="text" placeholder="Your phone number" class="form-control">
                <span class="form-message"></span>
            </div>
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
            <div class="form-group">
                <label for="password_confirmation" class="form-label">Repeat password</label>
                <input id="password_confirmation" name="password_confirmation" placeholder="Repeat password" type="password" class="form-control">
                <span class="form-message"></span>
            </div>
            
            <span class="form-message <?= $checkRegister ?>"><?php if($message!="") { echo $message; } ?></span>
            <button class="form-submit">Register</button>
            <div class="register">
                <span>Have an account?</span>
                <span><a href="./UserController/login">Sign in now!</a></span>
            </div>
        </form>
    </div>
    <script src="./public/js/validator.js"></script>
    <script>
        Validator({
            form: '#form-1',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#fullname'),
                Validator.isRequired('#address'),
                Validator.isRequired('#phone'),
                Validator.isRequired('#username'),
                Validator.minLength('#username', 2),
                Validator.isRequired('#password'),
                Validator.minLength('#password', 2),
                Validator.isRequired('#password_confirmation'),
                Validator.isConfirmed('#password_confirmation', function() {
                    return document.querySelector('#form-1 #password').value;
                }, 'Re-entered password is incorrect')
            ],
        })
    </script>
</body>
</body>

</html>