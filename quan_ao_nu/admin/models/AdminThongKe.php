<?php
class AdminThongKe{
 

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

public function all_tk()
{
    try {
        // Câu lệnh SQL để lấy danh mục, số lượng sản phẩm, giá cao nhất, thấp nhất và giá trung bình
        $sql = "
            SELECT danh_mucs.id AS danh_muc_id, 
                   danh_mucs.ten_danh_muc, 
                   COUNT(san_phams.id) AS so_luong_san_pham,
                   MAX(san_phams.gia_san_pham) AS gia_cao_nhat,
                   MIN(san_phams.gia_san_pham) AS gia_thap_nhat,
                   AVG(san_phams.gia_san_pham) AS gia_trung_binh
            FROM danh_mucs
            LEFT JOIN san_phams ON danh_mucs.id = san_phams.danh_muc_id
            GROUP BY danh_mucs.id
        ";

        // Thực thi truy vấn và lấy dữ liệu
        $data = $this->pdo->query($sql)->fetchAll();
        $DanhMucList = [];

        // Duyệt qua kết quả truy vấn và gán vào đối tượng
        foreach ($data as $value) {
            $danhMuc = new stdClass();
            $danhMuc->danh_muc_id = $value['danh_muc_id']; // Lấy ID danh mục
            $danhMuc->ten_danh_muc = $value['ten_danh_muc']; 
            $danhMuc->so_luong_san_pham = $value['so_luong_san_pham'];
            $danhMuc->gia_cao_nhat = number_format($value['gia_cao_nhat'], 0, ',', '.'); // Định dạng giá cao nhất
            $danhMuc->gia_thap_nhat = number_format($value['gia_thap_nhat'], 0, ',', '.'); // Định dạng giá thấp nhất
            $danhMuc->gia_trung_binh = number_format($value['gia_trung_binh'], 0, ',', '.'); // Định dạng giá trung bình

            // Thêm vào danh sách
            array_push($DanhMucList, $danhMuc);
        }

        return $DanhMucList;
    } catch (Exception $error) {
        echo "<h1>";
        echo "Lỗi kết nối CSDL: " . $error->getMessage();
        echo "</h1>";
    }
}
public function thongKeDonHang()
{
    try {
        $thongKe = [];

        // Tổng số đơn hàng
        $sql1 = "SELECT COUNT(*) AS tong_don_hang FROM don_hangs";
        $thongKe['tong_don_hang'] = $this->pdo->query($sql1)->fetchColumn();

        // Tổng doanh thu
        $sql2 = "SELECT SUM(tong_tien) AS tong_doanh_thu FROM don_hangs WHERE trang_thai_id = 4";
        $thongKe['tong_doanh_thu'] = $this->pdo->query($sql2)->fetchColumn();

        // Tổng số lượng sản phẩm đã bán
        $sql3 = "SELECT SUM(so_luong) AS tong_san_pham FROM chi_tiet_don_hangs";
        $thongKe['tong_san_pham'] = $this->pdo->query($sql3)->fetchColumn();

        // Số đơn hàng theo trạng thái
        $sql4 = "SELECT trang_thai_id, COUNT(*) AS so_luong FROM don_hangs GROUP BY trang_thai_id";
        $trangThai = $this->pdo->query($sql4)->fetchAll(PDO::FETCH_ASSOC);
        $thongKe['trang_thai'] = $trangThai;

        // Doanh thu theo tháng
        $sql5 = "SELECT MONTH(ngay_dat) AS thang, SUM(tong_tien) AS doanh_thu
                 FROM don_hangs
                 WHERE trang_thai_id = 4
                 GROUP BY MONTH(ngay_dat)";
        $doanhThuTheoThang = $this->pdo->query($sql5)->fetchAll(PDO::FETCH_ASSOC);
        $thongKe['doanh_thu_thang'] = $doanhThuTheoThang;

        return $thongKe;
    } catch (Exception $error) {
        echo "<h1>";
        echo "Lỗi kết nối CSDL: " . $error->getMessage();
        echo "</h1>";
    }
}


     


           

 }

