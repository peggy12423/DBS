<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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
<?php
include("connect.php");


    $user = $_POST['user'];
    $passwd = $_POST['passwd'];
    $name = $_POST['name'];
    $tel = $_POST['TEL'];
    $email = $_POST['email'];

    $check= "SELECT * FROM person WHERE user = '$user' ";
    $result = mysqli_query( $connection, $check );
    $pass = mysqli_fetch_row( $result );

if( $pass > 0 ){
    ?><center><?php
    echo "<br><br><br><h2>該帳號已有人使用!</h2>";
    echo "<h2>請重新註冊!</h2>";
    echo '<meta http-equiv=REFRESH CONTENT=2;url=register.php>';
}

elseif( $user == null || $passwd == null || $name == null || $tel == null || $email == null){
    ?><center><?php
    echo "<br><br><br><h2>請務必輸入完整資料!</h2>";
    echo '<meta http-equiv=REFRESH CONTENT=2;url=register.php>';
}
else{
    $sql = "INSERT INTO person ( user, name, TEL, email, passwd )
            VALUES( '$user', '$name', '$tel', '$email', '$passwd' )
            ";
    $res = mysqli_query( $connection, $sql );
    if ( $res ){
        ?><center><?php
        echo "<br><br><br><h2>註冊成功!</h2>";
        echo "<h2>將自動跳轉頁面!</h2>";
        echo '<meta http-equiv=REFRESH CONTENT=2;url=user_login.php>';
    }
    else{
        ?><center><?php
        echo '<br><br><br><h2>註冊失敗!<h2>';
        echo "<h2>請重新註冊!</h2>";
        echo '<meta http-equiv=REFRESH CONTENT=2;url=register.php>';
    }
}

?>

</body>
</html>