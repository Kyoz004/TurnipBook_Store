# TurnipBook_Store 📚
First development project about eCommerce websites using PHP.

Developed with a modern and user-friendly design. The goal of this project is to create a basic online shopping experience with a modern interface and full function features for customers.

## Installation
1. Clone the repository to your machine.
2. Import `database/shop_turnipdb_backup.sql` into MySQL.
3. Update the database credentials in `app/config/database.php` if needed.
4. Put the project inside your XAMPP web root and open the site, for example `/TurnipBook-Store/` or `/TurnipBook-Store/shop.php`.
5. If you use PHP's built-in server, run `C:\xampp\php\php.exe -S 127.0.0.1:8000 app/router.php`.

## Project structure

```text
app/
  config/       Database connection files.
  includes/     Shared headers, footer, and admin layout partials.
  pages/
    admin/      Admin dashboard, products, orders, users, and contacts.
    auth/       Login, register, and logout pages.
    customer/   Logged-in customer pages.
    guest/      Guest browsing pages.
assets/
  css/          Stylesheets.
  images/       Static images.
  js/           Client-side scripts.
  uploads/      Product upload images.
database/       SQL backup.
.htaccess       Apache/XAMPP URL routing for the old PHP URLs.
```

Root PHP wrappers were removed. Browser URLs such as `orders.php`, `cart.php`, and `shop_guest.php` are now handled by `.htaccess` on XAMPP/Apache or by `app/router.php` on PHP's built-in server. The real page code lives in `app/pages/...`.

## Development
The project is in its early development stage and i are gradually improving the design and features of the website to meet the modern and trending market demands.

All contributions and feedback are welcome. If you would like to contribute to this project, please send a pull request and i will review it.

