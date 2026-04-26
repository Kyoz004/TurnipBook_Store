<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../includes/guest_product_card.php';

session_start();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="assets/images/about-img.png" type="image/x-icon">
   <title>Sản phẩm Turnip</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php include __DIR__ . '/../../includes/header_guest.php'; ?>

<div class="heading compact-heading">
   <h3>Sản phẩm</h3>
   <p><a href="home_guest.php">Trang chủ</a> / Cửa hàng</p>
</div>

<section class="products guest-products">
   <h1 class="title">Tất cả sách</h1>

   <div class="box-container">
      <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
               render_guest_product_card($fetch_products);
            }
         }else{
            echo '<p class="empty">Chưa có sản phẩm nào.</p>';
         }
      ?>
   </div>
</section>

<?php include __DIR__ . '/../../includes/footer.php'; ?>

<script src="assets/js/script.js"></script>
</body>
</html>
