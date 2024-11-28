<?php

class TaiKhoan
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function checkLogin($email, $mat_khau)
    {
        try {
            $sql =" SELECT * from tai_khoans where email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();
            if ($user && $user['mat_khau'] === $mat_khau) {
                if ($user['chuc_vu_id'] == 2) {
                    if ($user['trang_thai'] == 1) {
                        return $user['email'];
                    } else {
                        return "Tài khoản bị cấm";
                    }
                } else {
                    return  $_SESSION['error'] = "Tài khoản không có quyền truy cập!";
                    // return "Tài khoản không có quyền truy cập";
                }
            } else {
                return "Bạn nhập sai thông tin mật khẩu hoặc tài khoản";
            }
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function getTaiKhoanFromEmail($email){
        try {
            $sql =" SELECT * from tai_khoans where email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function insertTaiKhoan($ho_ten,$so_dien_thoai,$ngay_sinh,$email,$mat_khau,$dia_chi,$gioi_tinh,$chuc_vu_id,$trang_thai,$anh_dai_dien)
    {
        try {
         
            $sql = 'INSERT into tai_khoans (ho_ten,so_dien_thoai,ngay_sinh,email,mat_khau,dia_chi,gioi_tinh,chuc_vu_id,trang_thai,anh_dai_dien) values (:ho_ten,:so_dien_thoai,:ngay_sinh,:email,:mat_khau,
            :dia_chi,:gioi_tinh,:chuc_vu_id,:trang_thai,:anh_dai_dien)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':ho_ten' => $ho_ten,
                    ':so_dien_thoai' => $so_dien_thoai,
                    ':ngay_sinh' => $ngay_sinh,
                    ':email' => $email,
                    ':mat_khau' => $mat_khau,
                    ':dia_chi' => $dia_chi,
                    ':gioi_tinh' => $gioi_tinh,
                    ':chuc_vu_id' => $chuc_vu_id,
                    ':trang_thai' => $trang_thai,
                    ':anh_dai_dien' => $anh_dai_dien,
                ]

            );
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
}