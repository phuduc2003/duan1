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
}