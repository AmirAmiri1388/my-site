<?php
$password = "12345";

if (isset($_POST['password']) && $_POST['password'] === $password) {
    if (isset($_POST['title'], $_POST['about'], $_POST['resume'], $_POST['instagram'])) {
        $newData = [
            "main_title" => $_POST['title'],
            "about" => $_POST['about'],
            "resume_link" => $_POST['resume'],
            "instagram" => $_POST['instagram']
        ];
        file_put_contents('settings.json', json_encode($newData, JSON_PRETTY_PRINT));
        echo "تغییرات ذخیره شد!";
    }
}

$data = json_decode(file_get_contents("settings.json"), true);
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>پنل مدیریت</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <header><h1>پنل مدیریت سایت</h1></header>

  <main>
    <form method="post">
      <input type="password" name="password" placeholder="رمز عبور" required><br><br>
      <input type="text" name="title" placeholder="عنوان اصلی" value="<?= $data['main_title'] ?>" required><br><br>
      <textarea name="about" placeholder="درباره من" required><?= $data['about'] ?></textarea><br><br>
      <input type="text" name="resume" placeholder="لینک رزومه" value="<?= $data['resume_link'] ?>" required><br><br>
      <input type="text" name="instagram" placeholder="لینک اینستاگرام" value="<?= $data['instagram'] ?>" required><br><br>
      <button type="submit" class="button">ذخیره تغییرات</button>
    </form>
  </main>

  <footer>
    بازگشت به <a href="index.php">سایت</a>
  </footer>
</body>
</html>