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
</head>

<body>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php
        include("connect.php");
        
        $book = $_POST["book"];
        $class = $_POST["class"];
        $author = $_POST["author"];
        $publication = $_POST["publication"];
        $today = $today = date("Y-n-j");
        $_SESSION['book'] = $book ;

        $record_sql = "SELECT bID FROM book ORDER BY bID DESC";
        $record_result = mysqli_query( $connection, $record_sql );
        $bID_num = mysqli_fetch_assoc( $record_result );
        $bID = $bID_num['bID'] +1;
        // 新增資料到表格book
        if( $book == null || $class == null || $author == null || $publication == null ){
            ?><center><?php
            echo "<br><br><br><h2>請輸入書籍完整資訊!</h2>" ;
            echo '<meta http-equiv=REFRESH CONTENT=2;url=collection.php>';
        }
        else{
            $sql1 = "INSERT INTO book (bID, loan, name, class, author, publication_date, arrival_date ) 
                VALUES ( '$bID', '書在館', '$book', '$class', '$author', '$publication', '$today' );
                ";
        $result1 = mysqli_query( $connection, $sql1 );

/*        //所有用戶的email
        $query = "SELECT * FROM person ";
        $query_run = mysqli_query( $connection , $query );       
        //寄信給所有用戶
        foreach ( $query_run as $address ){     
            $mail = new PHPMailer(true);
            
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'peggy12423@gmail.com';//你自己的email
            $mail->Password = 'ptutfdqyoibjixme';//密碼
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            
            $mail->setFrom('peggy12423@gmail.com');//自己的email


            $mail->addAddress( $address['email'] );
            $mail->isHTML(true);
        
            $mail->Subject = "New Books Notice";
            $mail->Body = "讀者您好，目前有新書 '$book' 已到館，歡迎借閱！";
            
            $mail->send();
        }
*/                

        
    ?><center><?php
        echo "<br><br><br><h2>已新增書籍 '$book' 成功!</h2>" ;
        echo "<br><h2>請問是否需發送郵件通知用戶?</h2>";
    ?>
        <a href="insert_mail.php" class="btn btn-primary"  role="button" >是</a>&nbsp;&nbsp;
        <a href="collection.php" class="btn btn-basic"  role="button" >否</a>&nbsp;&nbsp;
    <?php    
    }
    ?>
        

</body>
</html>
