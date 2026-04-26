<?php
require_once __DIR__ . '/../../config/database.php';

session_start();

if(isset($_POST['send'])){
   $message[] = 'Vui lòng đăng nhập để gửi phản hồi cho Turnip.';
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="assets/images/about-img.png" type="image/x-icon">
   <title>Liên hệ Turnip</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php include __DIR__ . '/../../includes/header_guest.php'; ?>

<div class="heading compact-heading">
   <h3>Liên hệ</h3>
   <p><a href="home_guest.php">Trang chủ</a> / Liên hệ</p>
</div>

<section class="contact guest-contact">
   <form action="" method="post">
      <h3>Cần gửi phản hồi?</h3>
      <p class="guest-note">Đăng nhập để Turnip lưu thông tin liên hệ và phản hồi đúng tài khoản của bạn.</p>
      <input type="text" name="name" placeholder="Tên của bạn" class="box">
      <input type="email" name="email" placeholder="Email" class="box">
      <input type="number" name="number" placeholder="Số điện thoại" class="box">
      <textarea name="message" class="box" placeholder="Nội dung cần hỏi" cols="30" rows="10"></textarea>
      <input type="submit" value="Gửi sau khi đăng nhập" name="send" class="btn">
      <a href="login.php" class="option-btn">Đăng nhập</a>
   </form>
</section>

<?php include __DIR__ . '/../../includes/footer.php'; ?>

<script src="assets/js/script.js"></script>
</body>
</html>
