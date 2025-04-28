<?php
$settings = json_decode(file_get_contents('settings.json'), true);
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $settings['site_title'] ?? 'مقالات'; ?> - مقالات</title>
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
        <li><a href="portfolio.php">نمونه کارها</a></li>
        <li><a href="maghale.php" class="active">مقالات</a></li>
        <li><a href="contact.php">ارتباط با من</a></li>
      </ul>
    </nav>
  </div>
</header>

<section class="articles">
  <div class="container">
    <h2>مقالات</h2>

    <?php
    $articles = json_decode(file_get_contents('articles.json'), true) ?? [];

    if (count($articles) > 0) {
      echo '<div class="articles-grid">';
      foreach ($articles as $article) {
        echo '<div class="article-item">';
        echo '<h3>' . htmlspecialchars($article['title']) . '</h3>';
        echo '<p>' . nl2br(htmlspecialchars($article['content'])) . '</p>';
        echo '</div>';
      }
      echo '</div>';
    } else {
      echo '<p>هنوز مقاله‌ای ثبت نشده است.</p>';
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