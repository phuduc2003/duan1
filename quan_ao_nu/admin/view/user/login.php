
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dự án 1</title>
      <script src="https://kit.fontawesome.com/be9ed8669f.js" crossorigin="anonymous"></script>  
      <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>  
<style>
  #container1{
    width: 100%;
    height: 660px;
background: url("login/maysk.jpg");
padding-top:150px;
background-size: 100%;
}
.login{
  border:1px solid #fff;
    width: 500px;
    height: 400px;
    text-align: center;
    margin-left:480px;
    padding-top:20px ;
    background:transparent;
    backdrop-filter:blur(20px);
    border-radius:10px; 
    box-shadow:0 0 10px ;
     
}
.contai-email input,
.contai-pass input{
  width:400px;
 height:35px;
 margin-top:30px;
 background:transparent;
    border-radius:10px; 
    color:#FFF;
    border:1px solid #FFF; 
    position: relative;
}
.icon1{
  position: absolute;
        right: 60px; 
        top: 88px;
        transform: translateY(-50%);
}
.icon2{
  position: absolute;
        right: 60px; 
        bottom: 240px;
        transform: translateY(-50%);
}
.quen a{
    float:left;
    margin-left:50px;
    margin-top:20px;
    text-decoration:none;
    color:#fff;
  }
 .them a{
  float:right;
  margin-right:50px;
  margin-top:20px;
  text-decoration:none;
  color:#fff;
 } 
 .submit1{
  margin-top:50px;
  padding: 10px 100px  ;
  border-radius:10px ;
  border:1px solid #FFF;
  font-size:
 }
 .submit1:hover{
  box-shadow:0  0 10px;
 }

 p,span{
  color:#FFF;
  font-size:arial;
 }
.image img{
width: 50px;
height:50px;
margin-left:10px;
margin-top:50px;
}
</style>
<body>  
  <div id="container1">
</head>
<body>      
    <form action="?act=admin-login" method="POST" class="login"> 
      
               
        <span>ĐĂNG NHẬP</span>

          <div class="contai-email">
           
            <input type="text" name="email"   placeholder=" EMAI/SỐ ĐIỆN THOẠI/">
            <box-icon class="icon1 " name='user' color='#f3f1f0'></box-icon> 
          </div> 
        
          <div class="contai-pass">
             
        <input type="password" name="mat_khau"   placeholder="TỪ 4 ĐẾN 20 KÝ TỰ">
                <box-icon class="icon2 "   name='lock-alt' color='#fdfbfa' ></box-icon> 
        
      </div>       
                      <div class="quen">             
          <a href="#">Quên Mật Khẩu?</a> 
          </div> 
          <div class="them">
          <a href="?act=nguoiDung-register">Page Clien</a> 
                    </div> 

        <div class="sunmit">
        <input class="submit1" type="submit" value="Đăng Nhập" name="submit1" >
        </div>

                  <div class="image">
                    <a href="#"> <img src="login/face.png" alt=""></a>
                    <a href="#"><img src="login/google.png" alt=""></a>
                    <a href="#"><img src="login/zalo.png" alt=""></a>
                  </div>
  
    </form>
  </div>  
</body>
</html>