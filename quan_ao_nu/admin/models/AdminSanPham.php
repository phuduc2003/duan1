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
                $sql="SELECT san_phams.*, danh_mucs.ten_danh_muc 
                FROM san_phams 
                JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                      ";
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
                $san_phams->ten_danh_muc= $value['ten_danh_muc'];

                
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
       public function delete($id){
        try{
            $sql = "UPDATE san_phams SET trang_thai = 2 WHERE id = $id";
    
        $data =$this->pdo->exec($sql);
        
        if($data ===1){
          return "success";
        }
       }catch (Exception $error) {
        echo "<h1>";
        echo "Lỗi hàm insert trong model: " . $error->getMessage();
        echo "</h1>";
    }
       }
       public function insert(san_phams $san_phams){
        try{
        $sql="INSERT INTO `san_phams`(`id`, `ten_san_pham`, `gia_san_pham`, `gia_khuyen_mai`, `hinh_anh`, `so_luong`, `luot_xem`, `ngay_nhap`, `mo_ta`, `danh_muc_id`, `trang_thai`)
         VALUES (NULL,'$san_phams->ten_san_pham','$san_phams->gia_san_pham','$san_phams->gia_khuyen_mai','$san_phams->hinh_anh','$san_phams->so_luong',
         '$san_phams->luot_xem','$san_phams->ngay_nhap','$san_phams->mo_ta','$san_phams->danh_muc_id',1)";
         $data =$this->pdo->exec($sql);
         if ($data === 1) {
            return "success";
        }
         } catch (Exception $error) {
            echo "<h1>";
            echo "Lỗi hàm insert trong model: " . $error->getMessage();
            echo "</h1>";
        }
       }
       public function find($id){
        try{
           $sql="SELECT * FROM `san_phams` WHERE id=$id";

           $data=$this->pdo->query($sql)->fetch();
            
           if($data !== false){
            $san_phams = new san_phams();
                 $san_phams->id= $data['id'];
                $san_phams->ten_san_pham= $data['ten_san_pham'];
                $san_phams->gia_san_pham= $data['gia_san_pham'];
                $san_phams->gia_khuyen_mai= $data['gia_khuyen_mai'];
                $san_phams->hinh_anh= $data['hinh_anh'];
                $san_phams->so_luong= $data['so_luong'];
                $san_phams->luot_xem= $data['luot_xem'];
                $san_phams->ngay_nhap= $data['ngay_nhap'];
                $san_phams->mo_ta= $data['mo_ta'];
                $san_phams->danh_muc_id= $data['danh_muc_id'];
                $san_phams->trang_thai= $data['trang_thai'];
                

            return $san_phams;
           }else{
            echo "Lỗi: id không tồn tại. Mời bạn kiểm tra lại.";
           }
        }catch (Exception $error) {
            echo "<h1>";
            echo "Lỗi hàm find trong model: " . $error->getMessage();
            echo "</h1>";
        }
       }
       public function updateSP($id, san_phams $san_phams){
        try{
           $sql="UPDATE `san_phams` SET `ten_san_pham`='$san_phams->ten_san_pham',`gia_san_pham`='$san_phams->gia_san_pham',

           `gia_khuyen_mai`='$san_phams->gia_khuyen_mai',`hinh_anh`='$san_phams->hinh_anh',`so_luong`='$san_phams->so_luong',
           
           `luot_xem`='$san_phams->luot_xem',`ngay_nhap`='$san_phams->ngay_nhap',`mo_ta`='$san_phams->mo_ta',
           `danh_muc_id`='$san_phams->danh_muc_id',`trang_thai`='$san_phams->trang_thai' WHERE id=$id";
           $data = $this->pdo->exec($sql);
            
           if ($data === 1 || $data === 0) {
            return "success";
        }
           
        } catch (Exception $error) {
            echo "<h1>";
            echo "Lỗi hàm insert trong model: " . $error->getMessage();
            echo "</h1>";
        }
       
    }
    public function showSP($id){

        $sql = "SELECT * FROM `san_phams` WHERE id = $id";
        // 2. Thực hiện truy vấn
        $stmt=$this->pdo->query($sql);

        return $stmt->fetchAll();
}


public function hien($id){
    try{
        $sql = "UPDATE san_phams SET trang_thai = 1 WHERE id = $id";

    $data =$this->pdo->exec($sql);
    
    if($data ===1){
      return "success";
    }
   }catch (Exception $error) {
    echo "<h1>";
    echo "Lỗi hàm insert trong model: " . $error->getMessage();
    echo "</h1>";
}

}
}