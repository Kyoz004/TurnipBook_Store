<?php
require_once __DIR__ . '/../../config/database.php';

session_start();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="assets/images/about-img.png" type="image/x-icon">
   <title>Giỏ hàng</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php include __DIR__ . '/../../includes/header_guest.php'; ?>

<div class="heading compact-heading">
   <h3>Giỏ hàng</h3>
   <p><a href="home_guest.php">Trang chủ</a> / Giỏ hàng</p>
</div>

<section class="guest-auth-panel">
   <div class="content">
      <i class="fas fa-shopping-cart"></i>
      <h3>Giỏ hàng cần tài khoản</h3>
      <p>Đăng nhập để thêm sách vào giỏ, cập nhật số lượng và tiến hành thanh toán.</p>
      <div class="guest-actions">
         <a href="login.php" class="btn">Đăng nhập</a>
         <a href="shop_guest.php" class="option-btn">Xem sách</a>
      </div>
   </div>
</section>

<?php include __DIR__ . '/../../includes/footer.php'; ?>

<script src="assets/js/script.js"></script>
</body>
</html>
