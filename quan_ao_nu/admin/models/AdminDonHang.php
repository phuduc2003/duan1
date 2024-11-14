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


   public function All(){
    try{
    $sql="SELECT * FROM `don_hangs`";
    $data =$this->pdo->query($sql)->fetchAll();
    $donHangs=[];
    foreach($data as $value){
        $don_hangs = new don_hangs();
        $don_hangs->id = $value['id'];
        $don_hangs->ma_don_hang	 = $value['ma_don_hang'];
        $don_hangs->tai_khoan_id= $value['tai_khoan_id'];
        $don_hangs->ten_nguoi_nhan= $value['ten_nguoi_nhan'];
        $don_hangs->email_nguoi_nhan= $value['email_nguoi_nhan'];
        $don_hangs->sdt_nguoi_nhan= $value['sdt_nguoi_nhan'];
        $don_hangs->dia_chi_nguoi_nhan= $value['dia_chi_nguoi_nhan'];
        $don_hangs->ngay_dat= $value['ngay_dat'];
        $don_hangs->tong_tien= $value['tong_tien'];
        $don_hangs->ghi_chu= $value['ghi_chu'];
        $don_hangs->phuong_thuc_thanh_toan_id= $value['phuong_thuc_thanh_toan_id'];
        $don_hangs->trang_thai_id= $value['trang_thai_id'];
        array_push($donHangs,$don_hangs);

    }
    return $donHangs;
} catch (Exception $error) {
    echo "<h1>";
    echo "Lỗi kết nối CSDL: " . $error->getMessage();
    echo "</h1>";
}
   
}
}