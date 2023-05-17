<?php 
  if ( !session_id() ){
    session_start();
  }
?>

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

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<center>
<?php
    include("connect.php");
?>

<div class="container" style="line-height: 10px;;">
    <br><br><p align=center><h1 class="jumbotron text-center">圖書館管理系統</h1></p>
    <h4>Hi! <?php echo $_SESSION['manager_name']; ?></h4><br />
    <h4>請選擇管理者功能</h4><br />
    <a href="new_book.php" class="btn btn-success"  role="button" >本月新書</a><br /><br />
    <a href="manager_borrow_book.php" class="btn btn-primary"  role="button" >借閱書籍</a>
    <a href="return_book.php" class="btn btn-primary"  role="button" >歸還書籍</a><br /><br />
    <a href="collection.php" class="btn btn-info"  role="button" >管理館藏</a>
    <a href="user_data.php" class="btn btn-info"  role="button" >瀏覽用戶資料</a>
    <a href="record_data.php" class="btn btn-info"  role="button" >瀏覽借閱資料</a>
    
</div>

<div class="container">
    <br><br><br><br><br><br><br><br><br><br><br><br><p align="right"><a href="logout.php" class="btn btn-secondary"  role="button" >登出</a></p>
</div>

</body>
</html>

