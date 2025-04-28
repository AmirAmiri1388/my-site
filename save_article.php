<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = htmlspecialchars($_POST['title']);
    $summary = htmlspecialchars($_POST['summary']);
    $content = htmlspecialchars($_POST['content']);

    $file = 'articles/articles.json';
    $articles = json_decode(file_get_contents($file), true);

    $new_article = [
        'id' => time(),
        'title' => $title,
        'summary' => $summary,
        'content' => $content
    ];

    $articles[] = $new_article;
    file_put_contents($file, json_encode($articles, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    header('Location: settings.php');
}
?>