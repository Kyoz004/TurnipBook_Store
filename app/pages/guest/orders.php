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
   <title>Đơn hàng</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php include __DIR__ . '/../../includes/header_guest.php'; ?>

<div class="heading compact-heading">
   <h3>Đơn hàng</h3>
   <p><a href="home_guest.php">Trang chủ</a> / Đơn hàng</p>
</div>

<section class="guest-auth-panel">
   <div class="content">
      <i class="fas fa-receipt"></i>
      <h3>Theo dõi đơn hàng sau khi đăng nhập</h3>
      <p>Turnip sẽ hiện lịch sử đặt hàng, trạng thái thanh toán và thông tin giao hàng theo từng tài khoản.</p>
      <div class="guest-actions">
         <a href="login.php" class="btn">Đăng nhập</a>
         <a href="register.php" class="option-btn">Đăng ký</a>
      </div>
   </div>
</section>

<?php include __DIR__ . '/../../includes/footer.php'; ?>

<script src="assets/js/script.js"></script>
</body>
</html>
