<?php
$settings = json_decode(file_get_contents('settings.json'), true);
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $settings['site_title'] ?? 'نمونه کارها'; ?> - نمونه کارها</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header class="header">
  <div class="container">
    <h1><?php echo $settings['site_title'] ?? 'سایت شخصی'; ?></h1>
    <nav>
      <ul>
        <li><a href="index.php">خانه</a></li>
        <li><a href="about.php">درباره من</a></li>
        <li><a href="portfolio.php" class="active">نمونه کارها</a></li>
        <li><a href="maghale.php">مقالات</a></li>
        <li><a href="contact.php">ارتباط با من</a></li>
      </ul>
    </nav>
  </div>
</header>

<section class="portfolio">
  <div class="container">
    <h2>نمونه کارها</h2>

    <?php
    $portfolioItems = json_decode(file_get_contents('portfolio.json'), true) ?? [];

    if (count($portfolioItems) > 0) {
      echo '<div class="portfolio-grid">';
      foreach ($portfolioItems as $item) {
        echo '<div class="portfolio-item">';
        echo '<h3>' . htmlspecialchars($item['title']) . '</h3>';
        echo '<p>' . nl2br(htmlspecialchars($item['description'])) . '</p>';
        echo '</div>';
      }
      echo '</div>';
    } else {
      echo '<p>هنوز نمونه کاری ثبت نشده است.</p>';
    }
    ?>
    
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