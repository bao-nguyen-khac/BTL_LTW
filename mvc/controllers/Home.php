<?php

class Home extends controller{
    public $CategoryModel ;
    public function __construct()
    {
        $this->CategoryModel = $this->model("CategoryModel");
    }
    function viewHome(){
        $products = $this->model("ProductModel");
        $this->view("master1", [
            "Page"=>"products",
            "categories" => $this->CategoryModel->showAllCategories(),
            "products" => $products->showAllProducts()
        ]);
    }
    function viewCategory($id){
        $products = $this->model("ProductModel");
        $this->view("master1", [
            "Page"=>"categories",
            "categories" => $this->CategoryModel->showAllCategories(),
            "products" => $products->showProductsById($id),
            "id" => $id
        ]);
    }
    function viewDetailProductById($id){
        $products = $this->model("ProductModel");
        $this->view("master1", [
            "Page"=>"detailproduct",
            "categories" => $this->CategoryModel->showAllCategories(),
            "products" => $products->getProductById($id),
        ]);
    }
}
?>