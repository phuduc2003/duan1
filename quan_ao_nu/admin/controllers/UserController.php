<?php
class UserController{
    public $AdminUser;

    public function __construct()
    {
        // 1. Khởi tạo giá trị cho thuộc tính hang_hoaQuery
        $this->AdminUser = new AdminUser();
   
       
        // $this->AdminTrangThai = new AdminTrangThai();
        // Mở trình duyệt lên để kiểm tra kết quả
    }

    public function ListUser(){
        $DanhSachUser = $this->AdminUser->All();
        include "view/user/UserAdmin.php";
    }
    public function CreateUser(){
        $tai_khoans =new tai_khoans();
        $thongBaoLoi="";
        $thongBaoThanhCong="";
        $thongBaoUploadFile="";

        if(isset($_POST["submitForm"])){

          $tai_khoans->ho_ten=trim($_POST["ho_ten"]);
          $tai_khoans->ngay_sinh=trim($_POST["ngay_sinh"]);
          $tai_khoans->email=trim($_POST["email"]);
          $tai_khoans->so_dien_thoai=trim($_POST["so_dien_thoai"]);
          $tai_khoans->gioi_tinh=trim($_POST["gioi_tinh"]);
          $tai_khoans->dia_chi=trim($_POST["dia_chi"]);
          $tai_khoans->mat_khau=trim($_POST["mat_khau"]);
          $tai_khoans->chuc_vu_id=trim($_POST["chuc_vu_id"]);
          $tai_khoans->trang_thai=trim($_POST["trang_thai"]);
         
          if($tai_khoans->ho_ten===""){
            $thongBaoLoi = "Tên sản phẩm, số lượng , GIá bán, Ngày xuất bản là thông tin bắt buộc. Mời bạn nhập đầy đủ thông tin và thử lại.";
  
          }
  
            if($_FILES["file_anh_upload"]["name"]!==""){
              $thamSo1=$_FILES["file_anh_upload"]["tmp_name"];
              $thamSo2 ="uploads/". $_FILES["file_anh_upload"]['name'];
              $ketQuaUploadFile=move_uploaded_file($thamSo1,$thamSo2);
              if($ketQuaUploadFile){
                $tai_khoans->anh_dai_dien=$thamSo2;
              }else{
                $thongBaoUploadFile ="upload file không thành công. mời bạn thử lại.";
              }
            }
            if($thongBaoLoi===""&& $thongBaoUploadFile===""){
              $ketQua=$this->AdminUser->InsertUser($tai_khoans);
              if($ketQua==="success"){
                $thongBaoThanhCong = "Tạo mới thành công. Mời bạn tiếp tục tạo mới hoặc quay lại danh sách.";
                $tai_khoans = new tai_khoans();
              }else {
                $thongBaoLoi = "Tạo mới thất bại. Mời bạn kiểm tra lỗi và thực hiện lại.";
  
            }
            
  
          }
  
        }
      include "view/user/CreateUser.php";
    }

    public function UpdateUser($id){
      if ($id !== "") {
         $tai_khoans =new tai_khoans();
        $thongBaoLoi="";
        $thongBaoThanhCong="";
        $thongBaoUploadFile="";
    $tai_khoans=$this->AdminUser->findTK($id);
      
        if(isset($_POST["submitForm"])){
         
          $tai_khoans->ho_ten=trim($_POST["ho_ten"]);
          $tai_khoans->ngay_sinh=trim($_POST["ngay_sinh"]);
          $tai_khoans->email=trim($_POST["email"]);
          $tai_khoans->so_dien_thoai=trim($_POST["so_dien_thoai"]);
          $tai_khoans->gioi_tinh=trim($_POST["gioi_tinh"]);
          $tai_khoans->dia_chi=trim($_POST["dia_chi"]);
          $tai_khoans->mat_khau=trim($_POST["mat_khau"]);
          $tai_khoans->chuc_vu_id=trim($_POST["chuc_vu_id"]);
          $tai_khoans->trang_thai=trim($_POST["trang_thai"]);
         
          if($tai_khoans->ho_ten===""){
            $thongBaoLoi = "Tên sản phẩm, số lượng , GIá bán, Ngày xuất bản là thông tin bắt buộc. Mời bạn nhập đầy đủ thông tin và thử lại.";
  
          }
  
            if($_FILES["file_anh_upload"]["name"]!==""){
              $thamSo1=$_FILES["file_anh_upload"]["tmp_name"];
              $thamSo2 ="uploads/". $_FILES["file_anh_upload"]['name'];
              $ketQuaUploadFile=move_uploaded_file($thamSo1,$thamSo2);
              if($ketQuaUploadFile){
                $tai_khoans->anh_dai_dien=$thamSo2;
              }else{
                $thongBaoUploadFile ="upload file không thành công. mời bạn thử lại.";
              }
            }
            if($thongBaoLoi===""&& $thongBaoUploadFile===""){
              $ketQua=$this->AdminUser->UpdateUser($id,$tai_khoans);
              if($ketQua==="success"){
                $thongBaoThanhCong = "Tạo mới thành công. Mời bạn tiếp tục tạo mới hoặc quay lại danh sách.";
               
              }else {
                $thongBaoLoi = "Tạo mới thất bại. Mời bạn kiểm tra lỗi và thực hiện lại.";
  
            }
            
  
          }
  
        }
        include "view/user/UpdateUser.php";
      } else {
        echo "<h1> Lỗi: Tham số id trống. Mời bạn kiểm tra tham số id trên đường dẫn url. </h1>";
    }
    }


    public function showLogin()
    { 
     
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        


if (isset($_POST['email']) && isset($_POST['mat_khau'])) {

$email= (strtolower(trim($_POST['email'])));
$mat_khau = $_POST['mat_khau'];
$user = $this->AdminUser->check_login($email , $mat_khau);


if ($user) {
// Phân quyền dựa trên trạng thái (chuc_vu_id) của người dùng
switch ($user['chuc_vu_id']) {
case 1: // Admin
    $_SESSION['username'] = $user['email'];
    $_SESSION['role_admin'] = $user['chuc_vu_id'];
    echo "<script>";
    echo "alert('Chào Admin');";
    echo "window.location.href = '?act=admin-sanpham';";
    echo "</script>";
    break;

case 2: // guest
    $_SESSION['username'] = $user['email '];
    $_SESSION['role_guest'] = $user['chuc_vu_id'];
    $_SESSION['id'] = $user['id'];
    echo "<script>";
    echo 'alert("Chào Bạn ");';
    echo 'window.location.href = "sanpham";';
    echo "</script>";
    break;

   

default:
    $errors = "Trạng thái người dùng không hợp lệ";
    break;
}

} else {
$errors = "Tài khoản hoặc mật khẩu không chính xác";
}


}else {
$errors = "Vui lòng nhập tên đăng nhập và mật khẩu";
}

}
include "view/user/login.php";
echo $errors;
}




    public function login(){
      include "view/user/login.php";
    }


public function logout(){
  include "view/user/logout.php";
}


    
    
}
?>