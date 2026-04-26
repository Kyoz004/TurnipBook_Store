<?php
require_once __DIR__ . '/../../config/database.php';

session_start();

$user_id = $_SESSION['user_id'] ?? null;

if(isset($_POST['send'])){
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = $_POST['number'];
   $msg = mysqli_real_escape_string($conn, $_POST['message']);

   $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');

   if(mysqli_num_rows($select_message) > 0){
      $message[] = 'Phản hồi của bạn đã được gửi trước đó.';
   }else{
      mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
      $message[] = 'Phản hồi của bạn đã gửi thành công. Turnip cảm ơn bạn!';
   }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="assets/images/about-img.png" type="image/x-icon">
   <title>Liên hệ</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php include __DIR__ . '/../../includes/header.php'; ?>

<div class="heading">
   <h3>Liên hệ</h3>
   <p><a href="index.php">Trang chủ</a> / Liên hệ</p>
</div>

<section class="contact">
   <form action="" method="post">
      <h3>Hãy nói cho Turnip điều gì đó...</h3>
      <input type="text" name="name" required placeholder="Tên của bạn" class="box">
      <input type="email" name="email" required placeholder="Email của bạn" class="box">
      <input type="number" name="number" required placeholder="Số điện thoại" class="box">
      <textarea name="message" class="box" placeholder="Nội dung tin nhắn" cols="30" rows="10"></textarea>
      <input type="submit" value="Gửi tin nhắn" name="send" class="btn">
   </form>
</section>

<?php include __DIR__ . '/../../includes/footer.php'; ?>

<script src="assets/js/script.js"></script>
</body>
</html>
