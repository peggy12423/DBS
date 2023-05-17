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
        $delete_book = $_POST["delete_book"];
        
        $query = "SELECT * FROM book WHERE name='$delete_book' and loan = '書在館'; ";
        $res = mysqli_query( $connection, $query );

        if( mysqli_num_rows($res) != 0){
            $sql = "DELETE 
                FROM book
                WHERE name = '$delete_book';
                ";
            $result = mysqli_query( $connection, $sql );
            ?><center><?php
            echo "<br><br><br><h2>已刪除 '$delete_book' 成功!</h2>";
            echo '<meta http-equiv=REFRESH CONTENT=2;url=collection.php>';
            
        }

        else{
            ?><center><?php
            echo "<br><br><br><h2> '$delete_book' 已借出，無法刪除!</h2>";
            echo '<meta http-equiv=REFRESH CONTENT=2;url=collection.php>';
        }
?>
        
        
    

</body>
</html>
