<?php
require_once "./mvc/core/basehref.php";
unset($_SESSION["id_customer"]);
unset($_SESSION["name_customer"]);
header("Location:".getUrl()."/UserController/login");