<?php
class UserModel extends db{
    private function _query($sql)
    {
        return mysqli_query($this->connect, $sql);
    }
    public function CheckLogin($username, $password){
        $sql = "SELECT * FROM nguoidung WHERE taikhoan ='" . $username . "' and matkhau = MD5('".$password."')";
        $query = $this->_query($sql);
        $row  = mysqli_fetch_array($query);
        return $row;
    }
    public function ViewDetail($customer_id){
        $sql = "SELECT id,`diachi`,ten,sodienthoai FROM nguoidung WHERE id = " . $customer_id;
        $query = $this->_query($sql);
        $row  = mysqli_fetch_array($query);
        return $row;
    }
    public function addUser($fullname,$address,$phone,$username,$password){
        $checksql = "SELECT id FROM nguoidung WHERE taikhoan = '$username'";
        $query = $this->_query($checksql);
        if(mysqli_num_rows($query) > 0){
            return 0;
        }
        $sql = "INSERT INTO nguoidung(taikhoan,`matkhau`,`diachi`,ten,sodienthoai) VALUES ('$username',MD5('$password'),'$address','$fullname','$phone');";
        $this->_query($sql);
        return 1;
    }
}
?>