<?php
class ProductModel extends db{
    private function _query($sql)
    {
        return mysqli_query($this->connect, $sql);
    }
    
    public function getProductsFeature(){
        $sql = "SELECT * FROM products WHERE feature_prod = 1";
        $query = $this->_query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }
    public function getProductsNew(){
        $sql = "SELECT * FROM products WHERE new_prod = 1";
        $query = $this->_query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }
    public function showProductsById($id){
        $sql = "SELECT * FROM products WHERE category_id = '$id'";
        $query = $this->_query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }
    public function getProductById($id){
        $sql = "SELECT * FROM products WHERE id = ${id}";
        $query = $this->_query($sql);
        return mysqli_fetch_assoc($query);
    }

}
?>