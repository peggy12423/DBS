<?php session_start(); ?>
<?php                 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';
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

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php include('connect.php');  ?>
<center>
    <div class="container">
        <br><br><h1 class="jumbotron text-center">圖書館管理系統</h1>
        <?php 
	        $sql = "SELECT DATE_FORMAT(NOW(), '%Y-%m-01') AS start_of_month, LAST_DAY(NOW()) AS end_of_month;";
            $res = mysqli_query( $connection, $sql );
    
            $new_sql = "SELECT *
                        FROM book
                        WHERE arrival_date >= DATE_FORMAT(NOW(), '%Y-%m-01') 
                        AND arrival_date <= LAST_DAY(NOW());
                        ";
            $new_res = mysqli_query( $connection, $new_sql );
        ?>
    </div>
    <center><?php
        echo "<h2>發送本月新書通知給所有用戶</h2>" ;
    ?>
        <a href="new_book_mail.php" class="btn btn-success"  role="button" >發送</a>&nbsp;&nbsp;
    </center>

    <?php
        echo "<br><h1>--------------------------------------------------------------------------------------------</h1>";
        echo "<h1>*** 本月新書 ***</h1>" ;
    ?>
    <div class="container">
        

        <table class="table table-striped" style="text-align:center;">
            <thead style="text-align:center;">
                <tr style="text-align:center;">
                    <th>編號</th>
                    <th>書名</th>
                    <th>借閱狀態</th>
                    <th>分類</th>
                    <th>作者</th>
                    <th>出版日期</th>
                    <th>到館日期</th>
                </tr>
            </thead>

            <?php
                    if(mysqli_num_rows($new_res) > 0){
                        foreach($new_res as $row){
                ?>

                    <tr>
                        <td><?php echo $row['bID']; ?></td> 
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['loan']; ?></td>
                        <td><?php echo $row['class']; ?></td>
                        <td><?php echo $row['author']; ?></td>
                        <td><?php echo $row['publication_date']; ?></td>
                        <td><?php echo $row['arrival_date']; ?></td>
                    </tr>
                <?php
                        }
                    }
                ?>
        </table>
        
    
        <br><br><br><br><br><p align="right"><a href="manager.php" class="btn btn-primary"  role="button" >返回</a>&nbsp;<a href="logout.php" class="btn btn-secondary"  role="button" >登出</a></p> 
    
    </div>
</body>
</html>
