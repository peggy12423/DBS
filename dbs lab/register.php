<!DOCTYPE html>
<html lang="en">
<head>
<title>圖書館使用系統</title>
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
	    <form action="insert_register_data.php" method="POST">
            <center>
                <div class="container">
                <br><br><p align=center><h1 class="jumbotron text-center">新使用者註冊系統</h1></p>
    		    帳號 : <input type="text" name="user" id='user' placeholder="請輸入帳號"/><br><br>
         		密碼 : <input type="text" name="passwd" id='passwd' placeholder="請輸入密碼"/> <br><br>
                姓名 : <input type="text" name="name" id='name' placeholder="請輸入姓名"/> <br><br>
    		    電話 : <input type="text" name="TEL" id='TEL' placeholder="請輸入電話"/> <br><br>
    		    e-mail : <input type="text" name="email" id='email' placeholder="請輸入e-mail"> <br><br>
		
                <input type="submit" class="btn btn-secondary"  value="註冊"></a>
                <a href="user_login.php" class="btn btn-light"  role="button" >返回</a>
            <center>
        </form>
</body>
</html>