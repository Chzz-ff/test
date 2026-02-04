<?php
    $link = @mysqli_connect("127.0.0.1", "root", "")
            or die("無法開啟MySQL資料庫連接!<br/>");
        mysqli_select_db($link, "mydb");
        mysqli_set_charset($link, "utf8mb4");
?>