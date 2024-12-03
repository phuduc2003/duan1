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
   
public function showDH($donHangId) {
    // Câu SQL kết hợp chi_tiet_don_hangs và san_phams để lấy tên sản phẩm
    $sql = "
    SELECT 
        dh.*, 
        cth.*, 
        sp.ten_san_pham 
    FROM 
        don_hangs AS dh
    JOIN 
        chi_tiet_don_hangs AS cth ON dh.id = cth.don_hang_id
    JOIN 
        san_phams AS sp ON cth.san_pham_id = sp.id
    WHERE 
        dh.id = :don_hang_id
";


    // Chuẩn bị câu lệnh
    $stmt = $this->pdo->prepare($sql);

    // Gắn giá trị cho placeholder :don_hang_id
    $stmt->bindParam(':don_hang_id', $donHangId);

    // Thực thi câu truy vấn
    $stmt->execute();

    // Trả về kết quả
    return $stmt->fetchAll();
}


}
?>