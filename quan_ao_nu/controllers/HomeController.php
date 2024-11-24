<?php 

class HomeController
{

  public $modelSanPham;
  public $modelTaiKhoan;
    public $modelGioHang;
    public $modelDonHang;

    public function __construct(){
       $this->modelSanPham = new SanPham();
       $this->modelTaiKhoan = new TaiKhoan(); 
       $this->modelGioHang = new GioHang(); 
       $this->modelDonHang = new DonHang(); 

    }

  public function home(){
    try {
      $listSanPham = $this -> modelSanPham->getAllSanPham();
      require_once "./views/trangChu.php";
    } catch (Exception $e) {
      echo "Có lỗi xảy ra: " . $e->getMessage();
    }
  }  
  public function homeSanPham(){
    try {
      if (isset($_POST['keyword']) && !empty($_POST['keyword'])) {
          $keyword = $_POST['keyword'];
          // Gọi hàm tìm kiếm sản phẩm theo từ khóa
          $listSanPham = $this->modelSanPham->searchProducts($keyword);
      } else {
          // Nếu không có từ khóa, lấy tất cả sản phẩm
          $listSanPham = $this->modelSanPham->getAllSanPham();
      }
      require_once "./views/sanPham.php"; // Trả về view với danh sách sản phẩm tìm được
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
    public function formLogin(){
      require_once './views/auth/formLogin.php';
      deleteSessionError();
      exit();
    }
    public function postLogin(){
      if($_SERVER['REQUEST_METHOD']=='POST'){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = $this->modelTaiKhoan->checkLogin($email,$password);
        if ($user==$email){
          $_SESSION['user_client'] = $user;
          header("Location: " . BASE_URL );
          exit();
        }else{
          $_SESSION['error'] = $user;
          $_SESSION['flash'] = true;
          header("Location: " . BASE_URL . '?act=login');
        }

      }
    }
    public function logout()
    {
        // Xóa thông tin người dùng trong session nếu có
        if (isset($_SESSION['user_client'])) {
            unset($_SESSION['user_client']);
        }
    
        // Xóa thông tin lỗi trong session nếu có
        DeleteSessionError();
    
        // Hủy session
    
        // Chuyển hướng người dùng về trang chính hoặc trang đăng nhập sau khi đăng xuất
        header("Location: " . BASE_URL);  // Hoặc trang đăng nhập
        exit();
    }
}