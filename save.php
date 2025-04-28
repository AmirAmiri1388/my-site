<?php
$data = json_encode($_POST, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
file_put_contents('settings.json', $data);
echo 'ذخیره شد';
?>