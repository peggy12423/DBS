<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>圖書館使用系統</title>
  <meta charset="utf-8">
  <link rel="icon" href="library.ico">
  <link rel="stylesheet" href="form.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
        <form action="borrow_record.php" method="post">

            <div class="container">
                  <h3><p align="center">借閱申請資料表</p></h3><br>
                  <label  class="mb-2 mr-sm-2">書名：</label>
                  <input class="form-control mb-2 mr-sm-2" name="book" id='book' placeholder="請輸入書名"/><br><br>
                  <input type="submit" class="btn btn-primary"  value="送出"></a>
            </div>
        </form>
    <div class="container">
        <br><br><br><br><br><br><br><br><br><br><br><br><p align="right"><a href="user.php" class="btn btn-primary"  role="button" >返回</a>&nbsp;<a href="logout.php" class="btn btn-secondary"  role="button" >登出</a></p>
    </div>

</body>
</html>