<?php
class AdminModel extends db{
    private function _query($sql)
    {
        return mysqli_query($this->connect, $sql);
    }
    public function CheckLogin($username, $password){
        $sql = "SELECT * FROM `quantrivien` WHERE taikhoan ='" . $username . "' and matkhau = MD5('".$password."')";
        $query = $this->_query($sql);
        $row  = mysqli_fetch_array($query);
        return $row;
    }
}
?>