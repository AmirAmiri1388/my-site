<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $summary = trim($_POST['summary']);
    $content = trim($_POST['content']);

    if (!empty($title) && !empty($summary) && !empty($content)) {
        $article = [
            'title' => htmlspecialchars($title, ENT_QUOTES, 'UTF-8'),
            'summary' => htmlspecialchars($summary, ENT_QUOTES, 'UTF-8'),
            'content' => htmlspecialchars($content, ENT_QUOTES, 'UTF-8'),
            'created_at' => date('Y-m-d H:i:s')
        ];
        if (!file_exists('articles')) {
            mkdir('articles', 0777, true);
        }
        $file_name = 'articles/' . time() . '.json';
        file_put_contents($file_name, json_encode($article, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        $success = true;
    } else {
        $error = "لطفاً تمام فیلدها را پر کنید.";
    }
}
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت مقاله جدید</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header>
  <h1>ثبت مقاله جدید</h1>
  <nav>
    <a href="index.php">صفحه اصلی</a>
    <a href="add-article.php">ثبت مقاله</a>
  </nav>
</header>

<main style="max-width: 700px; margin: 30px auto;">
  
  <?php if (isset($success)): ?>
    <div class="alert success">مقاله با موفقیت ثبت شد.</div>
  <?php elseif (isset($error)): ?>
    <div class="alert error"><?php echo $error; ?></div>
  <?php endif; ?>

  <form action="add-article.php" method="POST" class="form">
    <label for="title">عنوان مقاله:</label>
    <input type="text" id="title" name="title" required>

    <label for="summary">خلاصه مقاله:</label>
    <textarea id="summary" name="summary" rows="4" required></textarea>

    <label for="content">متن کامل مقاله:</label>
    <textarea id="content" name="content" rows="8" required></textarea>

    <input type="submit" value="ثبت مقاله" class="btn">
  </form>

</main>

<footer>
  <p>تمامی حقوق محفوظ است &copy; <?php echo date('Y'); ?></p>
</footer>

</body>
</html>