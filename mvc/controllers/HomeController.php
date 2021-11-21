<?php

class HomeController extends controller{
    public $CategoryModel ;
    public function __construct()
    {
        $this->CategoryModel = $this->model("CategoryModel");
    }
    function viewHome(){
        $feature_products = $this->model("ProductModel")->getProductsFeature();
        $new_products = $this->model("ProductModel")->getProductsNew();
        $this->view("home", [
            "Page"=>"products",
            "categories" => $this->CategoryModel->showAllCategories(),
            "feature_products" => $feature_products,
            "new_products" => $new_products
        ]);
    }
    function viewCategory($id){
        $products = $this->model("ProductModel");
        $this->view("home", [
            "Page"=>"categories",
            "categories" => $this->CategoryModel->showAllCategories(),
            "products" => $products->showProductsById($id),
            "id" => $id
        ]);
    }
    function viewDetailProductById($id){
        $product = $this->model("ProductModel");
        $this->view("home", [
            "Page"=>"detailproduct",
            "categories" => $this->CategoryModel->showAllCategories(),
            "product" => $product->getProductById($id),
        ]);
    }
}
?>