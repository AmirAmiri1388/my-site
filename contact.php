<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>ارتباط با من</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    body {
      background: #111;
      color: #eee;
      font-family: 'Vazirmatn', sans-serif;
      margin: 0;
      padding: 0;
    }
    header, footer {
      background: #222;
      padding: 20px;
      text-align: center;
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
      max-width: 600px;
      margin: 40px auto;
      background: #1a1a1a;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(255, 215, 0, 0.3);
    }
    .container h2 {
      color: gold;
      margin-bottom: 20px;
      text-align: center;
    }
    form {
      display: flex;
      flex-direction: column;
    }
    input, textarea {
      background: #111;
      border: 1px solid gold;
      border-radius: 8px;
      margin-bottom: 15px;
      padding: 12px;
      font-size: 16px;
      color: #eee;
    }
    input::placeholder, textarea::placeholder {
      color: #aaa;
    }
    button {
      background: gold;
      color: #111;
      border: none;
      padding: 12px;
      font-size: 18px;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s;
      font-weight: bold;
    }
    button:hover {
      background: #ffcc00;
    }
    @media (max-width: 600px) {
      .container {
        margin: 20px;
      }
    }
  </style>
</head>
<body>

<header>
  <h1>ارتباط با من</h1>
  <nav>
    <a href="index.php">صفحه اصلی</a>
    <a href="articles.php">مقالات</a>
    <a href="about.php">درباره من</a>
  </nav>
</header>

<div class="container">
  <h2>فرم تماس</h2>
  <form action="https://formspree.io/f/mldbekrq" method="POST">
    <input type="text" name="name" placeholder="نام شما" required>
    <input type="email" name="email" placeholder="ایمیل شما" required>
    <textarea name="message" placeholder="پیام شما..." rows="6" required></textarea>
    <button type="submit">ارسال پیام</button>
  </form>
</div>

<footer>
  <p>تمامی حقوق محفوظ است &copy; <?php echo date('Y'); ?></p>
</footer>

</body>
</html>