<?php

// Bao gồm tệp cấu hình
require_once __DIR__ . '/../../config/database.php';

// Bắt đầu phiên làm việc
session_start();

// Kiểm tra nếu id của quản trị viên đã được thiết lập trong phiên
if(isset($_SESSION['admin_id'])){
   $admin_id = $_SESSION['admin_id'];
} else {
   // Chuyển hướng người dùng đến trang đăng nhập nếu id của quản trị viên chưa được thiết lập
   header('location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Turnip Panel</title>

   <!-- Liên kết đến Font Awesome CDN -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- Liên kết tới tệp css tùy chỉnh cho admin -->
   <link rel="stylesheet" href="assets/css/admin_style.css">

</head>
<body>
   
<?php include __DIR__ . '/../../includes/admin_header.php'; ?>

<!-- Phần bắt đầu bảng điều khiển admin -->

<section class="dashboard">

   <h1 class="title">Bảng điều khiển</h1>

   <div class="box-container">

      <div class="box">
         <?php
            // Khởi tạo biến tổng số tiền đang chờ xử lý
            $total_pendings = 0;
            // Truy vấn cơ sở dữ liệu để lấy tổng giá trị đơn hàng đang chờ thanh toán
            $select_pending = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'pending'") or die('truy vấn thất bại');
            // Kiểm tra xem có dòng kết quả nào trả về hay không
            if(mysqli_num_rows($select_pending) > 0){
               // Lặp qua từng dòng kết quả và tính tổng số tiền đang chờ xử lý
               while($fetch_pendings = mysqli_fetch_assoc($select_pending)){
                  $total_price = $fetch_pendings['total_price'];
                  $total_pendings += $total_price;
               };
            };
         ?>
         <h3><?php echo number_format($total_pendings, 0, ',', '.') . ' vnđ'; ?></h3>
         <p>Tổng số tiền đang chờ xử lý</p>

      </div>

      <div class="box">
         <?php
            // Khởi tạo biến tổng số tiền đã thanh toán
            $total_completed = 0;
            // Truy vấn cơ sở dữ liệu để lấy tổng giá trị đơn hàng đã thanh toán
            $select_completed = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'completed'") or die('truy vấn thất bại');
            // Kiểm tra xem có dòng kết quả nào trả về hay không
            if(mysqli_num_rows($select_completed) > 0){
               // Lặp qua từng dòng kết quả và tính tổng số tiền đã thanh toán
               while($fetch_completed = mysqli_fetch_assoc($select_completed)){
                  $total_price = $fetch_completed['total_price'];
                  $total_completed += $total_price;
               };
            };
         ?>
         <h3><?php echo number_format($total_completed, 0, ',', '.') . ' vnđ'; ?></h3>
         <p>Số tiền đã thanh toán</p>

      </div>

      <div class="box">
         <?php 
            $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
            $number_of_orders = mysqli_num_rows($select_orders);
         ?>
         <h3><?php echo $number_of_orders; ?></h3>
         <p>order placed</p>
      </div>

      <div class="box">
         <?php 
            $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
            $number_of_products = mysqli_num_rows($select_products);
         ?>
         <h3><?php echo $number_of_products; ?></h3>
         <p>products added</p>
      </div>

      <div class="box">
         <?php 
            $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'user'") or die('query failed');
            $number_of_users = mysqli_num_rows($select_users);
         ?>
         <h3><?php echo $number_of_users; ?></h3>
         <p>normal users</p>
      </div>

      <div class="box">
         <?php 
            $select_admins = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'admin'") or die('query failed');
            $number_of_admins = mysqli_num_rows($select_admins);
         ?>
         <h3><?php echo $number_of_admins; ?></h3>
         <p>admin users</p>
      </div>

      <div class="box">
         <?php 
            $select_account = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
            $number_of_account = mysqli_num_rows($select_account);
         ?>
         <h3><?php echo $number_of_account; ?></h3>
         <p>total accounts</p>
      </div>

      <div class="box">
         <?php 
            $select_messages = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
            $number_of_messages = mysqli_num_rows($select_messages);
         ?>
         <h3><?php echo $number_of_messages; ?></h3>
         <p>new messages</p>
      </div>

   </div>

</section>

<!-- admin dashboard section ends -->









<!-- custom admin js file link  -->
<script src="assets/js/admin_script.js"></script>

</body>
</html>