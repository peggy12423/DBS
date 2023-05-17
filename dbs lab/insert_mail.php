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
</head>

<body>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php
        include("connect.php");
        $book = $_SESSION['book'];


        //所有用戶的email
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
                

        
    ?><center><?php
        echo "<br><br><br><h2>已發送新書籍 '$book' 郵件至所有使用者信箱!</h2>" ;
        echo '<meta http-equiv=REFRESH CONTENT=5;url=collection.php>';
    ?>
        

</body>
</html>
