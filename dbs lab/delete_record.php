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
        $delete_record = $_POST["delete_record"];
        
        $query = "SELECT * FROM record WHERE rID='$delete_record' ";
        $res = mysqli_query( $connection, $query );
        ?><center><?php

        if( mysqli_num_rows($res) != 0 ){
            $sql = "DELETE 
                FROM record
                WHERE rID = '$delete_record';
                ";
            $result = mysqli_query( $connection, $sql );
            echo "<br><br><br><h2>刪除 借閱紀錄$delete_record 成功!</h2>";
            echo '<meta http-equiv=REFRESH CONTENT=2;url=record_data.php>';
        }
        else{
            echo "<br><br><br><h2>查無 借閱紀錄$delete_record !</h2>";
            echo '<meta http-equiv=REFRESH CONTENT=2;url=record_data.php>';
        }
        
?>
   
</body>
</html>
