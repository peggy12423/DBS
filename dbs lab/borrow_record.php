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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php
        include("connect.php");
        $book = $_POST["book"];
        $user = $_SESSION['user'];
        
        $sql1 = "SELECT * FROM book WHERE name='$book'";
        $result1 = mysqli_query( $connection, $sql1 );
        $row1 = mysqli_num_rows( $result1 );

        $sql2 = "SELECT * FROM book WHERE name='$book' AND loan='已借出'";
        $result2 = mysqli_query( $connection, $sql2 );
        $row2 = mysqli_num_rows( $result2 );


        if( $row1 == 0 ){
        ?><center><?php   
            echo  "<br><br><br><h2>查無 $book 此書!</h2>";
            echo '<meta http-equiv=REFRESH CONTENT=2;url=borrow_book.php>';
        }
        elseif( $row2 != 0 ){
        ?><center><?php 
            echo  "<br><br><br><h2>'$book' 此書已外借!</h2>";
            echo  '<br><h2>已通知借閱讀者盡速歸還!</h2>';
            echo '<meta http-equiv=REFRESH CONTENT=4;url=borrow_book.php>';

            $sql3 = "SELECT * FROM record WHERE book='$book' AND loan='已借出'";   //通知還書的信箱和到期日
            $result3 = mysqli_query( $connection, $sql3 );
            $reader = mysqli_fetch_row( $result3 );        //借閱讀者資料
            
            $sqll3 = "SELECT * FROM person WHERE user='$reader[1]' ";   
            $res3 = mysqli_query( $connection, $sqll3 );
            $name = mysqli_fetch_row( $res3 );
            $today = date("Y-n-j");            //今天日期
            
                $mail = new PHPMailer(true);
                
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'peggy12423@gmail.com';//自己的email
                $mail->Password = 'ptutfdqyoibjixme';//密碼
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                
                $mail->setFrom('peggy12423@gmail.com');//自己的email
                
                $mail->addAddress( $reader[7] );
                
                $mail->isHTML(true);
                
                $mail->Subject = "Book Return Notice";
                $mail->Body = "$name[1] 您好，有讀者已預約 '$book' 一書，請於 $reader[5] 前歸還本書，謝謝您的配合！";
                
                $mail->send();
            
            
        }
        else{
            $user = $_SESSION['user'];            //從user_verify.php取得使用者帳號
            $today = date("Y-n-j");            //今天日期
            $due_date = date( "Y-n-j" , strtotime('+30 day') );       //預計歸還日

            /*
            $user_sql = "SELECT * FROM person WHERE user='$user' ";
            $user_result = mysqli_query( $connection, $user_sql );
            $user_row = mysqli_num_rows( $user_result );
            */
            
            //取得表格record內最大的rID+1，為新紀錄的編號
            $record_sql = "SELECT rID FROM record ORDER BY rID DESC";
            $record_result = mysqli_query( $connection, $record_sql );
            $rID_num = mysqli_fetch_assoc( $record_result );
            $rID = $rID_num['rID'] +1;

            $sql4 = "SELECT * FROM person WHERE user='$user'";       //欲借書者的信箱
            $result4 = mysqli_query( $connection, $sql4 );
            $email = mysqli_fetch_row( $result4 );
                        
            $sql = "INSERT INTO record (rID, user, book, loan, borrow_date, due_date, email) 
                    VALUES ( '$rID', '$user', '$book', '已借出', '$today', '$due_date' , '$email[3]');
                    ";
            $result = mysqli_query($connection, $sql);

            $sqll = "UPDATE book 
                    SET loan='已借出',user='$user'
                    WHERE name='$book';
                    ";
            $res = mysqli_query($connection, $sqll);
            
            ?><center><?php
            echo "<br><br><br><h2>'$book' 借閱成功!</h2>";
            echo "<br><h2>請於 '$due_date' 前歸還!</h2>";
            echo '<meta http-equiv=REFRESH CONTENT=5;url=user.php>';
        }
    ?>

</body>
</html>
