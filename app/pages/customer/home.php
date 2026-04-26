<?php
require_once __DIR__ . '/../../config/database.php';

session_start();

$user_id = $_SESSION['user_id'] ?? null;

if(!isset($user_id)){
   header('location:home_guest.php');
}

if(isset($_POST['add_to_cart'])){
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'Đã có trong giỏ hàng rồi!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'Sản phẩm đã được thêm vào giỏ hàng!';
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
   <title>Turnip Books Store</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php include __DIR__ . '/../../includes/header.php'; ?>

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
      <h3>Chọn sách liền tay, tới ngay Turnip.</h3>
      <p>Từ truyện cổ tích đến văn học đương đại, hãy khám phá những cuộc phiêu lưu mới trên từng trang sách.</p>
      <a href="shop.php" class="white-btn">Mua sách ngay</a>
   </div>

   <div class="hero-dots" aria-label="Chọn banner"></div>
</section>

<section class="products">
   <h1 class="title">Sản phẩm mới nhất</h1>

   <div class="box-container">
      <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
      <form action="" method="post" class="box">
         <img class="image" src="assets/uploads/<?php echo $fetch_products['image']; ?>" alt="">
         <div class="name"><?php echo $fetch_products['name']; ?></div>
         <div class="price"><?php echo number_format($fetch_products['price'], 0, ',', '.') . ' VNĐ'; ?></div>
         <input type="number" min="1" name="product_quantity" value="1" class="qty">
         <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
         <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
         <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
         <input type="submit" value="Thêm vào giỏ" name="add_to_cart" class="btn">
      </form>
      <?php
            }
         }else{
            echo '<p class="empty">Chưa có sản phẩm nào.</p>';
         }
      ?>
   </div>

   <div class="load-more">
      <a href="shop.php" class="option-btn">Ở đây có nhiều sách</a>
   </div>
</section>

<section class="about">
   <div class="flex">
      <div class="image">
         <img src="assets/images/about-img.png" alt="">
      </div>
      <div class="content">
         <h3>Về Turnip</h3>
         <p>Sách củ cải trắng nghe tò mò phải không? Hãy cùng khám phá thêm về chúng mình nhé.</p>
         <a href="about.php" class="btn">Tìm hiểu thêm</a>
      </div>
   </div>
</section>

<section class="home-contact">
   <div class="content">
      <h3>Bạn có thắc mắc nào không?</h3>
      <p>Hãy để lại email và câu hỏi của bạn để chúng mình có thể tư vấn thêm nhé.</p>
      <a href="contact.php" class="white-btn">Liên hệ ngay!</a>
   </div>
</section>

<?php include __DIR__ . '/../../includes/footer.php'; ?>

<script src="assets/js/script.js"></script>
</body>
</html>
