<?php
require_once "./mvc/core/basehref.php";
class Orderpay extends controller{
    public $CategoryModel ;
    public function __construct()
    {
        $this->CategoryModel = $this->model("CategoryModel");
    }
    public function viewHome(){
        if(!isset($_SESSION['cart'])){
            header('Location: ' . getUrl() .'/Home/viewHome');
        }
        $productsInCart = $_SESSION['cart'];
        $this->view("orderpay", [
            'productsInCart' => $productsInCart
        ]);
    }
    public function recordOrder(){
        if(!isset($_SESSION['cart'])){
            header('Location: ' . getUrl() .'/Home/viewHome');
        }
        $order = $_SESSION['cart']; 
        $customer_id = $_SESSION['id_customer'];
        //Nen detroy cai cart di
        unset($_SESSION['cart']);
        $this->model('OrderDetailModel')->recordOrder($order,$customer_id);
        header('Location: ' . getUrl() .'/Orderpay/afterPayment');
    }
    public function afterPayment(){
        $this->view("afterpayment",[
            "categories" => $this->CategoryModel->showAllCategories()
        ]);
    }
    public function checkLogin(){
        if (!isset($_SESSION["id_customer"])) {
            header("Location:".getUrl()."/User/login");
        }else{
            header("Location:".getUrl()."/Orderpay/viewStatusOldOrder/".$_SESSION["id_customer"]);
        }
    }
    public function viewStatusOldOrder($customer_id){
        $order_detail = $this->model("OrderDetailModel");
        $this->view("viewoldorder",[
            'order_detail' => $order_detail->getOrderByCusID($customer_id)
        ]);
    }
}
?>