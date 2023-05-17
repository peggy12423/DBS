<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>圖書館管理系統</title>
  <meta charset="utf-8">
  <link rel="icon" href="library.ico">
</head>

<body>
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
        include("connect.php");
        $delete_user = $_POST["delete_user"];
        
        $query = "SELECT * FROM person WHERE user='$delete_user' ";
        $res = mysqli_query( $connection, $query );
        ?><center><?php

        if( mysqli_num_rows($res) != 0 ){
            $sql = "DELETE 
                FROM person
                WHERE user = '$delete_user';
                ";
            $result = mysqli_query( $connection, $sql );

            $sqll = "DELETE
                    FROM record
                    WHERE user = '$delete_user';
                    ";
            $ress = mysqli_query( $connection, $sqll );
            
            echo "<br><br><br><h2>刪除使用者 '$delete_user' 成功!</h2>";
            echo '<meta http-equiv=REFRESH CONTENT=2;url=user_data.php>';
        }
        else{
            echo "<br><br><br><h2>查無 '$delete_user' 此帳號!</h2>";
            echo '<meta http-equiv=REFRESH CONTENT=2;url=user_data.php>';
        }
        
?>
   
</body>
</html>
