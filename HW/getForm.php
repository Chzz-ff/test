<!DOCTYPE html>
<html>
<head>
    <link href="css/style.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="css/navCSS.css" media="all">
    <link rel="stylesheet" href="css/indexCSS.css" media="all">
    <?php
    $error = "";
    $name = "";
    $username = "";
    setcookie("name", "$name", time()+3600);
    setcookie("username", "$username", time()+3600);
    if (isset($_POST['Reg'])) {
        $name     = trim($_POST['Name']);
        $username = trim($_POST['UserName']);
        $pass1    = $_POST['Pass1'];
        $pass2    = $_POST['Pass2'];

        if ($username === "") {
            $error = "帳號欄位空白";
        } else if ($pass1 === "") {
            $error = "密碼欄位空白";
        } else if ($pass1 !== $pass2) {
            $error = "密碼輸入不相同";
        }

        // 沒有錯誤 → 跳到下一頁
        if ($error === "") {
            header("Location: getData.php?Name=$name&UserName=$username&Pass1=$pass1");
            exit;
        }
    }
    ?>
    <meta charset="utf-8" />
    <title>getForm.php</title>
</head>
<body>
    <header id="header" class="clearheader">
    <?php
        include "nav.html";
    ?>
</header>
<main  id="contents">
    <?php if ($error !== ""): ?>
        <div style="color:red">錯誤：<?php echo $error; ?></div>
    <?php endif; ?>

    <form action="getForm.php" method="post">
        <table class="entryTable">
            <tr>
                <th>姓名:</th>
                <td><input type="text" name="Name" value="<?php echo $name; ?>"></td>
            </tr>
            <tr>
                <th>帳號:</th>
                <td><input type="text" name="UserName" value="<?php echo $username; ?>"></td>
            </tr>
            <tr>
                <th>請輸入密碼:</th>
                <td><input type="password" name="Pass1"></td>
            </tr>
            <tr>
                <th>再輸一次密碼:</th>
                <td><input type="password" name="Pass2"></td>
            </tr>
        </table>
        <input type="submit" name="Reg" value="註冊使用者">
    </form>
</main>
</body>
</html>
