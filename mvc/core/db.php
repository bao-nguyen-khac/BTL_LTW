<?php

class db{

    public $connect;
    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "bao7122001";
    protected $dbname = "php_youtube";

    function __construct(){
        $this->connect = mysqli_connect($this->servername, $this->username, $this->password);
        mysqli_select_db($this->connect, $this->dbname);
        mysqli_query($this->connect, "SET NAMES 'utf8'");
    }
}

?>