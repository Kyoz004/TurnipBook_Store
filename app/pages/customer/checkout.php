<?php
require_once __DIR__ . '/../../config/database.php';

session_start();

$user_id = $_SESSION['user_id'] ?? null;

if(isset($_POST['order_btn'])){
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $number = $_POST['number'];
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $method = mysqli_real_escape_string($conn, $_POST['method']);
   $address = mysqli_real_escape_string($conn, 'Số nhà '. $_POST['flat'].', '. $_POST['street'].', '. $_POST['city'].', '. $_POST['state'].', '. $_POST['country'].' - '. $_POST['pin_code']);
   $placed_on = date('d-m-Y');

   $cart_total = 0;
   $cart_products = [];

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   if(mysqli_num_rows($cart_query) > 0){
      while($cart_item = mysqli_fetch_assoc($cart_query)){
         $cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].')';
         $cart_total += ($cart_item['price'] * $cart_item['quantity']);
      }
   }

   $total_products = implode(', ', $cart_products);
   $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');

   if($cart_total == 0){
      $message[] = 'Giỏ hàng của bạn đang trống!';
   }else{
      if(mysqli_num_rows($order_query) > 0){
         $message[] = 'Đơn hàng này đã được đặt trước đó!';
      }else{
         mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, placed_on) VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on')") or die('query failed');
         $message[] = 'Đặt hàng thành công! Turnip chân thành cảm ơn bạn.';
         mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      }
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
   <title>Tiến hành thanh toán</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php include __DIR__ . '/../../includes/header.php'; ?>

<div class="heading">
   <h3>Thanh toán</h3>
   <p><a href="index.php">Trang chủ</a> / Thanh toán</p>
</div>

<section class="display-order">
   <?php
      $grand_total = 0;
      $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_cart) > 0){
         while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total += $total_price;
   ?>
   <p><?php echo $fetch_cart['name']; ?> <span>(<?php echo number_format($fetch_cart['price'], 0, ',', '.').' VNĐ x '.$fetch_cart['quantity']; ?>)</span></p>
   <?php
         }
      }else{
         echo '<p class="empty">Giỏ hàng của bạn đang trống.</p>';
      }
   ?>
   <div class="grand-total">Tổng cộng: <span><?php echo number_format($grand_total, 0, ',', '.') . ' VNĐ'; ?></span></div>
</section>

<section class="checkout">
   <form action="" method="post">
      <h3>Thông tin đặt hàng</h3>
      <div class="flex">
         <div class="inputBox">
            <span>Tên của bạn:</span>
            <input type="text" name="name" required placeholder="Nhập tên của bạn">
         </div>
         <div class="inputBox">
            <span>Số điện thoại:</span>
            <input type="number" name="number" required placeholder="Nhập số điện thoại">
         </div>
         <div class="inputBox">
            <span>Email:</span>
            <input type="email" name="email" required placeholder="Nhập email của bạn">
         </div>
         <div class="inputBox">
            <span>Phương thức thanh toán:</span>
            <select name="method">
               <option value="Thanh toán khi nhận hàng">Thanh toán khi nhận hàng</option>
               <option value="Thẻ tín dụng">Thẻ tín dụng</option>
               <option value="Paypal">Paypal</option>
               <option value="Momo">Momo</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Số nhà:</span>
            <input type="number" min="0" name="flat" required placeholder="Ví dụ: Số nhà 10">
         </div>
         <div class="inputBox">
            <span>Tên đường:</span>
            <input type="text" name="street" required placeholder="Tòa nhà A, chung cư XYZ, đường ABC...">
         </div>
         <div class="inputBox">
            <span>Quận/huyện:</span>
            <input type="text" name="city" required placeholder="Quận 10">
         </div>
         <div class="inputBox">
            <span>Tỉnh/thành phố:</span>
            <input type="text" name="state" required placeholder="Thành phố Hồ Chí Minh">
         </div>
         <div class="inputBox">
            <span>Quốc gia:</span>
            <input type="text" name="country" required placeholder="Việt Nam">
         </div>
         <div class="inputBox">
            <span>Mã bưu chính:</span>
            <input type="number" min="0" name="pin_code" required placeholder="Ví dụ: 700000">
         </div>
      </div>
      <input type="submit" value="Đặt hàng ngay" class="btn" name="order_btn">
   </form>
</section>

<?php include __DIR__ . '/../../includes/footer.php'; ?>

<script src="assets/js/script.js"></script>
</body>
</html>
