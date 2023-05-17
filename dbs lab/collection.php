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

<!-- 設定網頁編碼為UTF-8 -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <div class="container" style="line-height: 10px;;">
            <br><br><h1 class="jumbotron text-center">圖書館管理系統</h1><br>
            <div class="container" style="line-height: 10px;;">
                <div class="row">
                    <div class="col-sm-4">
                        <form name="form" method="post" action="insert_collect.php">
                        <h3>新增書籍</h3><br />
                        <h5>書名：<input type="text" name="book" id='book' placeholder="請輸入新增書名"/></h5> <br><br />
                        <h5>分類：<input type="text" name="class" id='class' placeholder="請輸入分類名稱"/></h5> <br><br />
                        <h5>作者：<input type="text" name="author" id='author' placeholder="請輸入作者"/></h5> <br><br />
                        <h5>出版日期：<input type="date" name="publication" id='publication' placeholder="請輸入出版日期"/></h5> <br><br>
                        <input type="submit" class="btn btn-warning"  value="新增書籍">&nbsp;&nbsp;    
                    </form>
                    </div>
                    <div class="col-sm-4">
                        <form name="form" method="post" action="delete_collect.php">
                        <h3>刪除書籍</h3><br />
                        <h5>書名：<input type="text" name="delete_book" id='delete_book' placeholder="請輸入刪除書名"/></h5> <br><br>
                        <input type="submit" class="btn btn-danger"  value="刪除書籍"></a>&nbsp;&nbsp;
                    </div>
                </div>
            </div>
        </div>
    <?php include('connect.php');  ?>
    <center>
        <?php 
	        $query = "SELECT * FROM book ";
	        $query_run = mysqli_query( $connection , $query ); 
        ?>
    <div class="container">
        <table class="table table-striped" style="text-align:center;">
            <thead style="text-align:center;">
                <tr style="text-align:center;">
                    <br><br><br>
                    <th>編號</th>
                    <th>借閱狀態</th>
                    <th>借閱者</th>
                    <th>書名</th>
                    <th>分類</th>
                    <th>作者</th>
                    <th>出版日期</th>
                    <th>到館日期</th>
                </tr>
            </thead>

            <tbody>
                <!-- 大括號的上、下半部分 分別用 PHP 拆開 ，這樣中間就可以純用HTML語法-->
                <?php
                    if(mysqli_num_rows($query_run) > 0){
                        foreach($query_run as $row){
                ?>

                    <tr>
                        <td><?php echo $row['bID']; ?></td> 
                        <td><?php echo $row['loan']; ?></td> 
                        <td><?php echo $row['user']; ?></td> 
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['class']; ?></td>
                        <td><?php echo $row['author']; ?></td>
                        <td><?php echo $row['publication_date']; ?></td>
                        <td><?php echo $row['arrival_date']; ?></td>
                    </tr>

                <?php
                    }
                    }
                ?>
            </tbody>
        </table>
    </div>
    </center>
    <div class="container">
        <br><br><br><br><br><br><br><br><p align="right"><a href="manager.php" class="btn btn-primary"  role="button" >返回</a>&nbsp;<a href="logout.php" class="btn btn-secondary"  role="button" >登出</a></p>
    </div>

</body>
</html>
