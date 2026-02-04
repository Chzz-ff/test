<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>貸款輸入</title>
    <link rel="stylesheet" href="css/indexCSS.css" media="all">
    <link rel="stylesheet" href="css/navCSS.css" media="all">
    <style>
        th{
            text-align:right;
        }
        td{
             text-align:left;
        }
        .num{
            text-align:right;
        }
    </style>
</head>
<body>
    <div id="wrap">
        <header id="header" class="classheader">
        <?php
            include "nav.html";
        ?>
        </header>
        <main id="contents">
        <h2>輸入貸款資料</h2>
        <form method="post" action="load.php">
            <table>
                <tr><th>姓名</th><td><input type="text" name="uname" required></td></tr>
                <tr><th>貸款日期</th><td><input type="date" name="Ldate" value="<?php echo date('Y-m-d');?>"></td></tr>
                <tr><th>貸款金額</th><td><input class="num" type="amount" name="loan" value="5" required>萬元</td></tr>
                <tr><th>年利率</th><td><input class="num" type="decimal" name="rate" value="1.8" required>%</td></tr>
                <tr><th>還款年數</th><td><input class="num" type="number" name="year" value="1" required>年</td></tr>
                <tr><td><input type="submit" value="試算"></td></tr>
            </table>
        </form>
    </main>
     </div> 
</body>
</html>