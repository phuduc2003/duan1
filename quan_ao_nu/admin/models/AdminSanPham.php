<?php
class AdminSanPham
{
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
   
    public function All(){
        {
            try {
                // 1. Kết nối CSDL
               $sql = " SELECT * FROM san_phams ";
               $data = $this->pdo->query($sql)->fetchAll();
               $DanhSach = [];
               foreach($data as $value){
                $san_phams = new san_phams();

                $san_phams->id= $value['id'];
                $san_phams->ten_san_pham= $value['ten_san_pham'];
                $san_phams->gia_san_pham= $value['gia_san_pham'];
                $san_phams->gia_khuyen_mai= $value['gia_khuyen_mai'];
                $san_phams->hinh_anh= $value['hinh_anh'];
                $san_phams->so_luong= $value['so_luong'];
                $san_phams->luot_xem= $value['luot_xem'];
                $san_phams->ngay_nhap= $value['ngay_nhap'];
                $san_phams->mo_ta= $value['mo_ta'];
                $san_phams->danh_muc_id= $value['danh_muc_id'];
                $san_phams->trang_thai= $value['trang_thai'];
                
                array_push($DanhSach, $san_phams);
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