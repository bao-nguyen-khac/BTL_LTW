<?php
require_once "./mvc/core/basehref.php";
class PaymentController extends controller{
    public function viewHome(){
        $productsInCart = $_SESSION['cart'];
        $this->view("payment", [
            'productsInCart' => $productsInCart
        ]);
    }
    public function recordOrder(){
        $order = $_SESSION['cart']; 
        $customer_id = $_SESSION['id_customer'];
        //Nen detroy cai cart di
        unset($_SESSION['cart']);
        $this->model('OrderDetailModel')->recordOrder($order,$customer_id);
        header('Location: ' . getUrl() .'/PaymentController/afterPayment');
    }
    public function afterPayment(){
        $this->view("afterpayment");
    }
    public function checkLogin(){
        if (!isset($_SESSION["id_customer"])) {
            header("Location:".getUrl()."/User/login");
        }else{
            header("Location:".getUrl()."/PaymentController/viewStatusOldOrder/".$_SESSION["id_customer"]);
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