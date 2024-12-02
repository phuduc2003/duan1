<?php
class AdminDonHang
{
    public $pdo;
     public function __construct(){
      try{
             $this->pdo=new PDO("mysql:host=localhost; port=3306; dbname=quan_ao_nu","root","");

      } catch (Exception $error) {
            echo "<h1>";
            echo "Lỗi kết nối CSDL: " . $error->getMessage();
            echo "</h1>";
        }
    }


    public function All()
    {
        try {
            $sql = "
                SELECT don_hangs.*, 
                       tai_khoans.ho_ten 
                FROM don_hangs
                JOIN tai_khoans ON don_hangs.tai_khoan_id = tai_khoans.id
            ";
            $data = $this->pdo->query($sql)->fetchAll();
            $donHangs = [];
    
            foreach ($data as $value) {
                $don_hangs = new don_hangs();
                $don_hangs->id = $value['id'];
                $don_hangs->ma_don_hang = $value['ma_don_hang'];
                $don_hangs->tai_khoan_id = $value['tai_khoan_id'];
                $don_hangs->ten_nguoi_nhan = $value['ten_nguoi_nhan'];
                $don_hangs->email_nguoi_nhan = $value['email_nguoi_nhan'];
                $don_hangs->sdt_nguoi_nhan = $value['sdt_nguoi_nhan'];
                $don_hangs->dia_chi_nguoi_nhan = $value['dia_chi_nguoi_nhan'];
                $don_hangs->ngay_dat = $value['ngay_dat'];
                $don_hangs->tong_tien = $value['tong_tien'];
                $don_hangs->ghi_chu = $value['ghi_chu'];
                $don_hangs->phuong_thuc_thanh_toan_id = $value['phuong_thuc_thanh_toan_id'];
                $don_hangs->trang_thai_id = $value['trang_thai_id'];
                $don_hangs->ho_ten = $value['ho_ten']; // Thêm tên tài khoản
    
                array_push($donHangs, $don_hangs);
            }
    
            return $donHangs;
        } catch (Exception $error) {
            echo "<h1>";
            echo "Lỗi kết nối CSDL: " . $error->getMessage();
            echo "</h1>";
        }
    }
    
 public function deleteDonHang($id){
    try{
        $sql = "UPDATE don_hangs SET trang_thai_id = 1 WHERE id = $id";
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
public function GiaoDonHang($id){
    try{
        $sql = "UPDATE don_hangs SET trang_thai_id = 3 WHERE id = $id";
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
public function HoanTDonHang($id){
    try{
        $sql = "UPDATE don_hangs SET trang_thai_id = 4 WHERE id = $id";
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
public function find($id){
    try{
     $sql="SELECT * FROM `don_hangs` WHERE id=$id";
     $data=$this->pdo->query($sql)->fetch();
     if($data !== false){
        $don_hangs = new don_hangs();
        $don_hangs->id = $data['id'];
        $don_hangs->ma_don_hang	 = $data['ma_don_hang'];
        $don_hangs->tai_khoan_id= $data['tai_khoan_id'];
        $don_hangs->ten_nguoi_nhan= $data['ten_nguoi_nhan'];
        $don_hangs->email_nguoi_nhan= $data['email_nguoi_nhan'];
        $don_hangs->sdt_nguoi_nhan= $data['sdt_nguoi_nhan'];
        $don_hangs->dia_chi_nguoi_nhan= $data['dia_chi_nguoi_nhan'];
        $don_hangs->ngay_dat= $data['ngay_dat'];
        $don_hangs->tong_tien= $data['tong_tien'];
        $don_hangs->ghi_chu= $data['ghi_chu'];
        $don_hangs->phuong_thuc_thanh_toan_id= $data['phuong_thuc_thanh_toan_id'];
        $don_hangs->trang_thai_id= $data['trang_thai_id'];
        

        return $don_hangs;
     }else{
        echo "Lỗi: id không tồn tại. Mời bạn kiểm tra lại.";
       }
    } catch (Exception $error) {
        echo "<h1>";
        echo "Lỗi hàm insert trong model: " . $error->getMessage();
        echo "</h1>";
    }
}
public function updateDonHang($id,don_hangs $don_hangs){
    try{
       $sql="UPDATE `don_hangs` SET `ma_don_hang`='$don_hangs->ma_don_hang',`tai_khoan_id`='$don_hangs->tai_khoan_id',`ten_nguoi_nhan`='$don_hangs->ten_nguoi_nhan',
       `email_nguoi_nhan`='$don_hangs->email_nguoi_nhan',`sdt_nguoi_nhan`='$don_hangs->sdt_nguoi_nhan',`dia_chi_nguoi_nhan`='$don_hangs->dia_chi_nguoi_nhan',`ngay_dat`='$don_hangs->ngay_dat',
       `tong_tien`='$don_hangs->tong_tien',`ghi_chu`='$don_hangs->ghi_chu',`phuong_thuc_thanh_toan_id`='$don_hangs->phuong_thuc_thanh_toan_id',`trang_thai_id`='$don_hangs->trang_thai_id' WHERE id=$id";
       $data = $this->pdo->exec($sql);
       if($data ===1 || $data===0){
        return "success";
       }
    } catch (Exception $error) {
        echo "<h1>";
        echo "Lỗi hàm insert trong model: " . $error->getMessage();
        echo "</h1>";
    }
   
}
public function AnDonHang(){
    include "view/donhang/ChiTietDHAdmin.php";
}
}