<?php

class HomeController
{
  public $modelSanPham;
  public $modelTaiKhoan;
  public $modelGioHang;
  public $modelDonHang;

  public function __construct()
  {
    $this->modelSanPham = new SanPham();
    $this->modelTaiKhoan = new TaiKhoan();
    $this->modelGioHang = new GioHang();
    $this->modelDonHang = new DonHang();

  }

  public function home()
  {
    try {
      $listSanPham = $this->modelSanPham->getAllSanPham();

      require_once "./views/trangChu.php";
    } catch (Exception $e) {
      echo "Có lỗi xảy ra: " . $e->getMessage();
    }
  }
  public function homeSanPham()
{
    try {
        $keyword = trim($_POST['keyword'] ?? '');
        $categoryId = (int)($_POST['category_id'] ?? null);
   
        // Lấy tất cả danh mục (để hiển thị danh sách đầy đủ)
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
     
        // Lọc sản phẩm dựa trên keyword và categoryId
        if (!empty($keyword) || $categoryId !== null) {
            $listSanPham = $this->modelSanPham->searchProducts(keyword: $keyword, categoryId: $categoryId);
          
        } else {
            $listSanPham = $this->modelSanPham->getAllSanPham();
        
        }

        if (empty($listSanPham)) {
            $message = "Không tìm thấy sản phẩm nào.";
        }

        require_once "./views/sanPham.php";
    } catch (Exception $e) {
        error_log("Error loading products: " . $e->getMessage());
        echo "Có lỗi xảy ra, vui lòng thử lại sau.";
    }
}

  public function detailSanPham()
  {
    $id = $_GET['id_san_pham'];
    // var_dump($id);die();
    $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
    $sanPham = $this->modelSanPham->getDetailSanPham($id);
    $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
    $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);
    $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamDanhMuc($sanPham['danh_muc_id']);
    //  var_dump($listSanPhamCungDanhMuc);die();
    if ($sanPham) {
      require_once "./views/chiTietSanPham.php";

    } else {
      header("Location: " . BASE_URL);
      exit();
    }

  }
  public function formLogin()
  {
    require_once './views/auth/formLogin.php';
    deleteSessionError();
    exit();
  }

  public function formRegister()
  {
    require_once './views/auth/formRegister.php';
    deleteSessionError();
    exit();
  }
  public function postAddTaiKhoan()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $ho_ten = $_POST['ho_ten'];
      $anh_dai_dien = !empty($_POST['anh_dai_dien']) ? $_POST['anh_dai_dien'] : null;
      $so_dien_thoai = $_POST['so_dien_thoai'];
      $ngay_sinh = $_POST['ngay_sinh'];
      $email = $_POST['email'];
      $mat_khau = $_POST['mat_khau'];
      $dia_chi = $_POST['dia_chi'];
      $gioi_tinh = $_POST['gioi_tinh'];
      $chuc_vu_id = $_POST['chuc_vu_id'];
      $trang_thai = $_POST['trang_thai'];
      $error = [];
      if (empty($ho_ten)) {
        $error['ho_ten'] = 'Name cannot be empty.';
      }
      if (empty($so_dien_thoai)) {
        $error['so_dien_thoai'] = 'Phone cannot be empty.';
      }
      if (empty($ngay_sinh)) {
        $error['ngay_sinh'] = 'Birth cannot be empty.';
      }
      if (empty($email)) {
        $error['email'] = 'Email Name cannot be empty.';
      }
      if (empty($mat_khau)) {
        $error['mat_khau'] = 'Password cannot be empty.';
      }
      if (empty($dia_chi)) {
        $error['dia_chi'] = 'Address cannot be empty.';
      }
      if (!empty($error)) {
        $_SESSION['error'] = $error; // Lưu lỗi vào session
        header("Location: " . BASE_URL . '?act=register');
        exit();
    }
      if (empty($error)) {
        $this->modelTaiKhoan->insertTaiKhoan($ho_ten, $so_dien_thoai, $ngay_sinh, $email, $mat_khau, $dia_chi, $gioi_tinh, $chuc_vu_id, $trang_thai, $anh_dai_dien);
        $_SESSION['success'] = "Tạo tài khoản thành công!";
        header("Location: " . BASE_URL . '?act=login');
        exit();
      } else {
        $_SESSION['flash'] = true;
        header("Location: " . BASE_URL . '?act=register');
        exit();
      }
    }
  }
  public function postLogin()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $email = $_POST['email'];
      $password = $_POST['password'];
      $user = $this->modelTaiKhoan->checkLogin($email, $password);
      if ($user == $email) {
        $_SESSION['user_client'] = $user;
        $_SESSION['success'] = "Đăng nhập thành công!";
        header("Location: " . BASE_URL);
        exit();
      } else {
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

  public function addGioHang()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_SESSION['user_client'])) {

        // Lấy thông tin người dùng
        $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
        $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);

        // Nếu chưa có giỏ hàng thì tạo mới
        if (!$gioHang) {
          $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
          $gioHang = ['id' => $gioHangId];
          $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
        } else {
          $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
        }

        // Lấy thông tin sản phẩm và số lượng từ form
        $san_pham_id = $_POST['san_pham_id'];
        $so_luong = $_POST['so_luong'];
        $action = isset($_POST['action']) ? $_POST['action'] : ''; // Đảm bảo action được xác định

        $checkSanPham = false;

        // Kiểm tra nếu sản phẩm đã có trong giỏ hàng
        foreach ($chiTietGioHang as $detail) {
          if ($detail['san_pham_id'] == $san_pham_id) {
            if ($action === 'decrease') {
              // Nếu hành động là giảm số lượng
              $newSoLuong = $detail['so_luong'] - 1;
              if ($newSoLuong > 0) {
                // Cập nhật số lượng
                $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);
              } else {
                // Xóa sản phẩm nếu số lượng <= 0
                $this->modelGioHang->removeProductFromCart($gioHang['id'], $san_pham_id);
              }
            } elseif ($action === 'increase') {
              // Nếu hành động là tăng số lượng
              $newSoLuong = $detail['so_luong'] + 1;
              $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);
            }
            $checkSanPham = true;
            break;
          }
        }

        // Nếu sản phẩm chưa có trong giỏ hàng, thêm vào giỏ
        if (!$checkSanPham && $action !== 'decrease') {
          $this->modelGioHang->addDetailGioHang($gioHang['id'], $san_pham_id, $so_luong);
        }

        // Chuyển hướng lại trang giỏ hàng
        header("Location: " . BASE_URL . '?act=gio-hang');
      } else {
        $_SESSION['warning'] = "Xin vui lòng đăng nhập để được đặt hàng!";
        header("Location: " . BASE_URL . '?act=login');
      }
    }
  }

  public function deleteSpTrongGh()
  {
    // Lấy san_pham_id từ URL
    $san_pham_id = $_GET['san_pham_id'] ?? null;

    // Kiểm tra nếu san_pham_id có tồn tại
    if ($san_pham_id) {
      // Lấy thông tin tài khoản người dùng từ session
      $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);

      // Lấy giỏ hàng của người dùng
      $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);

      // Kiểm tra nếu giỏ hàng tồn tại
      if ($gioHang) {
        // Xóa sản phẩm khỏi giỏ hàng
        $this->modelGioHang->removeProductFromCart($gioHang['id'], $san_pham_id);

        // Chuyển hướng lại trang giỏ hàng
        header("Location: " . BASE_URL . '?act=gio-hang');
      } else {
        // Nếu không có giỏ hàng
        echo "Giỏ hàng không tồn tại.";
      }
    } else {
      // Nếu san_pham_id không có trong URL
      echo "Không có sản phẩm để xóa.";
    }
  }
  public function gioHang()
  {
    if (isset($_SESSION['user_client'])) {
      $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
      //Lấy dữ liệu giỏ hàng người dùng
      $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);

      if (!$gioHang) {
        $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
        $gioHang = ['id' => $gioHangId];
        $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
      } else {
        $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
      }

      require_once './views/gioHang.php';
    } else {
      header("Location: " . BASE_URL . '?act=login');
    }
  }



  public function thanhToan()
  {
    if (isset($_SESSION['user_client'])) {
      $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
      
      //Lấy dữ liệu giỏ hàng người dùng
      $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);
  
      if (!$gioHang ) {
        $gioHangId = $this->modelGioHang->addGioHang($user['id']);
        $gioHang = ['id' => $gioHangId];
        $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
      } else {
        $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
      }
      if($chiTietGioHang){
        require_once './views/thanhToan.php';
      }else{
        $_SESSION['warning'] = "Chưa có sản phẩm trong giỏ hàng!";
        require_once './views/gioHang.php';
      }
    } else {
      var_dump('Chua dang nhap');
      die;
    }

  }
  public function postThanhToan()
  {
 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $tong_tien = $_POST['tong_tien'];
      $ma_don_hang = 'DH' . rand(1000, 9999);
      $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];
      if($phuong_thuc_thanh_toan_id == 2){
   
      $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
      $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
      $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
      $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
      $ghi_chu = $_POST['ghi_chu'];
     
      $ngay_dat = date(format: 'Y-m-d');
      $trang_thai_id = 2;
      $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
      $tai_khoan_id = $user['id'];
     
      //Them thong tin vao db

      $donHang = $this->modelDonHang->addDonHang($tai_khoan_id, $ten_nguoi_nhan, $email_nguoi_nhan, $dia_chi_nguoi_nhan, $sdt_nguoi_nhan, $ghi_chu, $tong_tien, $phuong_thuc_thanh_toan_id, $ngay_dat, $ma_don_hang, $trang_thai_id);
      //Lưu thông tin người dùng
      $gioHang = $this->modelGioHang->getGioHangFromUser($tai_khoan_id);
      //Lưu sản phẩm vào chi tiết đơn hàngz
      if ($donHang) {
        $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
        //Them tung san pham tu gio hang vao bang chi tiet don hang

        foreach ($chiTietGioHang as $item) {
          $donGia = $item['gia_khuyen_mai'] ?? $item['gia_san_pham']; // Uu tien don gia se lay gia khuyen mai
          $this->modelDonHang->addChiTietDonHang(
            $donHang, //ID đơn hàng vừa tạo
            $item['san_pham_id'], //Id sản phẩm
            $donGia,//đơn giá
            $item['so_luong'], //so luong
            $donGia * $item['so_luong']  //thành tiền
          );
        }
       
        //Sau khi thêm xong thì phải tiến hành xóa sản phẩm trong giỏ hàng

        //Xóa toàn bộ sản phẩm trong chi tiết giỏ hàng  
        $this->modelGioHang->clearDetailGioHang($gioHang['id']);
        //Xóa thông tin giỏ hàng người dùng
        $this->modelGioHang->clearGioHang($tai_khoan_id);
        //Chuyển hướng về trang lịch sử đơn hàng
       
        $_SESSION['success_message'] = "Đặt hàng thành công!";
      
      }
      $this->checkout($ma_don_hang,$tong_tien);
        return;
      }
      
      // var_dump($_POST);die;
      $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
      $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
      $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
      $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
      $ghi_chu = $_POST['ghi_chu'];
      $tong_tien = $_POST['tong_tien'];
      $ma_don_hang = 'DH' . rand(1000, 9999);
      
      $ngay_dat = date(format: 'Y-m-d');
      $trang_thai_id = 1;
      $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
      $tai_khoan_id = $user['id'];
    
      //Them thong tin vao db

      $donHang = $this->modelDonHang->addDonHang($tai_khoan_id, $ten_nguoi_nhan, $email_nguoi_nhan, $dia_chi_nguoi_nhan, $sdt_nguoi_nhan, $ghi_chu, $tong_tien, $phuong_thuc_thanh_toan_id, $ngay_dat, $ma_don_hang, $trang_thai_id);
      //Lưu thông tin người dùng
      $gioHang = $this->modelGioHang->getGioHangFromUser($tai_khoan_id);
      //Lưu sản phẩm vào chi tiết đơn hàngz
      if ($donHang) {
        $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
        //Them tung san pham tu gio hang vao bang chi tiet don hang

        foreach ($chiTietGioHang as $item) {
          $donGia = $item['gia_khuyen_mai'] ?? $item['gia_san_pham']; // Uu tien don gia se lay gia khuyen mai
          $this->modelDonHang->addChiTietDonHang(
            $donHang, //ID đơn hàng vừa tạo
            $item['san_pham_id'], //Id sản phẩm
            $donGia,//đơn giá
            $item['so_luong'], //so luong
            $donGia * $item['so_luong']  //thành tiền
          );
        }
        //Sau khi thêm xong thì phải tiến hành xóa sản phẩm trong giỏ hàng

        //Xóa toàn bộ sản phẩm trong chi tiết giỏ hàng  
        $this->modelGioHang->clearDetailGioHang($gioHang['id']);
        //Xóa thông tin giỏ hàng người dùng
        $this->modelGioHang->clearGioHang($tai_khoan_id);
        //Chuyển hướng về trang lịch sử đơn hàng
       
        $_SESSION['success_message'] = "Đặt hàng thành công!";
        header("Location:" . BASE_URL . '?act=lich-su-mua-hang');
        exit;
      } else {
        var_dump("Lỗi đặt hàng. Vui lòng thử lại sau");
        die;
      }
    }
  }
  public function checkout($ma_don_hang,$tong_tien){
    if(isset($_POST['phuong_thuc_thanh_toan_id']) && $_POST['phuong_thuc_thanh_toan_id'] == 2 ){

      $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
      $vnp_Returnurl = "http://localhost/duan1/quan_ao_nu/?act=lich-su-mua-hang";
      $vnp_TmnCode = "DWDM7EQF";//Mã website tại VNPAY 
      $vnp_HashSecret = "9U52LAO4JXJCYRUFLNXYHOBDS2U8695P"; //Chuỗi bí mật
      
      $vnp_TxnRef = $ma_don_hang; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này 
      // sang VNPAY
      $vnp_OrderInfo = 'noi dung thanh toan';
      $vnp_OrderType = 'billpayment';
      $vnp_Amount = $tong_tien * 21000 * 100;
      $vnp_Locale = 'VND';
      $vnp_BankCode = 'NCB';
      $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //127.0.0.1
      //Add Params of 2.0.1 Version
      // $vnp_ExpireDate = $_POST['txtexpire'];
      //Billing
      // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
      // $vnp_Bill_Email = $_POST['txt_billing_email'];
      // $fullName = trim($_POST['txt_billing_fullname']);
      // if (isset($fullName) && trim($fullName) != '') {
      //     $name = explode(' ', $fullName);
      //     $vnp_Bill_FirstName = array_shift($name);
      //     $vnp_Bill_LastName = array_pop($name);
      // }
      // $vnp_Bill_Address=$_POST['txt_inv_addr1'];
      // $vnp_Bill_City=$_POST['txt_bill_city'];
      // $vnp_Bill_Country=$_POST['txt_bill_country'];
      // $vnp_Bill_State=$_POST['txt_bill_state'];
      // // Invoice
      // $vnp_Inv_Phone=$_POST['txt_inv_mobile'];
      // $vnp_Inv_Email=$_POST['txt_inv_email'];
      // $vnp_Inv_Customer=$_POST['txt_inv_customer'];
      // $vnp_Inv_Address=$_POST['txt_inv_addr1'];
      // $vnp_Inv_Company=$_POST['txt_inv_company'];
      // $vnp_Inv_Taxcode=$_POST['txt_inv_taxcode'];
      // $vnp_Inv_Type=$_POST['cbo_inv_type'];
      $inputData = array(
          "vnp_Version" => "2.1.0",
          "vnp_TmnCode" => $vnp_TmnCode,
          "vnp_Amount" => $vnp_Amount,
          "vnp_Command" => "pay",
          "vnp_CreateDate" => date('YmdHis'),
          "vnp_CurrCode" => "VND",
          "vnp_IpAddr" => $vnp_IpAddr,
          "vnp_Locale" => $vnp_Locale,
          "vnp_OrderInfo" => $vnp_OrderInfo,
          "vnp_OrderType" => $vnp_OrderType,
          "vnp_ReturnUrl" => $vnp_Returnurl,
          "vnp_TxnRef" => $vnp_TxnRef
          // "vnp_ExpireDate"=>$vnp_ExpireDate
          // "vnp_Bill_Mobile"=>$vnp_Bill_Mobile,
          // "vnp_Bill_Email"=>$vnp_Bill_Email,
          // "vnp_Bill_FirstName"=>$vnp_Bill_FirstName,
          // "vnp_Bill_LastName"=>$vnp_Bill_LastName,
          // "vnp_Bill_Address"=>$vnp_Bill_Address,
          // "vnp_Bill_City"=>$vnp_Bill_City,
          // "vnp_Bill_Country"=>$vnp_Bill_Country,
          // "vnp_Inv_Phone"=>$vnp_Inv_Phone,
          // "vnp_Inv_Email"=>$vnp_Inv_Email,
          // "vnp_Inv_Customer"=>$vnp_Inv_Customer,
          // "vnp_Inv_Address"=>$vnp_Inv_Address,
          // "vnp_Inv_Company"=>$vnp_Inv_Company,
          // "vnp_Inv_Taxcode"=>$vnp_Inv_Taxcode,
          // "vnp_Inv_Type"=>$vnp_Inv_Type
      );
      
      if (isset($vnp_BankCode) && $vnp_BankCode != "") {
          $inputData['vnp_BankCode'] = $vnp_BankCode;
      }
      // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
      //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
      // }
      
      //var_dump($inputData);
      ksort($inputData);
      $query = "";
      $i = 0;
      $hashdata = "";
      foreach ($inputData as $key => $value) {
          if ($i == 1) {
              $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
          } else {
              $hashdata .= urlencode($key) . "=" . urlencode($value);
              $i = 1;
          }
          $query .= urlencode($key) . "=" . urlencode($value) . '&';
      }
      
      $vnp_Url = $vnp_Url . "?" . $query;
      if (isset($vnp_HashSecret)) {
          $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
          $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
      }
      $returnData = array('code' => '00'
          , 'message' => 'success'
          , 'data' => $vnp_Url);
          if (isset($_POST['phuong_thuc_thanh_toan_id'] ) == 2) {
              header('Location: ' . $vnp_Url);
              die();
          } else {
              echo json_encode($returnData);
          }
          // vui lòng tham khảo thêm tại code demo
  
     }
   

    }  
  
  public function lichSuMuaHang()
  {
    if (isset($_SESSION['user_client'])) {
      $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
      $tai_khoan_id = $user['id'];
      //Lấy ra danh sách trạng thái đơn hàng
      $arrTrangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang();
      $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');
      //Lấy ra danh sách phương thức thanh toán
      $arrPhuongThucThanhToan = $this->modelDonHang->getPhuongThucThanhToan();
      $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc', 'id');

      //lấy ra danh sách tất cả các đơn hàng của tài khoản
      $donHangs = $this->modelDonHang->getDonHangFromUser($tai_khoan_id);
      require_once './views/lichSuMuaHang.php';
    } else {
      var_dump('Bạn chưa đăng nhập');
    }

  }
  public function chiTietMuaHang()
  {
    if (isset($_SESSION['user_client'])) {
      $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
      $tai_khoan_id = $user['id'];
      //Lấy id đơn hàng t ruyền từ url
      $donHangId = $_GET['id'];
      //Lấy ra danh sách trạng thái đơn hàng
      $arrTrangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang();
      $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');
      //Lấy ra danh sách phương thức thanh toán
      $arrPhuongThucThanhToan = $this->modelDonHang->getPhuongThucThanhToan();
      $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc', 'id');
      //Lấy ra thông tin đơn hàng theo id
      $donHang = $this->modelDonHang->getDonHangById($donHangId);
      //Lấy thông tin sản phẩm của đơn hàng trong bảng chi tiết đơn hàng
      $chiTietDonHang = $this->modelDonHang->getChiTietDonHangByDonHangId($donHangId);
      if ($donHang['tai_khoan_id'] != $tai_khoan_id) {
        echo "Bạn không có quyền truy cập đơn hàng này";
        exit;

      }
      require_once './views/chiTietMuaHang.php';
      // echo "<pre>";
// var_dump($donHang);
// var_dump($chiTietDonHang);
    } else {
      var_dump('Bạn chưa đăng nhập');
      die();
    }

  }
  public function huyDonHang()
  {
    if (isset($_SESSION['user_client'])) {
      $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
      $tai_khoan_id = $user['id'];
      //Lấy id đơn hàng t ruyền từ url
      $donHangId = $_GET['id'];
      //Kiểm tra đơn hàng
      $donHang = $this->modelDonHang->getDonHangById($donHangId);
      if ($donHang['tai_khoan_id'] != $tai_khoan_id) {
        echo "Bạn không có quyền hủy đơn hàng này";
        exit;
      }
      if ($donHang['trang_thai_id'] != 1) {
        echo "Chỉ đơn hàng ở trạng thái 'Chưa xác nhận' mới có thể hủy";
        exit;
      }
      $this->modelDonHang->updateTrangThaiDonHang($donHangId, 13);
      header("Location:" . BASE_URL . '?act=lich-su-mua-hang');
      exit;
    } else {
      var_dump('Bạn chưa đăng nhập');
    }
  }
  public function postComments(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
       $san_pham_id = $_POST['san_pham_id'];
       $tai_khoan_id = $_POST['tai_khoan_id'];
       $noi_dung = $_POST['noi_dung'];
       $ngay_dang = $_POST['ngay_dang'];
       $trang_thai = $_POST['trang_thai'];
       $error = [];
      
       if(empty($noi_dung)){
           $error['noi_dung']='Nội dung không được để trống';
       }
       if(empty($error)){
             $this->modelSanPham->insertComment($san_pham_id,$tai_khoan_id,$noi_dung,$ngay_dang,$trang_thai);
             header("Location: " . BASE_URL  .'?act=chitietsanpham&id_san_pham=' . $san_pham_id);
             exit();
       }else{
           $_SESSION['flash'] = true;
           header("Location: " . BASE_URL .'?act=chitietsanpham&id_san_pham=' . $san_pham_id);
           exit();
       }
    }
   }
 


}