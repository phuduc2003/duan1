<?php 

class HomeController
{

    public function home(){
        try {
          require_once "./views/trangChu.php";
        } catch (Exception $e) {
          echo "Có lỗi xảy ra: " . $e->getMessage();
        }
      }  
    

}