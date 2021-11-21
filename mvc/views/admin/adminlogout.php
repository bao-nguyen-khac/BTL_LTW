<?php
require_once "./mvc/core/basehref.php";
unset($_SESSION["id_admin"]);
unset($_SESSION["name_admin"]);
header("Location:".getUrl()."/Admin/login");