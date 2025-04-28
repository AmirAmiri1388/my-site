<?php
// شروع کار با فایل json
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'site_title' => $_POST['site_title'],
        'welcome_text' => $_POST['welcome_text'],
        'about_me' => $_POST['about_me'],
        'resume_link' => $_POST['resume_link'],
        'instagram_link' => $_POST['instagram_link'],
        'contact_email' => $_POST['contact_email'],
        'projects' => [],
        'articles' => []
    ];

    // پروژه ها
    for ($i = 0; $i < count($_POST['project_title']); $i++) {
        $data['projects'][] = [
            'title' => $_POST['project_title'][$i],
            'description' => $_POST['project_description'][$i],
            'link' => $_POST['project_link'][$i]
        ];
    }

    // مقالات
    for ($i = 0; $i < count($_POST['article_title']); $i++) {
        $data['articles'][] = [
            'title' => $_POST['article_title'][$i],
            'content' => $_POST['article_content'][$i],
            'date' => $_POST['article_date'][$i]
        ];
    }

    file_put_contents('settings.json', json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    echo "<script>alert('تغییرات ذخیره شد!');</script>";
}

$settings = json_decode(file_get_contents('settings.json'), true);
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>مدیریت سایت</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>پنل مدیریت سایت</h1>
    <form method="POST">
    <label>عنوان سایت:</label>
        <input type="text" name="site_title" value="<?php echo $settings['site_title']; ?>" required>

        <label>متن خوش آمدگویی:</label>
        <textarea name="welcome_text" required><?php echo $settings['welcome_text']; ?></textarea>

        <label>درباره من:</label>
        <textarea name="about_me" required><?php echo $settings['about_me']; ?></textarea>

        <label>لینک رزومه:</label>
        <input type="text" name="resume_link" value="<?php echo $settings['resume_link']; ?>">

        <label>لینک اینستاگرام:</label>
        <input type="text" name="instagram_link" value="<?php echo $settings['instagram_link']; ?>">

        <label>ایمیل تماس:</label>
        <input type="email" name="contact_email" value="<?php echo $settings['contact_email']; ?>">

        <h2>پروژه‌ها</h2>
        <div id="projects">
            <?php foreach ($settings['projects'] as $project): ?>
                <div class="project">
                    <input type="text" name="project_title[]" placeholder="عنوان پروژه" value="<?php echo $project['title']; ?>" required>
                    <input type="text" name="project_description[]" placeholder="توضیح پروژه" value="<?php echo $project['description']; ?>" required>
                    <input type="text" name="project_link[]" placeholder="لینک پروژه" value="<?php echo $project['link']; ?>">
                    <hr>
                </div>
            <?php endforeach; ?>
        </div>
        <button type="button" onclick="addProject()">افزودن پروژه جدید</button>

        <h2>مقالات</h2>
        <div id="articles">
            <?php foreach ($settings['articles'] as $article): ?>
                <div class="article">
                    <input type="text" name="article_title[]" placeholder="عنوان مقاله" value="<?php echo $article['title']; ?>" required>
                    <textarea name="article_content[]" placeholder="متن مقاله" required><?php echo $article['content']; ?></textarea>
                    <input type="text" name="article_date[]" placeholder="تاریخ انتشار" value="<?php echo $article['date']; ?>" required>
                    <hr>
                </div>
            <?php endforeach; ?>
        </div>
        <button type="button" onclick="addArticle()">افزودن مقاله جدید</button>

        <br><br>
        <button type="submit" class="submit-btn">ذخیره تغییرات</button>
    </form>

    <script>
        function addProject() {
            const projectDiv = document.createElement('div');
            projectDiv.classList.add('project');
            projectDiv.innerHTML = `
                <input type="text" name="project_title[]" placeholder="عنوان پروژه" required>
                <input type="text" name="project_description[]" placeholder="توضیح پروژه" required>
                <input type="text" name="project_link[]" placeholder="لینک پروژه">
                <hr>
            `;
            document.getElementById('projects').appendChild(projectDiv);
        }

        function addArticle() {
            const articleDiv = document.createElement('div');
            articleDiv.classList.add('article');
            articleDiv.innerHTML = `
                <input type="text" name="article_title[]" placeholder="عنوان مقاله" required>
                <textarea name="article_content[]" placeholder="متن مقاله" required></textarea>
                <input type="text" name="article_date[]" placeholder="تاریخ انتشار" required>
                <hr>
            `;
            document.getElementById('articles').appendChild(articleDiv);
        }
    </script>
</body>
</html>