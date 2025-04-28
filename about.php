<?php
$settings = json_decode(file_get_contents('settings.json'), true);
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $settings['site_title'] ?? 'درباره من'; ?> - درباره من</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header class="header">
  <div class="container">
    <h1><?php echo $settings['site_title'] ?? 'سایت شخصی'; ?></h1>
    <nav>
      <ul>
        <li><a href="index.php">خانه</a></li>
        <li><a href="about.php" class="active">درباره من</a></li>
        <li><a href="portfolio.php">نمونه کارها</a></li>
        <li><a href="maghale.php">مقالات</a></li>
        <li><a href="contact.php">ارتباط با من</a></li>
      </ul>
    </nav>
  </div>
</header>

<section class="about">
  <div class="container">
    <h2>درباره من</h2>
    <p><?php echo nl2br($settings['about_me'] ?? 'اطلاعاتی درباره من ثبت نشده است.'); ?></p>

    <div class="skills">
      <h3>مهارت‌ها:</h3>
      <ul>
        <li>طراحی سایت حرفه‌ای</li>
        <li>کدنویسی HTML, CSS, JavaScript</li>
        <li>بهینه سازی سایت برای موبایل و دسکتاپ</li>
        <li>توسعه قالب و افزونه‌های اختصاصی</li>
      </ul>
    </div>
  </div>
</section>

<footer class="footer">
  <div class="container">
    <p>کپی رایت &copy; <?php echo date('Y'); ?> | تمامی حقوق محفوظ است.</p>
    <a href="https://www.instagram.com/amirjamaliani?igsh=bWdjcXI5N2gyYmV6" target="_blank" class="social-link">اینستاگرام</a>
  </div>
</footer>

</body>
</html>