<?php

class san_phams
{
    // Khai báo thuộc tính
    public $id;
    public $ten_san_pham;
    public $gia_san_pham;
    public $gia_khuyen_mai;
    public $hinh_anh;
    public $so_luong;
    public $luot_xem;
    public $ngay_nhap;
    public $mo_ta;
    public $danh_muc_id;
    public $trang_thai;
}


class tai_khoans{

public $id;
    public $ho_ten;
    public $anh_dai_dien;
    public $ngay_sinh;
    public $email;
    public $so_dien_thoai;
    public $gioi_tinh;
    public $dia_chi;
    public $mat_khau;
    public $danh_muc_id;
    public $trang_thai;
}
class don_hangs{
    public $id;
    public $ma_don_hang;
    public $tai_khoan_id;
    public $ten_nguoi_nhan;
    public $email_nguoi_nhan;
    public $sdt_nguoi_nhan;
    public $dia_chi_nguoi_nhan;
    public $ngay_dat;
    public $tong_tien;
    public $phuong_thuc_thanh_toan_id;
    public $ghi_chu;
    public $trang_thai;
}
class chi_tiet_don_hangs{
      public $id;
    public $don_hang_id;
    public $san_pham_id ;
    public $don_gia;
    public $so_luong;
    public $thanh_tien;
  
}
class danh_mucs{}
class binh_luans{}

?>