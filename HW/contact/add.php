<!DOCTYPE html>
<html>    
<head>
<meta charset="utf-8" />
<title>add.php</title>
<link rel="stylesheet" href="../css/indexCSS.css" media="all">
    <link href="../css/style.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="../css/navCSS.css" media="all">
</head>
<body>
    <header id="header" class="clearheader">
      <?php
         include "nav.html";
      ?>
   </header>
<main id="contents">
<center>
<?php
 $error = "";
// 取得欄位資料
if($_SERVER["REQUEST_METHOD"] == "POST"){
   if (isset($_POST["Name"]) && isset($_POST["Tel"]) ) {
      $name = $_POST["Name"];
      $tel = $_POST["Tel"];
      // 檢查是否有輸入欄位資料
      if ($name != "" && $tel != "") {
         require_once("mycontacts_open.inc");
         // 建立SQL字串
         $sql = "INSERT INTO contact (name, tel) values('";
         $sql.= $name."', '".$tel."')";        
         if ( mysqli_query($link, $sql) ) { // 執行SQL指令
            echo "<font color=red>新增聯絡資料成功!";
            echo "</font><br/>";
         }
         require_once("mycontacts_close.inc");
      }
      else if($_POST["Name"] == ''){
         $error = "名字不能為空";
      }
      else if($_POST["Tel"] == ''){
         $error = "電話不能為空";
      }
   }
   
}

?>
<h2 style="color:red"><?php echo $error?></h2>
<form action="add.php" method="post">
   <table class="entryTable">
      <tr><th><font size="2">姓名: </font></th>
         <td><input type="text" name="Name" size="20" maxlength="10"/></td>
      </tr>

      <tr><th><font size="2">電話: </font></th>
         <td><input type="text" name="Tel" size="20" maxlength="20"/></td>
      </tr>

      <tr>
         <td colspan="2" align="center">
         <input type="submit" value="新增聯絡資料"/></td>
      </tr>
   </table>
</form>
<hr/><a href="contacts.php">首頁</a> | <a href="add.php">新增聯絡資料</a> | <a href="search.php">搜尋通訊錄</a>
</center>
<main/>
<footer>
    <?php
        include("../footer.html")
    ?>
</footer>
</body>
</html>