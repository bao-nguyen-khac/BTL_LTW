<?php
class ProductModel extends db{
    private function _query($sql)
    {
        return mysqli_query($this->connect, $sql);
    }
    
    public function getProductsFeature($page,$qty,&$checkNext){
        if($page == 0){
            $sql = "SELECT * FROM sanpham WHERE sanpham_noibat = 1 LIMIT 0,$qty";
            $query = $this->_query($sql);
            $data = [];
            while ($row = mysqli_fetch_assoc($query)) {
                array_push($data, $row);
            }
            return $data;
        }
        $start = $page*$qty - $qty;
        $sql1 = "SELECT * FROM sanpham WHERE sanpham_noibat = 1 LIMIT $start, $qty";
        $query1 = $this->_query($sql1);
        $data = [];
        $start += $qty;
        $sql2 = "SELECT * FROM sanpham WHERE sanpham_noibat = 1 LIMIT $start, $qty";
        $query2 = $this->_query($sql2);
        if(mysqli_num_rows($query2) == 0){
            $checkNext = 0;
        }
        while ($row = mysqli_fetch_assoc($query1)) {
            array_push($data, $row);
        }
        return $data;
    }
    public function getProductsNew($page,$qty,&$checkNext){
        if($page == 0){
            $sql = "SELECT * FROM sanpham WHERE sanpham_moi = 1 LIMIT 0,$qty";
            $query = $this->_query($sql);
            $data = [];
            while ($row = mysqli_fetch_assoc($query)) {
                array_push($data, $row);
            }
            return $data;
        }
        $start = $page*$qty - $qty;
        $sql1 = "SELECT * FROM sanpham WHERE sanpham_moi = 1 LIMIT $start, $qty";
        $query1 = $this->_query($sql1);
        $data = [];
        $start += $qty;
        $sql2 = "SELECT * FROM sanpham WHERE sanpham_moi = 1 LIMIT $start, $qty";
        $query2 = $this->_query($sql2);
        if(mysqli_num_rows($query2) == 0){
            $checkNext = 0;
        }
        while ($row = mysqli_fetch_assoc($query1)) {
            array_push($data, $row);
        }
        return $data;
    }
    public function showProductsById($id,$page,$qty,&$checkNext){
        $start = $page*$qty - $qty;
        $sql1 = "SELECT * FROM sanpham WHERE theloai_id = '$id' LIMIT $start, $qty";
        $query1 = $this->_query($sql1);
        $data = [];
        $start += $qty;
        $sql2 = "SELECT * FROM sanpham WHERE theloai_id = '$id' LIMIT $start, $qty";
        $query2 = $this->_query($sql2);
        if(mysqli_num_rows($query2) == 0){
            $checkNext = 0;
        }
        while ($row = mysqli_fetch_assoc($query1)) {
            array_push($data, $row);
        }
        return $data;
    }
    public function getProductById($id){
        $sql = "SELECT * FROM sanpham WHERE id = ${id}";
        $query = $this->_query($sql);
        return mysqli_fetch_assoc($query);
    }
    public function getAllProducts($page,$qty,&$checkNext){
        $start = $page*$qty - $qty;
        $sql1 = "SELECT * FROM sanpham LIMIT $start, $qty";
        $query1 = $this->_query($sql1);
        $data = [];
        $start += $qty;
        $sql2 = "SELECT * FROM sanpham LIMIT $start, 1";
        $query2 = $this->_query($sql2);
        if(mysqli_num_rows($query2) == 0){
            $checkNext = 0;
        }
        while ($row = mysqli_fetch_assoc($query1)) {
            array_push($data, $row);
        }
        return $data;
    }
    public function updateProduct($id,$name,$price,$main_desc,$sub_desc){
        $sql = "UPDATE sanpham SET `ten` = '$name', gia = $price, mota_chinh = '$main_desc', mota_phu = '$sub_desc' WHERE id = $id ;";
        $this->_query($sql);
    }
    public function deleteProduct($id){
        $sql = "DELETE FROM sanpham WHERE id = $id";
        $this->_query($sql);
    }
}
?>