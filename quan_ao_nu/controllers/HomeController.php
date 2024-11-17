<?php 

class HomeController
{

  public $modelSanPham;
  
  public function __construct(){
     $this->modelSanPham = new SanPham();
   

  }
  public function home(){
    try {
      $listSanPham = $this -> modelSanPham->getAllSanPham();
      require_once "./views/trangChu.php";
    } catch (Exception $e) {
      echo "Có lỗi xảy ra: " . $e->getMessage();
    }
  }  
  public function detailSanPham()
    {
        $id = $_GET['id_san_pham'];
        // var_dump($id);die();
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);
        $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamDanhMuc($sanPham['danh_muc_id']);
        //  var_dump($listSanPhamCungDanhMuc);die();
        if ($sanPham) {
            require_once "./views/chiTietSanPham.php";
        
        } else {
            header("Location: " . BASE_URL );
            exit();
        }

    }
}