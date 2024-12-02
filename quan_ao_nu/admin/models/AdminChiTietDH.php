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
   
   public function Show()
{
    try {
        $sql = "
            SELECT chi_tiet_don_hangs.*, 
                   san_phams.ten_san_pham 
            FROM chi_tiet_don_hangs
            JOIN san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id
        ";

        $data = $this->pdo->query($sql)->fetchAll();
        $DanhSach = [];

        foreach ($data as $value) {
            $chi_tiet_don_hangs = new chi_tiet_don_hangs();

            $chi_tiet_don_hangs->id = $value['id'];
            $chi_tiet_don_hangs->don_hang_id = $value['don_hang_id'];
            $chi_tiet_don_hangs->san_pham_id = $value['san_pham_id'];
            $chi_tiet_don_hangs->ten_san_pham = $value['ten_san_pham']; // Thêm tên sản phẩm
            $chi_tiet_don_hangs->don_gia = $value['don_gia'];
            $chi_tiet_don_hangs->so_luong = $value['so_luong'];
            $chi_tiet_don_hangs->thanh_tien = $value['thanh_tien'];

            array_push($DanhSach, $chi_tiet_don_hangs);
        }

        return $DanhSach;
    } catch (Exception $error) {
        echo "<h1>";
        echo "Lỗi kết nối CSDL: " . $error->getMessage();
        echo "</h1>";
    }
}
// public function showDH($id){

//     $sql = "SELECT * FROM `chi_tiet_don_hangs` WHERE id = $id";
//     // 2. Thực hiện truy vấn
//     $stmt=$this->pdo->query($sql);

//     return $stmt->fetchAll();
// }
public function showDH($donHangId) {
    // Câu SQL kết hợp chi_tiet_don_hangs và san_phams để lấy tên sản phẩm
    $sql = "
        SELECT cth.*, sp.ten_san_pham 
        FROM `chi_tiet_don_hangs` AS cth
        JOIN `san_phams` AS sp ON cth.san_pham_id = sp.id
        WHERE cth.don_hang_id = :don_hang_id
    ";

    // Chuẩn bị câu lệnh
    $stmt = $this->pdo->prepare($sql);

    // Gắn giá trị cho placeholder :don_hang_id
    $stmt->bindParam(':don_hang_id', $donHangId, PDO::PARAM_INT);

    // Thực thi câu truy vấn
    $stmt->execute();

    // Trả về kết quả
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


}
?>