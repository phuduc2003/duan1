<?php

class SanPham
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllSanPham()
    {


        try {
            $sql = 'SELECT san_phams.*,danh_mucs.ten_danh_muc from san_phams INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function getDetailSanPham($id)
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc from san_phams inner join danh_mucs on san_phams.danh_muc_id = danh_mucs.id WHERE san_phams.id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function getListAnhSanPham($id)
    {
        try {
            $sql = 'SELECT * FROM hinh_anh_san_phams WHERE san_pham_id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }
    public function getBinhLuanFromSanPham($id)
    {
        try {
            $sql = 'SELECT binh_luans.*,tai_khoans.ho_ten,tai_khoans.anh_dai_dien
            FROM binh_luans
            INNER JOIN tai_khoans ON binh_luans.tai_khoan_id =tai_khoans.id 
            WHERE binh_luans.san_pham_id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function getListSanPhamDanhMuc($danh_muc_id)
    {


        try {
            $sql = 'SELECT san_phams.*,danh_mucs.ten_danh_muc from san_phams INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
           where san_phams.danh_muc_id =' . $danh_muc_id;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function searchProducts($keyword, $categoryId = null)
    {
        try {
            // Xây dựng câu lệnh SQL với điều kiện tìm kiếm
            $sql = "SELECT san_phams.*, danh_mucs.ten_danh_muc 
                    FROM san_phams 
                    INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id 
                    WHERE (san_phams.ten_san_pham LIKE :keyword OR san_phams.mo_ta LIKE :keyword)";

            // Nếu có categoryId, thêm điều kiện tìm kiếm theo danh mục
            if ($categoryId) {
                $sql .= " AND san_phams.danh_muc_id = :categoryId";
            }

            // Chuẩn bị câu lệnh SQL
            $stmt = $this->conn->prepare($sql);

            // Liên kết giá trị vào tham số tìm kiếm từ khóa
            $stmt->bindValue(':keyword', '%' . $keyword . '%', PDO::PARAM_STR);

            // Nếu có categoryId, liên kết giá trị vào tham số categoryId
            if ($categoryId) {
                $stmt->bindValue(':categoryId', $categoryId, PDO::PARAM_INT);
            }

            // Thực thi câu lệnh SQL
            $stmt->execute();

            // Trả về danh sách sản phẩm tìm được
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return false; // Trả về false nếu có lỗi
        }
    }
    public function insertComment($san_pham_id, $tai_khoan_id, $noi_dung, $ngay_dang, $trang_thai)
    {
        try {
            $sql = 'INSERT into binh_luans (san_pham_id,tai_khoan_id,noi_dung,ngay_dang,trang_thai) values (:san_pham_id,:tai_khoan_id,:noi_dung,:ngay_dang,:trang_thai)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':san_pham_id' => $san_pham_id,
                    ':tai_khoan_id' => $tai_khoan_id,
                    ':noi_dung' => $noi_dung,
                    ':ngay_dang' => $ngay_dang,
                    ':trang_thai' => $trang_thai,
                ]

            );

            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }


}