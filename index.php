<?php
// settings.json را میخوانیم
$settings = json_decode(file_get_contents('settings.json'), true);
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $settings['site_title']; ?></title>
    <style>
        body {
            font-family: 'Vazir', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #000000;
            color: #ffd700;
            direction: rtl;
        }
        header {
            background: #111;
            padding: 20px;
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            box-shadow: 0 4px 10px #ffd700;
        }
        nav {
            text-align: center;
            margin: 20px 0;
        }
        nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #ffd700;
            font-weight: bold;
            font-size: 18px;
        }
        section {
            padding: 20px;
        }
        h1, h2 {
            color: #ffd700;
            border-bottom: 2px solid #ffd700;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .project, .article {
            margin-bottom: 30px;
            padding: 15px;
            background: #1a1a1a;
            border: 1px solid #333;
            border-radius: 10px;
        }
        footer {
            background: #111;
            text-align: center;
            padding: 15px;
            font-size: 14px;
            margin-top: 40px;
            box-shadow: 0 -4px 10px #ffd700;
        }
        .btn {
            background: #ffd700;
            color: #000;
            padding: 10px 20px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.3s;
        }
        .btn:hover {
            background: #e5c100;
        }
        @media(max-width:768px) {
            nav a {
                display: block;
                margin: 10px 0;
            }
        }
    </style>
</head>

<body>

<header>
    <?php echo $settings['site_title']; ?>
</header>

<nav>
    <a href="#welcome">خانه</a>
    <a href="#about">درباره من</a>
    <a href="#projects">پروژه ها</a>
    <a href="#articles">مقالات</a>
    <a href="#contact">تماس با من</a>
</nav>

<section id="welcome">
    <h1>خوش آمدید</h1>
    <p><?php echo nl2br($settings['welcome_text']); ?></p>
</section>

<section id="about">
    <h2>درباره من</h2>
    <p><?php echo nl2br($settings['about_me']); ?></p>
    <br>
    <?php if (!empty($settings['resume_link'])): ?>
        <a class="btn" href="<?php echo $settings['resume_link']; ?>" target="_blank">دانلود رزومه</a>
    <?php endif; ?>
</section>

<section id="projects">
    <h2>پروژه ها</h2>
    <?php foreach($settings['projects'] as $project): ?>
        <div class="project">
            <h3><?php echo $project['title']; ?></h3>
            <p><?php echo $project['description']; ?></p>
            <?php if (!empty($project['link'])): ?>
                <a class="btn" href="<?php echo $project['link']; ?>" target="_blank">مشاهده پروژه</a>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</section>

<section id="articles">
    <h2>مقالات</h2>
    <?php foreach($settings['articles'] as $article): ?>
        <div class="article">
            <h3><?php echo $article['title']; ?></h3>
            <p><?php echo nl2br($article['content']); ?></p>
            <small>تاریخ: <?php echo $article['date']; ?></small>
        </div>
    <?php endforeach; ?>
</section>

<section id="contact">
    <h2>ارتباط با من</h2>
    <form action="https://formspree.io/f/mldbekrq" method="POST">
        <input type="text" name="name" placeholder="نام شما" required style="width:100%; margin:10px 0; padding:10px;">
        <input type="email" name="email" placeholder="ایمیل شما" required style="width:100%; margin:10px 0; padding:10px;">
        <textarea name="message" placeholder="پیام شما" required style="width:100%; margin:10px 0; padding:10px; height:150px;"></textarea>
        <button type="submit" class="btn">ارسال پیام</button>
    </form>
    <br>
    <?php if (!empty($settings['instagram_link'])): ?>
        <a class="btn" href="<?php echo $settings['instagram_link']; ?>" target="_blank">اینستاگرام من</a>
    <?php endif; ?>
</section>

<footer>
    © کلیه حقوق محفوظ است.
</footer>

</body>
</html>