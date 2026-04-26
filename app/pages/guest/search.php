<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../includes/guest_product_card.php';

session_start();

$search_item = trim($_POST['search'] ?? '');
?>

<!DOCTYPE html>
<html lang="vi">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="assets/images/about-img.png" type="image/x-icon">
   <title>Tìm sách</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php include __DIR__ . '/../../includes/header_guest.php'; ?>

<div class="heading compact-heading">
   <h3>Tìm sách</h3>
   <p><a href="home_guest.php">Trang chủ</a> / Tìm kiếm</p>
</div>

<section class="search-form guest-search">
   <form action="" method="post">
      <input type="text" name="search" value="<?php echo htmlspecialchars($search_item, ENT_QUOTES, 'UTF-8'); ?>" placeholder="Nhập tên sách cần tìm..." class="box">
      <input type="submit" name="submit" value="Tìm" class="btn">
   </form>
</section>

<section class="products guest-products">
   <div class="box-container">
      <?php
         if(isset($_POST['submit']) && $search_item !== ''){
            $safe_search = mysqli_real_escape_string($conn, $search_item);
            $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE name LIKE '%{$safe_search}%'") or die('query failed');

            if(mysqli_num_rows($select_products) > 0){
               while($fetch_product = mysqli_fetch_assoc($select_products)){
                  render_guest_product_card($fetch_product);
               }
            }else{
               echo '<p class="empty">Không tìm thấy sách phù hợp.</p>';
            }
         }else{
            echo '<p class="empty">Nhập tên sách để bắt đầu tìm kiếm.</p>';
         }
      ?>
   </div>
</section>

<?php include __DIR__ . '/../../includes/footer.php'; ?>

<script src="assets/js/script.js"></script>
</body>
</html>
