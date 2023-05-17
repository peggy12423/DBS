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

        $sql = "SELECT DATE_FORMAT(NOW(), '%Y-%m-01') AS start_of_month, LAST_DAY(NOW()) AS end_of_month;";
        $res = mysqli_query( $connection, $sql );

        $new_sql = "SELECT *
                    FROM book
                    WHERE arrival_date >= DATE_FORMAT(NOW(), '%Y-%m-01') 
                    AND arrival_date <= LAST_DAY(NOW());
                    ";
        $new_res = mysqli_query( $connection, $new_sql );

        $new = '';
        foreach ( $new_res as $new_book ){
            $new .= '
            <' . $new_book['name'] . '> ';
        }

        $new = rtrim( $new );
        //echo "$new";

        $file = fopen("new_book.txt", "w");
        fwrite( $file, "$new" );
        fclose($file);

        $book = fopen("new_book.txt", "r");     

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
        
            $mail->Subject = "New Books of This Month Notice";
            $mail->Body = "讀者您好，附件為本月新書書單，歡迎到館瀏覽借閱！";
            
            $file = 'new_book.txt';
            $content = file_get_contents($file);
            $mail->addStringAttachment($content, basename($file), 'base64', 'text/plain');


            $mail->send();
        }
        
               

        
    ?><center><?php
        echo "<br><br><br><h2>已發送本月新書通知郵件給所有用戶!</h2>" ;
        echo '<meta http-equiv=REFRESH CONTENT=4;url=new_book.php>';
    ?>
        

</body>
</html>
