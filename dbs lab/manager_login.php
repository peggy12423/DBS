<!DOCTYPE html>
<html lang="en">
<head>
  <title>圖書館管理系統</title>
  <meta charset="utf-8">
  <link rel="icon" href="library.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<!-- 設定網頁編碼為UTF-8 -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form name="form" method="post" action="manager_verify.php">
    <center>
        <div class="container">
            <br><br><h1 class="jumbotron text-center">圖書館管理系統</h1>
        管理者帳號：<input type="text" name="manager" id='manager' placeholder="請輸入管理者帳號"/> <br><br>
        管理者密碼：<input type="password" name="Password" id='Password' placeholder="請輸入管理者密碼"/> <br><br>
        <div class="form-group form-check">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> 記住我
            </label>
        </div>
        <input type="submit" class="btn btn-success"  value="登入"></a>&nbsp;&nbsp;
        <a href="login.php" class="btn btn-light"  role="button" >返回</a>
    </center>
</form>


</body>
</html>