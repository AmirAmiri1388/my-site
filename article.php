<?php
$articles = [];
if (file_exists('articles')) {
    $files = glob('articles/*.json');
    foreach ($files as $file) {
        $data = json_decode(file_get_contents($file), true);
        if ($data) {
            $articles[] = array_merge($data, ['filename' => basename($file)]);
        }
    }
    usort($articles, function ($a, $b) {
        return strtotime($b['created_at']) - strtotime($a['created_at']);
    });
}
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>لیست مقالات</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    body {
      font-family: 'Vazirmatn', sans-serif;
      background: #111;
      color: #eee;
      margin: 0;
      padding: 0;
    }
    header, footer {
      text-align: center;
      background: #222;
      padding: 20px;
      color: gold;
    }
    nav a {
      color: #ffcc00;
      margin: 0 10px;
      text-decoration: none;
      font-weight: bold;
    }
    nav a:hover {
      color: #fff;
    }
    .container {
      padding: 20px;
      max-width: 1000px;
      margin: auto;
    }
    .article-card {
      background: #1a1a1a;
      border: 1px solid #333;
      margin: 20px 0;
      padding: 20px;
      border-radius: 12px;
      transition: 0.3s;
    }
    .article-card:hover {
      background: #2a2a2a;
      transform: translateY(-5px);
    }
    .article-title {
      font-size: 24px;
      color: gold;
      margin-bottom: 10px;
    }
    .article-summary {
      font-size: 16px;
      color: #ccc;
      margin-bottom: 15px;
    }
    .article-date {
      font-size: 12px;
      color: #888;
    }
    @media (max-width: 600px) {
      .article-title {
        font-size: 20px;
      }
      .article-summary {
        font-size: 14px;
      }
    }
  </style>
</head>
<body>

<header>
  <h1>مقالات من</h1>
  <nav>
    <a href="index.php">صفحه اصلی</a>
    <a href="add-article.php">ثبت مقاله</a>
    <a href="articles.php">لیست مقالات</a>
  </nav>
</header>

<div class="container">
  <?php if (count($articles) > 0): ?>
    <?php foreach ($articles as $article): ?>
      <div class="article-card">
        <div class="article-title"><?php echo $article['title']; ?></div>
        <div class="article-summary"><?php echo $article['summary']; ?></div>
        <div class="article-date">تاریخ ثبت: <?php echo date('Y/m/d', strtotime($article['created_at'])); ?></div>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <p>هیچ مقاله‌ای ثبت نشده است.</p>
  <?php endif; ?>
</div>

<footer>
  <p>تمامی حقوق محفوظ است &copy; <?php echo date('Y'); ?></p>
</footer>

</body>
</html>