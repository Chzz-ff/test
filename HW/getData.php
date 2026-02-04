<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>getData.php</title>
    <link href="css/style.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="css/navCSS.css" media="all">
    <link rel="stylesheet" href="css/indexCSS.css" media="all">
</head>
<body>
    <header id="header" class="clearheader">
    <?php
        include "nav.html";
    ?>
</header>
<main id="contents">
    <?php
    if (isset($_GET['Name'], $_GET['UserName'], $_GET['Pass1'])) {
        echo "<h2>使用者註冊成功！</h2>";
        echo "姓名: " . htmlspecialchars($_GET['Name']) . "<br/>";
        echo "帳號: " . htmlspecialchars($_GET['UserName']) . "<br/>";
        echo "密碼 (未加密): " . htmlspecialchars($_GET['Pass1']) . "<br/>";
    } else {
        echo "未從正確的表單提交資料。";
    }
    ?>
</main>
</body>
</html>
