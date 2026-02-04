<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link rel="stylesheet" href="css/indexCSS.css" media="all">
    <link href="css/style.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="css/navCSS.css" media="all">
</head>
<body>
    <div id="wrap">

        <header id="header" class="clearheader">
            <?php include "nav.html" ?>
        </header>  
    <center>
        <main id="contents"> 
            <h2>期末作業</h2>
             <?php
                session_start();
                if($_SESSION["login_session"] != true)
                    header("Location: ../HW/login.php");
                echo "歡迎".$_SESSION["username"]."進入網站!<br/>";
                $records_per_page = 5;

                if(isset($_SESSION["page"]))
                    $page = $_SESSION["page"];
                else
                    $page = 1;
                require_once("mycontacts_open.inc");
                if(isset($_SESSION["SQL"]))
                    $sql = $_SESSION["SQL"];
                else
                    $sql = 'SELECT * FROM Vocabulary ORDER BY word';

                $result = mysqli_query($link, $sql);
                $total_fields = mysqli_num_fields($result);
                $total_records = mysqli_num_rows($result);

                $total_pages = ceil($total_records / $records_per_page);
                $offset = ($page - 1) * $records_per_page;
                mysqli_data_seek($result, $offset);
                
                echo "總共有" . $total_records . "個單字<br/>";
                echo "<table class = \"entryTable\"> ";
                echo"<tr><th>編號</th> <th>單字</th> <th>詞性</th> <th>中文解釋</th> <th>功能</th></tr>";
                $j = 1;
                while(($row = mysqli_fetch_array($result, MYSQLI_NUM)) and ($j <= $records_per_page)){
                    echo"<tr>";
                    for($i=0; $i<$total_fields;$i++){
                        echo "<td>".$row[$i]."</td>";
                    }
                   echo "<td>
                        <a href='edit.php?action=edit&id=".$row[0]."'>編輯</a> |
                        <a href='edit.php?action=delete&id=".$row[0]."'>刪除</a>
                    </td>";

                    echo"</tr>";
                    $j ++;
                }
                echo "</table><br>";

                if($page > 1)
                   echo "<a href='index.php?page=".($page -1)."'>上一頁</a>| ";

                for($i=1; $i<=$total_pages; $i++){
                    if($i != $page)
                        echo "<a href='index.php?page=".$i."'>".$i."</a>";
                    else
                        echo $i . " ";
                }

                 if($page < $total_pages)
                   echo "|<a href='index.php?page=".($page + 1)."'>下一頁</a>";
                
                 
                 mysqli_free_result($result); 
                require_once("mycontacts_close.inc");
            ?>
              <hr/><a href="index.php">首頁</a> | <a href="add.php">新增單字</a> | <a href="search.php">搜尋單字</a>
            </center>
        </main>
        <footer id="footer">
            <?php include "../HW/footer.html"; ?>
        </footer>

    </div>
</body>
</html>