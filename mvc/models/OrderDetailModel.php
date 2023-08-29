<?php

class OrderDetailModel extends db{
    private function _query($sql)
    {
        return mysqli_query($this->connect, $sql);
    }
    public function recordOrder($order,$customer_id){
        $insert_order = "INSERT INTO chitiet_donhang(nguoidung_id,ngay_dat,gia,`trangthai`,an) VALUE ('" . $customer_id . "',NOW(),". $order['totalprice'] .",0,0); ";
        $this->_query($insert_order);
        $getLastIdsql = "SELECT donhang_id FROM chitiet_donhang ORDER BY donhang_id DESC LIMIT 1";
        $getLastId = $this->_query($getLastIdsql);
        $getLastId =  mysqli_fetch_assoc($getLastId);
        foreach($order as $eachproduct){
            if(!is_array($eachproduct)){
                continue;
             }
            $inser_product = "INSERT INTO sanpham_donhang VALUE (". $getLastId['donhang_id'] .",". $eachproduct['id'] .",'". $eachproduct['ten'] ."',". $eachproduct['qty'] .")";
            $this->_query($inser_product);
        }
    }
    public function getAllOrder($page,$qty,&$checkNext){
        $start = $page*$qty - $qty;
        $allOrdersql = "SELECT * FROM chitiet_donhang WHERE an = 0 LIMIT $start, $qty";
        $query1 = $this->_query($allOrdersql);
        $start += $qty;
        $sql2 = "SELECT * FROM chitiet_donhang WHERE an = 0 LIMIT $start, 1";
        $qry = $this->_query($sql2);
        if(mysqli_num_rows($qry) == 0){
            $checkNext = 0;
        }
        $allOrders = [];
        while ($row = mysqli_fetch_assoc($query1)) {
            array_push($allOrders, $row);
        }
        $data = [];
        foreach($allOrders as $order){
            $allProductsql = "SELECT sanpham_id, tensanpham, soluong FROM sanpham_donhang WHERE donhang_id = ". $order['donhang_id'];
            $order['products'] = [];
            $query2 = $this->_query($allProductsql);
            while ($row = mysqli_fetch_assoc($query2)) {      
                array_push($order['products'], $row);
            }
            array_push($data,$order);
        }
        return $data;
    }
    public function getOrderByCusID($customer_id,$page,$qty,&$checkNext){
        $start = $page*$qty - $qty;
        $getOrdersql = "SELECT * FROM chitiet_donhang WHERE nguoidung_id = $customer_id ORDER BY donhang_id DESC LIMIT $start, $qty";
        $query1 = $this->_query($getOrdersql);
        $allOrders = [];
        while ($row = mysqli_fetch_assoc($query1)) {
            array_push($allOrders, $row);
        }
        $data = [];
        $start += $qty;
        $sql2 = "SELECT * FROM chitiet_donhang WHERE nguoidung_id = $customer_id ORDER BY donhang_id DESC LIMIT $start, $qty";
        $query2 = $this->_query($sql2);
        if(mysqli_num_rows($query2) == 0){
            $checkNext = 0;
        }
        foreach($allOrders as $order){
            $allProductsql = "SELECT sanpham_id, tensanpham, soluong FROM sanpham_donhang WHERE donhang_id = ". $order['donhang_id'];
            $order['products'] = [];
            $query2 = $this->_query($allProductsql);
            while ($row = mysqli_fetch_assoc($query2)) {      
                array_push($order['products'], $row);
            }
            array_push($data,$order);
        }
        return $data;
    }
    public function changeAction($order_id){
        $sql = "SELECT `trangthai` FROM chitiet_donhang WHERE donhang_id = $order_id";
        $query = $this->_query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        if($data[0]['trangthai'] == 0 || $data[0]['trangthai'] == 1){
            $data[0]['trangthai']++;
            $updatesql = "UPDATE chitiet_donhang SET `trangthai` = '".$data[0]['trangthai']."' WHERE donhang_id = $order_id";
            $this->_query($updatesql);
        }
    }
    public function hideOrder($order_id){
        $sql = "UPDATE chitiet_donhang SET `an` = 1 WHERE donhang_id = $order_id";
        $this->_query($sql);
    }
}
?>