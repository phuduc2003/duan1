<?php
class AdminDanhMuc{
 

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
       $sql = "SELECT * FROM danh_mucs ";

               $data = $this->pdo->query($sql)->fetchAll();
       $DanhSach=[];
       foreach ($data as $value){
        $danh_mucs = new danh_mucs();
        $danh_mucs->id=$value["id"];
        $danh_mucs->ten_danh_muc=$value["ten_danh_muc"];
        $danh_mucs->mo_ta=$value["mo_ta"];
       
        array_push($DanhSach,$danh_mucs);
       }
       return $DanhSach;
    } catch (Exception $error) {
        echo "<h1>";
        echo "Lỗi kết nối CSDL: " . $error->getMessage();
        echo "</h1>";
    }
 }


 public function insert(danh_mucs $danh_mucs){
    try{
    $sql="INSERT INTO danh_mucs`(id`, ten_danh_muc, mo_ta) VALUES (NULL,'$danh_mucs->ten_danh_muc','$danh_mucs->mo_ta')";
    $data =$this->pdo->exec($sql);
     if ($data === 1) {
        return "success";
    }
     } catch (Exception $error) {
        echo "<h1>";
        echo "Lỗi hàm insert trong model: " . $error->getMessage();
        echo "</h1>";
    }
   }

   public function find_DM($id){
    try{
     $sql="SELECT * FROM danh_mucs WHERE id=$id";

     $data=$this->pdo->query($sql)->fetch();

     if($data !== false){
        $danh_mucs = new danh_mucs();
        $danh_mucs->id=$data["id"];
        $danh_mucs->ten_danh_muc=$data["ten_danh_muc"];
        $danh_mucs->mo_ta=$data["mo_ta"];
       
        

        return $danh_mucs;
     }else{
        echo "Lỗi: id không tồn tại. Mời bạn kiểm tra lại.";
       }
    } catch (Exception $error) {
        echo "<h1>";
        echo "Lỗi hàm insert trong model: " . $error->getMessage();
        echo "</h1>";
    }
}
public function updateDM($id,danh_mucs $danh_mucs){
    try{
       $sql="UPDATE danh_mucs SET `ten_danh_muc`='$danh_mucs->ten_danh_muc',`mo_ta`='$danh_mucs->mo_ta' WHERE id=$id";
       $data = $this->pdo->exec($sql);
       if($data ===1 || $data===0){
        return "success";
       }
    } catch (Exception $error) {
        echo "<h1>";
        echo "Lỗi hàm insert trong model: " . $error->getMessage();
        echo "</h1>";
    }
}
   
public function deleteDM($id){
    try{
        $sql = "DELETE FROM danh_mucs WHERE id=$id";
          $data =$this->pdo->exec($sql);
        if($data===1){
            return "success";
        }
    }catch (Exception $error) {
        echo "<h1>";
        echo "Lỗi hàm insert trong model: " . $error->getMessage();
        echo "</h1>";
 }
}
}
?>
