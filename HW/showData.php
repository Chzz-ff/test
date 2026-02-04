<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>KOMA-NATSU Web</title>
    <meta name="keywords" content="貓咪,喵咪,喵星人,貓咪介紹,曬貓">
    <meta name="description" content="介紹我家的貓咪們！還有大量可愛的貓照片。">
    <link rel="stylesheet" href="css/indexCSS.css" media="all">
    <link href="css/style.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="css/navCSS.css" media="all">
    <link href="https://fonts.googleapis.com/css?family=Limelight" rel="stylesheet">
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $name = $_POST["cat-name"];
            $age = $_POST["age"];
            $sex = $_POST["sex"];
            $foods = $_POST["favorite"];
            $photo = $_FILES["photo"];
            $owner = $_POST["name"];
            $email = $_POST["email"];
            $comment = $_POST["comment"];
        }
    ?>
</head>


<body>
<header id="header" class="clearheader">
    <?php
        include "nav.html";
    ?>
</header>
 
<main id="contents">
    <form action="#" method="post">

        <p class="entry-note"><strong><span class="require">*</span>為必填項目。</strong></p>

        <table class="entryTable">
            <caption>貓咪資料</caption>
            <tr>
                <th>貓咪名*</th>
                <td><?php echo $name?></td>
            </tr>
            <tr>
                <th>年齡</th>
                <td>
                   <?php echo $age?>
                </td>
            </tr>
            <tr>
                <th>性別</th>
                <td>
                   <?php echo $sex?>
                </td>
            </tr>
            <tr>
                <th>最愛的食物</th>
                <td>
                    <?php foreach($foods as $food){
                        echo $food . " "    ;
                    }?>
                </td>
            </tr>
            <tr>
                <th>照片</th>
                <td><?php
                     $target = $_FILES['photo']['name'];
                        move_uploaded_file($_FILES['photo']['tmp_name'], $target);
                        echo "<img src='$target'>";;
                ?></td>
            </tr>
        </table>

        <table class="entryTable">
            <caption>飼主資料</caption>
            <tr>
                <th>飼主名</th>
                <td>
                    <?php echo $owner?>
                </td>
            </tr>
            <tr>
                <th>E-Mail</th>
                <td>
                    <?php echo $email?>
                </td>
            </tr>
            <tr>
                <th>留言</th>
                <td><?php echo $comment?></td>
            </tr>
        </table>

        <div class="entryBtn">
            <button><a href="tableForm.php">回上頁</a></button>
        </div>
    </form>
</main>

<footer>
    <?php
        include("footer.html")
    ?>
</footer>

</body>
</html>