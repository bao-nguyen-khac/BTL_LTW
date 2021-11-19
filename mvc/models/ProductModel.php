<?php
class ProductModel extends db{
    private function _query($sql)
    {
        return mysqli_query($this->connect, $sql);
    }
    public function ShowAllProducts(){
        $sql = "SELECT * FROM products";
        $query = $this->_query($sql);
        // var_dump($query);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            // var_dump($row);
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