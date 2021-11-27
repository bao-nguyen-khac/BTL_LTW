<?php
require_once "./mvc/core/basehref.php";
class AdminController extends controller{
   
    public function viewHome(){
        $this->view("admin/adminview",[
            'page' => 'home',
        ]);
    }
    public function login(){
        $this->view("admin/adminlogin");
    }
    public function logout(){
        $this->view("admin/adminlogout");
    }
    public function checklogin($username, $password){
        return $this->model("AdminModel")->CheckLogin($username, $password);
    }
    public function ordersList(){
        $this->view("admin/adminview",[
            'page' => 'list_order',
        ]);
    }
    public function ordersListAjax($page = 1){
        $qty = 5;
        $checkNext = 1;
        $order_detail = $this->model("OrderDetailModel")->getAllOrder($page,$qty,$checkNext);
        $this->view("admin/pages/list_order_ajax",[
            "page" => $page,
            'order_detail' => $order_detail,
            "checkNext" => $checkNext
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
    public function getAllProducts($numpage = 1){
        $qty = 6;
        $checkNext = 1;
        $products = $this->model("ProductModel")->getAllProducts($numpage,$qty,$checkNext);
        $this->view("admin/adminview",[
            'page' => 'list_products',
            'products' => $products,
            "checkNext" => $checkNext,
            'numpage' => $numpage,
            'qty' => $qty
        ]);
    }
    public function getProductById($id){
        $product = $this->model("ProductModel")->getProductById($id);
        $this->view("admin/adminview",[
            'page' => 'update_product',
            'product' => $product,
        ]);
    }
    public function updateProduct($id){
        if(isset($_POST['submit-update'])){
            $name = $_POST['name'];
            $price = $_POST['price'];
            $main_desc = $_POST['main_desc'];
            $sub_desc = $_POST['sub_desc'];
            $this->model("ProductModel")->updateProduct($id,$name,$price,$main_desc,$sub_desc);
        }
        header('Location: ' . getUrl() .'/AdminController/getAllProducts');
    }
}
?>