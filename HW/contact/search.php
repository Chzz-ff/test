<!DOCTYPE html>
<html>    
<head>
<meta charset="utf-8" />
<title>search.php</title>
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
      session_start();  // 啟用交談期
      if (isset($_POST["Search"])) {
         // 建立SQL字串
         $sql = "SELECT * FROM contact ";
         // 檢查是否輸入姓名
         if (chop($_POST["Name"]) != "" )
            $name = "name LIKE '%".$_POST["Name"]."%' ";
         else
            $name = "";
         // 檢查是否輸入電話號碼
         if (chop($_POST["Tel"]) != "" )
            $tel = "tel LIKE '%".$_POST["Tel"]."%' ";
         else
            $tel = "";
         // if條件組合SQL字串
         if ( chop($name) != "" && chop($tel) != "" )
            $sql.= "WHERE ".$name." AND ".$tel;
         elseif ( chop($name) != "" )  // 只有姓名
               $sql .= "WHERE ".$name;
         elseif ( chop($tel) != "" )  // 只有電話號碼
               $sql .= "WHERE ".$tel;
         $sql.= " ORDER BY name";  // 最後加上排序
         $_SESSION["SQL"] = $sql;
         header("Location: contacts.php");  // 轉址
      }
   ?>
   <form action="search.php" method="post">
         <table class="entryTable">
            <tr>
               <th>搜尋姓名:</th>
               <td><input type="text" name="Name" size="10" maxlength="20"/></td>
            </tr>
            <tr>
               <th>搜尋電話:</th>
               <td><input type="text" name="Tel" size="20" maxlength="20"/></td>
            </tr>
            <tr>
               <td colspan="2" align="center">
                  <input type="submit" name="Search" value="搜尋"/>
               </td>
            </tr>
      </table>
   </form>
   <hr/><a href="contacts.php">首頁</a> | <a href="add.php">新增聯絡資料</a> | <a href="search.php">搜尋通訊錄</a>
</center>
</main>

   <footer>
      <?php
         include("../footer.html")
      ?>
   </footer>
</body>

</html>