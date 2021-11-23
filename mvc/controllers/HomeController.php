<?php

class HomeController extends controller{
    public $CategoryModel ;
    public function __construct()
    {
        $this->CategoryModel = $this->model("CategoryModel");
    }
    public function viewHome(){
        $qty = 4;
        $checkNext = 1;
        $feature_products = $this->model("ProductModel")->getProductsFeature(0,$qty,$checkNext);
        $new_products = $this->model("ProductModel")->getProductsNew(0,$qty,$checkNext);
        $this->view("home", [
            "Page"=>"products",
            "categories" => $this->CategoryModel->showAllCategories(),
            "feature_products" => $feature_products,
            "new_products" => $new_products
        ]);
    }
    public function viewCategory($id,$page = 1){
        $qty = 8;
        $checkNext = 1;
        $products = $this->model("ProductModel")->showProductsById($id,$page,$qty,$checkNext);
        $this->view("home", [
            "Page"=> "categories",
            "page" => $page,
            "categories" => $this->CategoryModel->showAllCategories(),
            "products" => $products,
            "id" => $id,
            "checkNext" => $checkNext
        ]);
    }
    public function viewDetailProductById($id){
        $product = $this->model("ProductModel");
        $this->view("home", [
            "Page"=>"detailproduct",
            "categories" => $this->CategoryModel->showAllCategories(),
            "product" => $product->getProductById($id),
        ]);
    }
    public function featureProducts($page = 1){
        $qty = 8;
        $checkNext = 1;
        $products = $this->model("ProductModel")->getProductsFeature($page,$qty,$checkNext);
        $this->view("home", [
            "Page"=> "featureproducts",
            "page" => $page,
            "categories" => $this->CategoryModel->showAllCategories(),
            "products" => $products,
            "checkNext" => $checkNext
        ]);
    }
    public function newProducts($page = 1){
        $qty = 8;
        $checkNext = 1;
        $products = $this->model("ProductModel")->getProductsNew($page,$qty,$checkNext);
        $this->view("home", [
            "Page"=> "newproducts",
            "page" => $page,
            "categories" => $this->CategoryModel->showAllCategories(),
            "products" => $products,
            "checkNext" => $checkNext
        ]);
    }
}
?>