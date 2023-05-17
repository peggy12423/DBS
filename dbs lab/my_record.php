<?php session_start(); ?>
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

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<?php include('connect.php');  ?>
<center>
    <div class="container">
        <br><br><h1 class="jumbotron text-center">圖書館使用系統</h1>
        <?php 
            $user = $_SESSION['user'];
	        $query = "SELECT * FROM record WHERE user = '$user' ";
	        $query_run = mysqli_query( $connection , $query ); 
        ?>
    </div>
    <div class="container">
        <input class="form-control" id="myInput" type="text" placeholder="Search.."> <br><br>

        <table class="table table-striped"style="text-align:center;">
            <thead style="text-align:center;">
                <tr style="text-align:center;">
                    <th>使用者帳號</th>
                    <th>書名</th>
                    <th>借閱狀態</th>
                    <th>借出日期</th>
                    <th>預計還書日期</th>
                    <th>歸還日期</th>
                </tr>
            </thead>

            <tbody id='myTable'>
                <!-- 大括號的上、下半部分 分別用 PHP 拆開 ，這樣中間就可以純用HTML語法-->
                <?php
                    if(mysqli_num_rows($query_run) > 0){
                        foreach($query_run as $row){
                ?>

                    <tr>
                    <td><?php echo $row['user']; ?></td> 
                        <td><?php echo $row['book']; ?></td> 
                        <td><?php echo $row['loan']; ?></td>
                        <td><?php echo $row['borrow_date']; ?></td>
                        <td><?php echo $row['due_date']; ?></td>
                        <td><?php echo $row['return_date']; ?></td>
                    
                    </tr>

                <?php
                    }
                    }
                ?>
            </tbody>
        </table>
        <br><br><br><br><br><br><br><br><br><br><br><br><p align="right"><a href="user.php" class="btn btn-primary"  role="button" >返回</a>&nbsp;<a href="logout.php" class="btn btn-secondary"  role="button" >登出</a></p>
    </div>
    
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

</body>
</html>