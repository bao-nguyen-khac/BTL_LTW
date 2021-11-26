<?php

class OrderDetailModel extends db{
    private function _query($sql)
    {
        return mysqli_query($this->connect, $sql);
    }
    public function recordOrder($order,$customer_id){
        $insert_order = "INSERT INTO orderdetail(customer_id,date_order,totalprice,`status`,hide) VALUE ('" . $customer_id . "',NOW(),". $order['totalprice'] .",0,0); ";
        $this->_query($insert_order);
        $getLastIdsql = "SELECT order_id FROM orderdetail ORDER BY order_id DESC LIMIT 1";
        $getLastId = $this->_query($getLastIdsql);
        $getLastId =  mysqli_fetch_assoc($getLastId);
        foreach($order as $eachproduct){
            if(!is_array($eachproduct)){
                continue;
             }
            $inser_product = "INSERT INTO list_product_in_order VALUE (". $getLastId['order_id'] .",". $eachproduct['id'] .",'". $eachproduct['name'] ."',". $eachproduct['qty'] .")";
            $this->_query($inser_product);
        }
    }
    public function getAllOrder($page,$qty,&$checkNext){
        $start = $page*$qty - $qty;
        $allOrdersql = "SELECT * FROM orderdetail WHERE hide = 0 LIMIT $start, $qty";
        $query1 = $this->_query($allOrdersql);
        $start += $qty;
        $sql2 = "SELECT * FROM orderdetail WHERE hide = 0 LIMIT $start, 1";
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
            $allProductsql = "SELECT product_id, product_name, qty FROM list_product_in_order WHERE order_id = ". $order['order_id'];
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
        $getOrdersql = "SELECT * FROM orderdetail WHERE customer_id = $customer_id ORDER BY order_id DESC LIMIT $start, $qty";
        $query1 = $this->_query($getOrdersql);
        $allOrders = [];
        while ($row = mysqli_fetch_assoc($query1)) {
            array_push($allOrders, $row);
        }
        $data = [];
        $start += $qty;
        $sql2 = "SELECT * FROM orderdetail WHERE customer_id = $customer_id ORDER BY order_id DESC LIMIT $start, $qty";
        $query2 = $this->_query($sql2);
        if(mysqli_num_rows($query2) == 0){
            $checkNext = 0;
        }
        foreach($allOrders as $order){
            $allProductsql = "SELECT product_id, product_name, qty FROM list_product_in_order WHERE order_id = ". $order['order_id'];
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
        $sql = "SELECT `status` FROM orderdetail WHERE order_id = $order_id";
        $query = $this->_query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        if($data[0]['status'] == 0 || $data[0]['status'] == 1){
            $data[0]['status']++;
            $updatesql = "UPDATE orderdetail SET `status` = '".$data[0]['status']."' WHERE order_id = $order_id";
            $this->_query($updatesql);
        }
    }
    public function hideOrder($order_id){
        $sql = "UPDATE orderdetail SET `hide` = 1 WHERE order_id = $order_id";
        $this->_query($sql);
    }    
}
?>