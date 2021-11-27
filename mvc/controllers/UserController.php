<?php

class UserController extends controller{
    public function login($turnBack = 'HomeController'){
        $this->view("customer/userlogin",[
            'turnBack' => $turnBack
        ]);
    }
    public function logout(){
        $this->view("customer/userlogout");
    }
    public function checklogin($username, $password){
        return $this->model("UserModel")->CheckLogin($username, $password);
    }
    public function register(){
        $this->view("customer/userregister");
    }
    public function addUser($fullname,$address,$phone,$username,$password){
        return $this->model("UserModel")->addUser($fullname,$address,$phone,$username,$password);
    }
}
?>