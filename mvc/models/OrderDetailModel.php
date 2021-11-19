<?php

class OrderDetailModel extends db{
    private function _query($sql)
    {
        return mysqli_query($this->connect, $sql);
    }
    public function recordOrder($order,$customer_id){
        $insert_order = "INSERT INTO orderdetail(customer_id,date_order,totalprice,`status`) VALUE ('" . $customer_id . "',NOW(),". $order['totalprice'] .",'Đang chờ xử lý'); ";
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
    public function getAllOrder(){
        $allOrdersql = "SELECT * FROM orderdetail ORDER BY order_id DESC";
        $query1 = $this->_query($allOrdersql);
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
    public function getOrderByCusID($customer_id){
        $getOrdersql = "SELECT * FROM orderdetail WHERE customer_id = ". $customer_id ." ORDER BY order_id DESC";
        $query1 = $this->_query($getOrdersql);
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
}
?>