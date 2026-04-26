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
   <title>Turnip Books Store</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php include __DIR__ . '/../../includes/header_guest.php'; ?>

<section class="home hero-carousel" aria-label="Turnip banner">
   <div class="hero-slide active" style="background-image: url('assets/images/heading2-bg.jpg');"></div>
   <div class="hero-slide" style="background-image: url('assets/images/heading-bg.jpg');"></div>
   <div class="hero-slide" style="background-image: url('assets/images/about-img.png');"></div>

   <button class="hero-control prev" type="button" aria-label="Banner trước">
      <i class="fas fa-chevron-left"></i>
   </button>
   <button class="hero-control next" type="button" aria-label="Banner sau">
      <i class="fas fa-chevron-right"></i>
   </button>

   <div class="content">
      <h3>Turnip Books</h3>
      <p>Khách có thể xem sách, tìm sách và đọc thông tin trước. Khi sẵn sàng mua hàng, bạn chỉ cần đăng nhập để thêm sách vào giỏ.</p>
      <div class="guest-actions">
         <a href="shop_guest.php" class="white-btn">Xem sách</a>
         <a href="login.php" class="option-btn">Đăng nhập</a>
      </div>
   </div>

   <div class="hero-dots" aria-label="Chọn banner"></div>
</section>

<section class="products">
   <h1 class="title">Sách mới nhất</h1>

   <div class="box-container">
      <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
               render_guest_product_card($fetch_products);
            }
         }else{
            echo '<p class="empty">Chưa có sản phẩm nào.</p>';
         }
      ?>
   </div>

   <div class="load-more">
      <a href="shop_guest.php" class="option-btn">Xem tất cả sách</a>
   </div>
</section>

<section class="about guest-about-preview">
   <div class="flex">
      <div class="image">
         <img src="assets/images/about-img.png" alt="">
      </div>
      <div class="content">
         <h3>Về Turnip</h3>
         <p>Một cửa hàng sách nhỏ, tập trung vào các đầu sách để đọc, để tặng và để bắt đầu một thói quen mới.</p>
         <a href="about_guest.php" class="btn">Tìm hiểu thêm</a>
      </div>
   </div>
</section>

<section class="home-contact">
   <div class="content">
      <h3>Cần Turnip tư vấn?</h3>
      <p>Gửi câu hỏi hoặc đăng nhập để đặt hàng và theo dõi giỏ sách của bạn.</p>
      <a href="contact_guest.php" class="white-btn">Liên hệ</a>
   </div>
</section>

<?php include __DIR__ . '/../../includes/footer.php'; ?>

<script src="assets/js/script.js"></script>
</body>
</html>
