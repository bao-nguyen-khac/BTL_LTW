
<?php
require_once "./mvc/core/basehref.php";
class Cart extends controller{

    function viewHome(){
        $productsInCart = $_SESSION['cart']; 
        // echo '<pre>';
        // print_r($productsInCart);
        // foreach ($productsInCart as $product){
        //     print_r($product);
            
        // }
        // die;
        $this->view("cart", [
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
        header('Location: ' . getUrl() .'/Cart/viewHome');
    }
    function deleteInCart($id){
        unset($_SESSION['cart'][$id]);
        header('Location: ' . getUrl() .'/Cart/viewHome');
    }
    function deleteAllCart(){
        unset($_SESSION['cart']);
        header('Location: ' . getUrl() .'/Cart/viewHome');
    }
}
?>