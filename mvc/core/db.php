<?php

class db{

    public $connect;
    protected $servername = "mysql";
    protected $username = "root";
    protected $password = "root";
    protected $dbname = "banhang";

    function __construct(){
        $this->connect = mysqli_connect($this->servername, $this->username, $this->password);
        mysqli_select_db($this->connect, $this->dbname);
        mysqli_query($this->connect, "SET NAMES 'utf8'");
    }
}

?>