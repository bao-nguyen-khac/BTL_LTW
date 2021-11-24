<?php

class UserController extends controller{
    public function login($turnBack = 'HomeController'){
        $this->view("userlogin",[
            'turnBack' => $turnBack
        ]);
    }
    public function logout(){
        $this->view("userlogout");
    }
    public function checklogin($username, $password){
        return $this->model("UserModel")->CheckLogin($username, $password);
    }
}
?>