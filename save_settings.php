<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $settings = [
        "main_title" => $_POST["main_title"],
        "about_text" => $_POST["about_text"],
        "resume_link" => $_POST["resume_link"],
        "instagram" => $_POST["instagram"]
    ];

    $json = json_encode($settings, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    file_put_contents("settings.json", $json);

    echo "<body style='background:#121212; color:#f5f5f5; font-family:Tahoma, sans-serif; text-align:center; padding:50px'>";
    echo "<h1>تغییرات با موفقیت ذخیره شد</h1>";
    echo "<a href='settings.html' style='color:#d4af37;'>بازگشت</a>";
    echo "</body>";
} else {
    echo "درخواست نامعتبر.";
}
?>