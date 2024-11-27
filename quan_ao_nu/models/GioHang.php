<?php

class GioHang
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getGioHangFromUser($id){
        try {
            $sql = 'SELECT * from gio_hangs where tai_khoan_id = :tai_khoan_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':tai_khoan_id'=>$id]);
            return $stmt->fetch();
         } catch (Exception $e) {
            echo "Lỗi".$e->getMessage();
         }
    }
    public function getDetailGioHang($id){
        try {
            $sql = 'SELECT chi_tiet_gio_hangs.*,san_phams.ten_san_pham,san_phams.hinh_anh,san_phams.gia_san_pham,san_phams.gia_khuyen_mai from chi_tiet_gio_hangs
            INNER JOIN san_phams ON chi_tiet_gio_hangs.san_pham_id = san_phams.id
            WHERE chi_tiet_gio_hangs.gio_hang_id = :gio_hang_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':gio_hang_id'=>$id]);
            return $stmt->fetchAll();
         } catch (Exception $e) {
            echo "Lỗi".$e->getMessage();
         }
    }
    public function addGioHang($id){
        try {
            $sql = 'INSERT into gio_hangs(tai_khoan_id) value (:id)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id'=>$id]);
            return $this->conn->lastInsertId();
         } catch (Exception $e) {
            echo "Lỗi".$e->getMessage();
         }
    }
    public function updateSoLuong($gio_hang_id,$san_pham_id,$so_luong){
        try {
            $sql = 'UPDATE chi_tiet_gio_hangs SET so_luong = :so_luong where gio_hang_id = :gio_hang_id AND san_pham_id = :san_pham_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':gio_hang_id'=>$gio_hang_id,':san_pham_id'=>$san_pham_id,':so_luong'=>$so_luong]);
            return true;
         } catch (Exception $e) {
            echo "Lỗi".$e->getMessage();
         }
    }
    public function addDetailGioHang($gio_hang_id,$san_pham_id,$so_luong){
        try {
            $sql = 'INSERT into chi_tiet_gio_hangs (gio_hang_id,san_pham_id,so_luong) values (:gio_hang_id, :san_pham_id,:so_luong)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':gio_hang_id'=>$gio_hang_id,':san_pham_id'=>$san_pham_id,':so_luong'=>$so_luong]);
            return true;
         } catch (Exception $e) {
            echo "Lỗi".$e->getMessage();
         }
    }
    public function clearDetailGioHang($gioHangId){
      try {
          $sql = 'DELETE FROM chi_tiet_gio_hangs where gio_hang_id = :gio_hang_id';
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([':gio_hang_id'=>$gioHangId]);
          return true;
       } catch (Exception $e) {
          echo "Lỗi".$e->getMessage();
       }
  }
  public function clearGioHang($taiKhoanId){
   try {
       $sql = 'DELETE FROM gio_hangs where tai_khoan_id = :tai_khoan_id';
       $stmt = $this->conn->prepare($sql);
       $stmt->execute([':tai_khoan_id'=>$taiKhoanId]);
       return true;
    } catch (Exception $e) {
       echo "Lỗi".$e->getMessage();
    }
}

    

}
