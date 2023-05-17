<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$hostname = "localhost";
$username = "peggy1008";
$password = "871008";
$dbname = "library";

$connection = mysqli_connect( $hostname, $username, $password );
$select_db = mysqli_select_db( $connection, $dbname );   //一個系統可能有多個DB
//連結資料庫伺服器系統    
//hostname, user name, password
if( !$connection ){                     //連線失敗
    die("MySQL 連線失敗!<br/>") ;
}
if( !$select_db ){                      //資料庫無法使用
    die("無法使用資料庫!<br/>");
}
   

?>