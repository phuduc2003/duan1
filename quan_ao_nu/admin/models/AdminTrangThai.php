<?php
class AdminTrangThai{
    public $pdo;

    // Khai báo phương thức
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
    public function show(){
        {
            try {
                // 1. Kết nối CSDL
               $sql = " SELECT * FROM trang_thai_don_hangs ";
               $data = $this->pdo->query($sql)->fetchAll();
               $DanhSach = [];
               foreach($data as $value){
                $trang_thai_don_hangs = new trang_thai_don_hangs();

                $trang_thai_don_hangs->id= $value['id'];
                $trang_thai_don_hangs->ten_trang_thai= $value['ten_trang_thai'];
               
                
                array_push($DanhSach, $trang_thai_don_hangs);
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