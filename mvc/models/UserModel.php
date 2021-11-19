<?php
class UserModel extends db{
    private function _query($sql)
    {
        return mysqli_query($this->connect, $sql);
    }
    public function CheckLogin($username, $password){
        $sql = "SELECT * FROM customer WHERE username ='" . $username . "' and password = MD5('".$password."')";
        $query = $this->_query($sql);
        $row  = mysqli_fetch_array($query);
        return $row;
    }
    public function ViewDetail($customer_id){
        $sql = "SELECT `address`,fullname,phone_number FROM customer WHERE id = " . $customer_id;
        $query = $this->_query($sql);
        $row  = mysqli_fetch_array($query);
        return $row;
    }
}
?>