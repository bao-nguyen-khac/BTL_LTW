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
        $sql = "SELECT id,`address`,fullname,phone_number FROM customer WHERE id = " . $customer_id;
        $query = $this->_query($sql);
        $row  = mysqli_fetch_array($query);
        return $row;
    }
    public function addUser($fullname,$address,$phone,$username,$password){
        $checksql = "SELECT id FROM customer WHERE username = '$username'";
        $query = $this->_query($checksql);
        if(mysqli_num_rows($query) > 0){
            return 0;
        }
        $sql = "INSERT INTO customer(username,`password`,`address`,fullname,phone_number) VALUES ('$username',MD5('$password'),'$address','$fullname','$phone');";
        $this->_query($sql);
        return 1;
    }
}
?>