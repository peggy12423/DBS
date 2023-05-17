<?php session_start(); ?>
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
    <?php
        include("connect.php");
        $book = $_POST["book"];
        $user = $_POST["user"];

        $sql1 = "SELECT * FROM book WHERE name='$book'";
        $result1 = mysqli_query( $connection, $sql1 );
        $row1 = mysqli_num_rows( $result1 );

        $sql2 = "SELECT * FROM book WHERE name='$book' AND loan='書在館'";
        $result2 = mysqli_query( $connection, $sql2 );
        $row2 = mysqli_num_rows( $result2 );

        $query = "SELECT * FROM record WHERE book='$book' AND user='$user'";
        $res = mysqli_query( $connection, $query );
        $data = mysqli_num_rows( $res );


        if( $row1 == 0 ){
        ?><center><?php   
            echo  "<br><br><br><h2>查無 '$book' 此書!</h2>";
            echo '<meta http-equiv=REFRESH CONTENT=2;url=return_book.php>';
        }
        elseif( $row2 != 0 ){
        ?><center><?php 
            echo  "<br><br><br><h2> '$book' 此書在館!</h2>";
            echo '<meta http-equiv=REFRESH CONTENT=2;url=return_book.php>';
        }
        elseif( $data != 0 ){
            $today = date("Y-n-j");            //今天日期

            /*
            $user_sql = "SELECT * FROM person WHERE user='$user' ";
            $user_result = mysqli_query( $connection, $user_sql );
            $user_row = mysqli_num_rows( $user_result );
            */
            
                        
            $sql = "UPDATE record 
                    SET loan = '已歸還', return_date = '$today'
                    WHERE book='$book' AND user='$user';
                    ";
            $result = mysqli_query($connection, $sql);

            $sqll = "UPDATE book 
                    SET loan='書在館',user=''
                    WHERE name='$book';
                    ";
            $res = mysqli_query($connection, $sqll);
            
            ?><center><?php
            echo "<br><br><br><h2> '$book' 歸還成功!</h2>";
            echo '<meta http-equiv=REFRESH CONTENT=2;url=manager.php>';
        }
        else{
            ?><center><?php
            echo '<br><br><br><h2>請輸入正確使用者帳號!</h2>';
            echo '<meta http-equiv=REFRESH CONTENT=3;url=return_book.php>';
        }
    ?>

</body>
</html>
