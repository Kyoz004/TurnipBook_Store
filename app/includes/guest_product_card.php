<?php

function render_guest_product_card(array $product): void
{
   $name = htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8');
   $image = htmlspecialchars($product['image'], ENT_QUOTES, 'UTF-8');
   $price = number_format((float) $product['price'], 0, ',', '.') . ' VNĐ';
   ?>
   <article class="box guest-product-card">
      <img class="image" src="assets/uploads/<?php echo $image; ?>" alt="<?php echo $name; ?>">
      <div class="name"><?php echo $name; ?></div>
      <div class="price"><?php echo $price; ?></div>
      <a href="login.php" class="btn">Đăng nhập để mua</a>
   </article>
   <?php
}
