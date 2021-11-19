<?php

class User extends controller{
    public function login(){
        $this->view("userlogin");
    }
    public function logout(){
        $this->view("userlogout");
    }
    public function checklogin($username, $password){
        return $this->model("UserModel")->CheckLogin($username, $password);
    }
}
?>