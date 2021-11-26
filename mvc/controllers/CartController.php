
<?php
require_once "./mvc/core/basehref.php";
class CartController extends controller{

    function viewHome(){
        $productsInCart = $_SESSION['cart'] ?? []; 
        $this->view("customer/cart-payment", [
            "Page" => "cart",
            'productsInCart' => $productsInCart
        ]);
    }
    function addToCart($id){
        $productId = $id;
        $product = $this->model("ProductModel")->getProductById($productId);
        if(empty($_SESSION['cart']) || !array_key_exists($productId,$_SESSION['cart'])){
            $product['qty'] = 1;
            $_SESSION['cart'][$productId] = $product;
        }else{
            $product['qty'] = $_SESSION['cart'][$productId]['qty'] + 1;
            $_SESSION['cart'][$productId] = $product;
        }
        header('Location: ' . getUrl() .'/CartController/viewHome');
    }
    function changeQtyAjax(){
        if(isset($_POST['id'])){
            $prodId = $_POST['id'];
            $_SESSION['cart'][$prodId]['qty'] = $_POST['qty'];
            echo $_POST['qty'];
        }
    }
    function updateCartAjax(){
        if(isset($_POST['id'])){
            $prodId = $_POST['id'];
            $_SESSION['cart'][$prodId]['qty'] = $_POST['qty'];
            echo $_POST['qty'];
        }
    }
    function deleteInCart($id){
        unset($_SESSION['cart'][$id]);
        header('Location: ' . getUrl() .'/CartController/viewHome');
    }
    function deleteAllCart(){
        unset($_SESSION['cart']);
        header('Location: ' . getUrl() .'/CartController/viewHome');
    }
}
?>