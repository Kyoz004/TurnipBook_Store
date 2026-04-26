<?php
require_once __DIR__ . '/../config/database.php';

if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">
   <div class="header-1">
      <div class="flex">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
         </div>
         <p><a href="login.php">Đăng nhập</a> | <a href="register.php">Đăng ký</a></p>
      </div>
   </div>

   <div class="header-2">
      <div class="flex">
         <a href="index.php" class="logo">Turnip <img src="assets/images/turnip.png" alt="Turnip" width="50" height="50"></a>

         <nav class="navbar">
            <a href="home_guest.php">Trang chủ</a>
            <a href="shop_guest.php">Sản phẩm</a>
            <a href="about_guest.php">Về Turnip</a>
            <a href="contact_guest.php">Liên hệ</a>
         </nav>

         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="search_page_guest.php" class="fas fa-search"></a>
            <a href="cart_guest.php"><i class="fas fa-shopping-cart"></i> <span>(0)</span></a>
            <div id="user-btn" class="fas fa-user"></div>
         </div>

         <div class="user-box">
            <p>Tài khoản : <span>Khách</span></p>
            <a href="login.php" class="btn">Đăng nhập</a>
         </div>
      </div>
   </div>
</header>
