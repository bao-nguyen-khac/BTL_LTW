<?php
require_once "./mvc/core/basehref.php";
class AdminController extends controller{
   
    public function viewHome(){
        $this->view("admin/adminview",[
            'page' => 'home',
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
    public function ordersList(){
        $this->view("admin/adminview",[
            'page' => 'list_order',
        ]);
    }
    public function ordersListAjax(){
        $order_detail = $this->model("OrderDetailModel")->getAllOrder();
        $this->view("admin/pages/list_order_ajax",[
            'order_detail' => $order_detail
        ]);
    }
    public function viewCustomer($customer_id){
        $customer_detail = $this->model("UserModel")->ViewDetail($customer_id);
        $this->view("admin/adminview",[
            'page' => 'customer_detail',
            'customer_detail' => $customer_detail
        ]);
    }
    public function changeAction($order_id){
        $this->model("OrderDetailModel")->changeAction($order_id);
        header('Location: ' . getUrl() .'/AdminController/ordersList');
    }
    public function hideOrder($order_id){
        $this->model("OrderDetailModel")->hideOrder($order_id);
        header('Location: ' . getUrl() .'/AdminController/ordersList');
    }
}
?>