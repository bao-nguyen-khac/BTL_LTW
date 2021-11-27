<?php
require_once "./mvc/core/basehref.php";
class PaymentController extends controller{
    public function viewHome(){
        $productsInCart = $_SESSION['cart'];
        $this->view("customer/cart-payment", [
            "Page" => "payment",
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
        $this->view("customer/cart-payment",[
            "Page" => "afterpayment",
        ]);
    }
    public function checkLogin(){
        if (!isset($_SESSION["id_customer"])) {
            header("Location:".getUrl()."/UserController/login");
        }else{
            header("Location:".getUrl()."/PaymentController/viewStatusOldOrder/".$_SESSION["id_customer"]);
        }
    }
    public function viewStatusOldOrder($customer_id,$page = 1){
        $qty = 6;
        $checkNext = 1;
        $order_detail = $this->model("OrderDetailModel")->getOrderByCusID($customer_id,$page,$qty,$checkNext);
        $this->view("customer/cart-payment",[
            "Page" => "oldorders",
            'order_detail' => $order_detail,
            "page" => $page,
            "checkNext" => $checkNext,
            "qty" => $qty
        ]);
    }
}
?>