<?php
$data = json_decode(file_get_contents('data.json'), true);
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>رزومه من</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>رزومه من</h1>
        <nav>
            <a href="index.php">خانه</a>
            <a href="about.php">درباره من</a>
            <a href="contact.php">تماس با من</a>
        </nav>
    </header>

    <main>
        <a href="<?php echo $data['resume_link']; ?>" class="btn">دانلود رزومه</a>
    </main>

    <footer>
        <a href="<?php echo $data['instagram_link']; ?>" target="_blank">اینستاگرام</a>
    </footer>
</body>
</html>