<?php
class adminChiTietDH{
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
   
    public function Show(){
        {
            try {
                // 1. Kết nối CSDL
               $sql = " SELECT * FROM chi_tiet_don_hangs ";
               $data = $this->pdo->query($sql)->fetchAll();
               $DanhSach = [];
               foreach($data as $value){
                $chi_tiet_don_hangs = new chi_tiet_don_hangs();

                $chi_tiet_don_hangs->id= $value['id'];
                $chi_tiet_don_hangs->don_hang_id = $value['don_hang_id'];
                $chi_tiet_don_hangs->san_pham_id= $value['san_pham_id'];
                $chi_tiet_don_hangs->don_gia= $value['don_gia'];
              
                $chi_tiet_don_hangs->so_luong= $value['so_luong'];
                $chi_tiet_don_hangs->thanh_tien= $value['thanh_tien'];
                
                array_push($DanhSach, $chi_tiet_don_hangs);
               }
               return $DanhSach;
            } catch (Exception $error) {
                echo "<h1>";
                echo "Lỗi kết nối CSDL: " . $error->getMessage();
                echo "</h1>";
            }
        }
    }
}
?>