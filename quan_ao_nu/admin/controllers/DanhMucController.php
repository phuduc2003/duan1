<?php
class DanhMucController{

public $AdminDanhMuc;
public $AdminSanPham;
 // Khai báo phương thức 
  public function __construct()
  {
      // 1. Khởi tạo giá trị cho thuộc tính hang_hoaQuery
      $this->AdminDanhMuc = new AdminDanhMuc();
      $this->AdminSanPham = new AdminSanPham();
      // $this->AdminTrangThai = new AdminTrangThai();
      // Mở trình duyệt lên để kiểm tra kết quả
  }
    public function ListDM(){
  $danhSachDanhMuc = $this->AdminDanhMuc->all();
    
    include "view/danhmuc/ListDM.php";
    }
    
       
    public function themDM(){
        $danh_mucs =new danh_mucs();
        $thongBaoLoi="";
        $thongBaoThanhCong="";
        $thongBaoUploadFile="";
        if(isset($_POST["submitForm"])){
   
          $danh_mucs->ten_danh_muc=trim($_POST["ten_danh_muc"]);
          $danh_mucs->mo_ta=trim($_POST["mo_ta"]);
          
          if($danh_mucs->ten_danh_muc===""||$danh_mucs->mo_ta===""){
            $thongBaoLoi = "Tên sản phẩm, số lượng , GIá bán, Ngày xuất bản là thông tin bắt buộc. Mời bạn nhập đầy đủ thông tin và thử lại.";
  
          }
  
           
            if($thongBaoLoi===""&& $thongBaoUploadFile===""){
              $ketQua=$this->AdminDanhMuc->insert($danh_mucs);
              if($ketQua==="success"){
                $thongBaoThanhCong = "Tạo mới thành công. Mời bạn tiếp tục tạo mới hoặc quay lại danh sách.";
              
              }else {
                $thongBaoLoi = "Tạo mới thất bại. Mời bạn kiểm tra lỗi và thực hiện lại.";
  
            }
            
  
          }
  
        }
      include "view/danhmuc/CreateDM.php";
     }


     public function xuaDM($id){

        $danh_mucs =new danh_mucs();
        $thongBaoLoi="";
        $thongBaoThanhCong="";
        $thongBaoUploadFile="";

        $danh_mucs = $this->AdminDanhMuc->find_DM($id);

        if(isset($_POST["submitForm"])){
        

          $danh_mucs->ten_danh_muc=trim($_POST["ten_danh_muc"]);
          $danh_mucs->mo_ta=trim($_POST["mo_ta"]);
          
          if($danh_mucs->ten_danh_muc===""||$danh_mucs->mo_ta===""){
            $thongBaoLoi = "Tên sản phẩm, số lượng , GIá bán, Ngày xuất bản là thông tin bắt buộc. Mời bạn nhập đầy đủ thông tin và thử lại.";
  
          }
  
           
            if($thongBaoLoi===""&& $thongBaoUploadFile===""){
              $ketQua=$this->AdminDanhMuc->updateDM($id,$danh_mucs);
              if($ketQua==="success"){
                $thongBaoThanhCong = "Tạo mới thành công. Mời bạn tiếp tục tạo mới hoặc quay lại danh sách.";
              
              }else {
                $thongBaoLoi = "Tạo mới thất bại. Mời bạn kiểm tra lỗi và thực hiện lại.";
  
            }
            
  
          }
  
        }
      include "view/danhmuc/UpadteDM.php";
     }


     public function xoaDM($id){
        if($id !==""){
          $ketQua =$this->AdminDanhMuc->deleteDM($id);
          if($ketQua==="success"){
          header("Location: ?act=admin-listDM");
          }else{
            echo "<h1> Lỗi: Tham số id trống. Mời bạn kiểm tra tham số id trên đường dẫn url. </h1>";
          }
        }
       }

       public function Shirt(){
        $danhSachSanPham = $this->AdminSanPham->all();
          
          include "view/danhmuc/Shirt.php";
      
          } public function Trouser(){
            $danhSachSanPham = $this->AdminSanPham->all();
              
              include "view/danhmuc/Trouser.php";
      
              } public function Dress(){
                $danhSachSanPham = $this->AdminSanPham->all();
                  
                  include "view/danhmuc/Dress.php";
                  }

}
 
  
 
?>