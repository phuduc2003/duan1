<?php
class AdminBinhLuan{
 

    public $pdo;

    public function __construct()
    {
        try {
            // 1. Kết nối CSDL
            $this->pdo = new PDO("mysql:host=localhost; port=3306; dbname=quan_ao_nu", "root", "");
        } catch (Exception $error) {
            echo "<h1>";
            echo "Lỗi kết nối CSDL: " . $error->getMessage();
            echo "</h1>";
        }
    }

 public function all_bl(){
  
    try {
        // 1. Kết nối CSDL
       $sql = "SELECT * FROM binh_luans ";

               $data = $this->pdo->query($sql)->fetchAll();
       $DanhSach=[];
       foreach ($data as $value){
        $binh_luans = new binh_luans();
        $binh_luans->id=$value["id"];
        $binh_luans->san_pham_id=$value["san_pham_id"];
        $binh_luans->tai_khoan_id=$value["tai_khoan_id"];
        $binh_luans->noi_dung=$value["noi_dung"];
        $binh_luans->ngay_dang=$value["ngay_dang"];
        $binh_luans->trang_thai=$value["trang_thai"];
       
        array_push($DanhSach,$binh_luans);
       }
       return $DanhSach;
    } catch (Exception $error) {
        echo "<h1>";
        echo "Lỗi kết nối CSDL: " . $error->getMessage();
        echo "</h1>";
    }
 }

 public function xoa($id){
    try{
        $sql = "UPDATE binh_luans SET 	trang_thai = 2 WHERE id = $id";
          $data =$this->pdo->exec($sql);
        if($data===1){
            return "success";
        }
    }catch (Exception $error) {
        echo "<h1>";
        echo "Lỗi hàm insert trong model: " . $error->getMessage();
        echo "</h1>";
 }
}

public function hien($id){
    try{
        $sql = "UPDATE binh_luans SET 	trang_thai = 1 WHERE id = $id";
          $data =$this->pdo->exec($sql);
        if($data===1){
            return "success";
        }
    }catch (Exception $error) {
        echo "<h1>";
        echo "Lỗi hàm insert trong model: " . $error->getMessage();
        echo "</h1>";
 }
}
}