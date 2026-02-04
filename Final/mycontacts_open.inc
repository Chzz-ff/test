
<?php
// 建立MySQL的資料庫連接
$link = mysqli_connect("localhost", "root", "") 
        or die("無法開啟MySQL資料庫連接!<br/>");
mysqli_select_db($link, "mydb");  // 選擇mycontacts資料庫
?>