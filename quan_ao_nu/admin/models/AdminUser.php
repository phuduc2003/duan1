<?php
class AdminUser{

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

 public function All(){
  
    try {
        // 1. Kết nối CSDL
       $sql = "SELECT * FROM `tai_khoans` ";

               $data = $this->pdo->query($sql)->fetchAll();
       $DanhSach=[];
       foreach ($data as $value){
        $tai_khoans = new tai_khoans();
        $tai_khoans->id=$value["id"];
        $tai_khoans->ho_ten=$value["ho_ten"];
        $tai_khoans->anh_dai_dien=$value["anh_dai_dien"];
        $tai_khoans->ngay_sinh=$value["ngay_sinh"];
        $tai_khoans->email=$value["email"];

        $tai_khoans->so_dien_thoai=$value["so_dien_thoai"];
        $tai_khoans->gioi_tinh=$value["gioi_tinh"];
        $tai_khoans->dia_chi=$value["dia_chi"];
        $tai_khoans->mat_khau=$value["mat_khau"];
        $tai_khoans->chuc_vu_id=$value["chuc_vu_id"];
        $tai_khoans->trang_thai=$value["trang_thai"];

        array_push($DanhSach,$tai_khoans);
       }
       return $DanhSach;
    } catch (Exception $error) {
        echo "<h1>";
        echo "Lỗi kết nối CSDL: " . $error->getMessage();
        echo "</h1>";
    }
 }
 
 public function InsertUser(tai_khoans $tai_khoans){
    try{
    $sql = "INSERT INTO `tai_khoans` (`id`, `ho_ten`, `anh_dai_dien`, `ngay_sinh`, `email`, `so_dien_thoai`, `gioi_tinh`, `dia_chi`, `mat_khau`, `chuc_vu_id`, `trang_thai`)
     VALUES (NULL, '$tai_khoans->ho_ten', '$tai_khoans->anh_dai_dien', '$tai_khoans->ngay_sinh', '$tai_khoans->email', '$tai_khoans->so_dien_thoai', '$tai_khoans->gioi_tinh', '$tai_khoans->dia_chi', '$tai_khoans->mat_khau', '$tai_khoans->chuc_vu_id', '$tai_khoans->trang_thai')";
    $data=$this->pdo->exec($sql);
    if ($data === 1 ) {
        return "success";
    }

       }catch (Exception $error) {
        echo "<h1>";
        echo "Lỗi kết nối CSDL: " . $error->getMessage();
        echo "</h1>";
    }

 }
 public function findTK($id){
    try{
       $sql="SELECT * FROM `tai_khoans` WHERE id=$id";

       $data=$this->pdo->query($sql)->fetch();
       if($data !== false){
       $tai_khoans = new tai_khoans();
       $tai_khoans->id=$data["id"];
       $tai_khoans->ho_ten=$data["ho_ten"];
       $tai_khoans->anh_dai_dien=$data["anh_dai_dien"];
       $tai_khoans->ngay_sinh=$data["ngay_sinh"];
       $tai_khoans->email=$data["email"];
       $tai_khoans->so_dien_thoai=$data["so_dien_thoai"];
       $tai_khoans->gioi_tinh=$data["gioi_tinh"];
       $tai_khoans->dia_chi=$data["dia_chi"];
       $tai_khoans->mat_khau=$data["mat_khau"];
       $tai_khoans->chuc_vu_id=$data["chuc_vu_id"];
       $tai_khoans->trang_thai=$data["trang_thai"];

        return $tai_khoans;
    }else{
        echo "Lỗi: id không tồn tại. Mời bạn kiểm tra lại.";
       }

   
    }catch (Exception $error) {
        echo "<h1>";
        echo "Lỗi hàm find trong model: " . $error->getMessage();
        echo "</h1>";
    }
   }
   
 public function UpdateUser($id,tai_khoans $tai_khoans){
    try{
    $sql ="UPDATE `tai_khoans` SET `ho_ten`='$tai_khoans->ho_ten',`anh_dai_dien`='$tai_khoans->anh_dai_dien',`ngay_sinh`='$tai_khoans->ngay_sinh',
    `email`='$tai_khoans->email',`so_dien_thoai`='$tai_khoans->so_dien_thoai',`gioi_tinh`='$tai_khoans->gioi_tinh',`dia_chi`='$tai_khoans->dia_chi',`mat_khau`='$tai_khoans->mat_khau',`chuc_vu_id`='$tai_khoans->chuc_vu_id',`trang_thai`='$tai_khoans->trang_thai' WHERE id=$id";
    $data=$this->pdo->exec($sql);
    if ($data === 1 || $data === 0) {
        return "success";
    }

}catch (Exception $error) {
 echo "<h1>";
 echo "Lỗi kết nối CSDL: " . $error->getMessage();
 echo "</h1>";
}

}

public function check_login($email ,$mat_khau){
    $stmt = $this->pdo->prepare("SELECT * FROM tai_khoans WHERE email = '$email' AND mat_khau = '$mat_khau'");
    
     $stmt->execute();
    $user = $stmt->fetch();
    return $user;
}


}

?>