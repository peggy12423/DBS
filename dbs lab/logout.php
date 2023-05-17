<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>圖書館系統</title>
<meta charset="utf-8">
<link rel="icon" href="library.ico">

<?php
//將session清空
session_destroy();
?><center><?php
    echo '<br><br><br><h2>登出中......</h2>';
    echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';
?>