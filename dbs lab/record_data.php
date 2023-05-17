<!DOCTYPE html>
<html lang="en">
<head>
  <title>圖書館管理系統</title>
  <meta charset="utf-8">
  <link rel="icon" href="library.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<body>
<?php include('connect.php');  ?>
<center>
    <div class="container">
        <br><br><h1 class="jumbotron text-center">圖書館管理系統</h1>
    </div>

    <form name="form" action="delete_record.php" method="post">
        <div class="col-sm-4">
            <p align="center">刪除借閱紀錄：<input type="text" name="delete_record" id='delete_record' placeholder="請輸入借閱紀錄編號"/>&emsp;<input type="submit" class="btn btn-danger"  value="刪除"></h3></p>
        </div>
    </form>

    <div class="container">
        <?php 
	        $query = "SELECT * FROM record ";
	        $query_run = mysqli_query( $connection , $query ); 
        ?>
        <input class="form-control" id="myInput" type="text" placeholder="Search.."> <br><br>
        <table class="table table-striped"style="text-align:center;">
            <thead style="text-align:center;">
                <tr style="text-align:center;">
                    <th>紀錄編號</th>
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
                        <td><?php echo $row['rID']; ?></td> 
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
</center>
    <div class="container">
        <br><br><br><br><br><br><br><br><br><br><br><br><p align="right"><a href="manager.php" class="btn btn-primary"  role="button" >返回</a>&nbsp;<a href="logout.php" class="btn btn-secondary"  role="button" >登出</a></p>
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