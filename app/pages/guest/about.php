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
   <title>Về Turnip</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php include __DIR__ . '/../../includes/header_guest.php'; ?>

<div class="heading compact-heading">
   <h3>Về Turnip</h3>
   <p><a href="home_guest.php">Trang chủ</a> / Giới thiệu</p>
</div>

<section class="about guest-about">
   <div class="flex">
      <div class="image">
         <img src="assets/images/about-img.png" alt="">
      </div>
      <div class="content">
         <h3>Turnip Books</h3>
         <p>Turnip là cửa hàng sách nhỏ dành cho những người muốn tìm một cuốn sách vừa dễ đọc, vừa có thể giữ lại lâu dài.</p>
         <p>Bạn có thể xem danh sách sản phẩm ở chế độ khách. Khi muốn mua hàng, hãy đăng nhập để thêm sách vào giỏ và theo dõi đơn hàng.</p>
         <a href="shop_guest.php" class="btn">Xem sách</a>
      </div>
   </div>
</section>

<section class="authors compact-authors">
   <h1 class="title">Tác giả nổi bật</h1>

   <div class="box-container">
      <div class="box">
         <img src="assets/images/author-1.png" alt="Hồ Chí Minh">
         <div class="share">
            <a href="https://tulieuvankien.dangcongsan.vn/c-mac-angghen-lenin-ho-chi-minh/ho-chi-minh/tieu-su-cuoc-doi-va-su-nghiep/tieu-su-chu-tich-ho-chi-minh-52" class="fa-solid fa-circle-info"></a>
         </div>
         <h3>Hồ Chí Minh</h3>
      </div>

      <div class="box">
         <img src="assets/images/author-2.png" alt="Nguyễn Nhật Ánh">
         <div class="share">
            <a href="https://vi.wikipedia.org/wiki/Nguy%E1%BB%85n_Nh%E1%BA%ADt_%C3%81nh" class="fa-solid fa-circle-info"></a>
         </div>
         <h3>Nguyễn Nhật Ánh</h3>
      </div>

      <div class="box">
         <img src="assets/images/author-3.png" alt="Stephen Hawking">
         <div class="share">
            <a href="https://vi.wikipedia.org/wiki/Stephen_Hawking" class="fa-solid fa-circle-info"></a>
         </div>
         <h3>Stephen Hawking</h3>
      </div>

      <div class="box">
         <img src="assets/images/author-4.png" alt="J.K. Rowling">
         <div class="share">
            <a href="https://vi.wikipedia.org/wiki/J._K._Rowling" class="fa-solid fa-circle-info"></a>
         </div>
         <h3>J.K. Rowling</h3>
      </div>
   </div>
</section>

<?php include __DIR__ . '/../../includes/footer.php'; ?>

<script src="assets/js/script.js"></script>
</body>
</html>
