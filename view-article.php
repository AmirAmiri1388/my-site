<?php
if (!isset($_GET['file'])) {
    header("Location: articles.php");
    exit();
}
$file = basename($_GET['file']);
$filepath = "articles/" . $file;

if (!file_exists($filepath)) {
    die("مقاله مورد نظر پیدا نشد!");
}

$article = json_decode(file_get_contents($filepath), true);
if (!$article) {
    die("خطا در خواندن مقاله!");
}
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title><?php echo htmlspecialchars($article['title']); ?></title>
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
      max-width: 800px;
      margin: auto;
    }
    .article-content {
      background: #1a1a1a;
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(255, 215, 0, 0.2);
    }
    .article-title {
      font-size: 28px;
      color: gold;
      margin-bottom: 20px;
    }
    .article-summary {
      font-size: 18px;
      color: #ccc;
      margin-bottom: 20px;
    }
    .article-body {
      font-size: 16px;
      color: #ddd;
      line-height: 2;
    }
    .back-link {
      display: inline-block;
      margin-top: 20px;
      background: gold;
      color: #111;
      padding: 10px 20px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: bold;
      transition: 0.3s;
    }
    .back-link:hover {
      background: #ffcc00;
      color: #000;
    }
    @media (max-width: 600px) {
      .article-title {
        font-size: 24px;
      }
      .article-body {
        font-size: 14px;
      }
    }
  </style>
</head>
<body>

<header>
  <h1><?php echo htmlspecialchars($article['title']); ?></h1>
  <nav>
    <a href="index.php">صفحه اصلی</a>
    <a href="articles.php">بازگشت به مقالات</a>
  </nav>
</header>

<div class="container">
  <div class="article-content">
    <div class="article-summary"><?php echo nl2br(htmlspecialchars($article['summary'])); ?></div>
    <hr style="border: 1px solid gold;">
    <div class="article-body"><?php echo nl2br(htmlspecialchars($article['content'])); ?></div>
    <a href="articles.php" class="back-link">بازگشت به مقالات</a>
  </div>
</div>

<footer>
  <p>تمامی حقوق محفوظ است &copy; <?php echo date('Y'); ?></p>
</footer>

</body>
</html>