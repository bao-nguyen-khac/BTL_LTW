<?php
class CategoryModel extends db{
    private function _query($sql)
    {
        return mysqli_query($this->connect, $sql);
    }
    public function ShowAllCategories(){
        $sql = "SELECT * FROM categories";
        $query = $this->_query($sql);
        // var_dump($query);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            // var_dump($row);
            array_push($data, $row);
        }
        return $data;
    }
}
?>