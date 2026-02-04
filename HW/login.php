<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/indexCSS.css" media="all">
    <link href="css/style.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="css/navCSS.css" media="all">
    <title>Document</title>
      <?php
        session_start();
        $password = ''; 
        $username = ''; 
        if(isset($_POST["Username"]))
            $username = $_POST["Username"];
        if(isset($_POST["Password"]))
            $password = $_POST["Password"];
        if($username != "" && $password != ""){
            require_once("DB_open.php");

            $sql = "SELECT * FROM students WHERE password='";
            $sql.= $password."' AND username='".$username."'";
            $result = mysqli_query($link, $sql);
            $total_records = mysqli_num_rows($result);

            if($total_records > 0){
                $_SESSION['login_session'] = true;
                $_SESSION['username'] = $username;
                header("Location:../Final/index.php");
            }
            else{
                echo"<center><font color='red'>";
                echo "使用者名稱或密碼錯誤!<br/>";
                echo "</font>";
                $_SESSION["login_session"] = false;
            }
            require_once("DB_close.php");
        } 
    ?>
</head>
<body>
        <header id="header" class="clearheader">
            <?php include "nav.html" ?>
        </header>  
    <main id="contents">
        <form action="login.php" method="post">
            <table class="entryTable">
                <tr>
                    <th>使用者名稱:</th>
                    <td><input type="text" name="Username" size="15" maxlength="10"/></td>
                </tr>
                <tr>
                    <th>使用者密碼:</th>
                    <td><input type="password" name="Password" size="15" maxlength="10"/></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" value="登入網站"></td>
                </tr>
            </table>
        </form>
    </main>

    <footer id="footer">
         <?php include "../HW/footer.html"; ?>
    </footer>

</body>
</html>