<?php

class AdminController extends controller{
   
    public function viewHome(){
        $order_detail = $this->model("OrderDetailModel");
        $this->view("admin/adminview",[
            // 'page' => 'list_order',
            // 'order_detail' => $order_detail->getAllOrder()
        ]);
    }
    public function login(){
        $this->view("adminlogin");
    }
    public function logout(){
        $this->view("adminlogout");
    }
    public function checklogin($username, $password){
        return $this->model("AdminModel")->CheckLogin($username, $password);
    }
    public function viewCustomer($customer_id){
        $customer_detail = $this->model("UserModel");
        $this->view("adminview",[
            'page' => 'customer_detail',
            'customer_detail' => $customer_detail->ViewDetail($customer_id)
        ]);
    }
}
?>