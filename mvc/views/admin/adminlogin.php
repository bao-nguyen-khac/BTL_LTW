<?php
require_once "./mvc/core/basehref.php";
$message = "";
if (count($_POST) > 0) {
	$username = $_POST["username"];
    $password = $_POST["password"];
    $user = new Admin;
    $row = $user->checklogin($username,$password);
    if(is_array($row)){
        $_SESSION["id_admin"] = $row['id'];
        $_SESSION["name_admin"] = $row['username'];
    }else{
        $message = "Invalid Username or Password!";
    }
}
if (isset($_SESSION["id_admin"])) {
	header("Location:".getUrl()."/Admin/viewHome");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form action="" method="post">
        <h1>Admin Login</h1>

        <div>
            <input type="text" placeholder="Username" required="" name="username" />
        </div>
        <div>
            <input type="password" placeholder="Password" required="" name="password" />
        </div>
        <div>
            <input type="submit"  name="submit" value="Log in" />
        </div>
        <input type="reset">
        <div class="message"><?php if($message!="") { echo $message; } ?></div>
    </form>
</body>
</body>

</html>