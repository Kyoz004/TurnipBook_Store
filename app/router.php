<?php

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path = trim($path, '/');

if ($path !== '') {
   $staticPath = dirname(__DIR__) . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $path);
   if (is_file($staticPath)) {
      return false;
   }
}

$routes = [
   '' => 'app/pages/customer/home.php',
   'index.php' => 'app/pages/customer/home.php',

   'home_guest.php' => 'app/pages/guest/home.php',
   'shop_guest.php' => 'app/pages/guest/shop.php',
   'search_page_guest.php' => 'app/pages/guest/search.php',
   'orders_guest.php' => 'app/pages/guest/orders.php',
   'cart_guest.php' => 'app/pages/guest/cart.php',
   'contact_guest.php' => 'app/pages/guest/contact.php',
   'about_guest.php' => 'app/pages/guest/about.php',

   'shop.php' => 'app/pages/customer/shop.php',
   'search_page.php' => 'app/pages/customer/search.php',
   'orders.php' => 'app/pages/customer/orders.php',
   'cart.php' => 'app/pages/customer/cart.php',
   'checkout.php' => 'app/pages/customer/checkout.php',
   'contact.php' => 'app/pages/customer/contact.php',
   'about.php' => 'app/pages/customer/about.php',

   'login.php' => 'app/pages/auth/login.php',
   'register.php' => 'app/pages/auth/register.php',
   'logout.php' => 'app/pages/auth/logout.php',

   'admin_page.php' => 'app/pages/admin/dashboard.php',
   'admin_products.php' => 'app/pages/admin/products.php',
   'admin_orders.php' => 'app/pages/admin/orders.php',
   'admin_users.php' => 'app/pages/admin/users.php',
   'admin_contacts.php' => 'app/pages/admin/contacts.php',
];

if (isset($routes[$path])) {
   require dirname(__DIR__) . DIRECTORY_SEPARATOR . $routes[$path];
   return true;
}

http_response_code(404);
echo '404 Not Found';
