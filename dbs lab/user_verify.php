<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

<?php
include("connect.php");
$user = $_POST["user"];          //從user_login.php的帳號取值
$password = $_POST["Password"];    //從user_login.php的密碼取值

$user_query = "select * from person where user = '$user'" ;  //SQL查詢語言，讀取表格person欄位user名為$user的值
$user_result = mysqli_query( $connection, $user_query );      //送出SQL查詢語言，把查詢語句存入result
$user_data = mysqli_fetch_row( $user_result );    //擷取查詢結果的一列資料，並將游標往下，擷取結果傳回user_data

$sql = "select name from person where user = '$user'" ;  //SQL查詢語言，讀取表格person欄位user名為$user的值
$res = mysqli_query( $connection, $sql );
$user_name = mysqli_fetch_assoc( $res );

//判斷user和password是否為空值，資料庫裡是否有這個用戶或管理者
if( !empty($user_data[0]) && !empty($user_data[4]) && $user_data[0] == $user  && $user_data[4] == $password ){

    $_SESSION['user'] = $user ;
    $_SESSION['name'] = $user_name['name'] ;
        //echo '使用者登入成功!';
        ?><center><?php
        
        echo "<br><br><br><h2>使用者 $user_data[1] 登入成功!</h2>";
        echo '<meta http-equiv=REFRESH CONTENT=2;url=user.php>';   //跳轉到user.php頁面
}
else{
    ?><center><?php
    echo '<br><br><br><h2>使用者帳號或密碼錯誤!</h2>';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=user_login.php>';    //若未查到資料庫user資料，則跳轉到user_login.php頁面
}
 
// mysqli_close( $connection );

?>

<body>
</html>