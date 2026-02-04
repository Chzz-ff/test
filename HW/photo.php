<?php
    if  (isset($_POST['gray']) && isset($_POST['sepia'])){

        $photo_file = $_FILES["photo"]["name"];
        $photo_bright = $_POST["bright"] . "%";
        $photo_contrast = $_POST['contrast'] . "%";
        $photo_gray = $_POST['gray'] . "%";
        $photo_sepia = $_POST['sepia'] . "%";
        $photo_invert = $_POST['invert'] . "%";
    }
    else{
        $photo_file = "photol.jpg";
        $photo_bright = "100%";
        $photo_contrast = "100%";
        $photo_gray = "0%";
        $photo_sepia = "0%";
        $photo_invert = "0%";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>影像處理</title>
    <link rel="stylesheet" href="css/photo.css" type="text/css">
    <link rel="stylesheet" href="css/indexCSS.css" media="all">
    <link rel="stylesheet" href="css/navCSS.css" media="all">
    <style>
        img{
            filter: brightness(<?php echo $photo_bright; ?>)
                    contrast(<?php echo $photo_contrast; ?>)
                    grayscale(<?php echo $photo_gray; ?>)
                    sepia(<?php echo $photo_sepia; ?>)
                    invert(<?php echo $photo_invert; ?>)
        }
    </style>
</head>
<body>
    <div id="wrap">
    <header id="header" class="clearheader">
            <?php include "nav.html" ?>
    </header> 
    <main id="contents">
    <div class="card">
        <div class="card_header">
            <?php
                echo"*photo_file:" . $photo_file . "<br>";
                echo"*photo_bright:" . $photo_bright . "<br>";
                echo"*photo_contrast:" . $photo_contrast . "<br>";
                echo"*photo_gray:" . $photo_gray . "<br>";
                echo"*photo_sepia:" . $photo_sepia . "<br>";
                echo"*photo_invert:" . $photo_invert . "<br>";
            ?>
            <img src="images/<?php echo $photo_file ?>" width="100%">
        </div>
        <div class = "card_body">
            <form method="post" action="<?php $_SERVER["PHP_SELF"] ?>" enctype = "multipart/form-data">
                <table>
                    <tr><th>圖片</th><td><input type="file" name="photo" required></td></tr>
                    <tr><th>亮度(~100~)</th><td><input class="text" type="number" name="bright" value="100">%</td></tr>
                    <tr><th>對比(~100~)</th><td><input class="text" type="number" name="contrast" value="100">%</td></tr>
                    <tr><th>灰階(0~100)</th><td><input class="text" type="number" name="gray" value="0">%</td></tr>
                    <tr><th>懷舊(0~100)</th><td><input class="text" type="number" name="sepia" value="0">%</td></tr>
                    <tr><th>負片(0~100)</th><td><input class="text" type="number" name="invert" value="0">%</td></tr>
                    <tr><th></th><td><input type="submit" value="送出"></td></tr>
                </table>
            </form>
        </div>
    </div>
    <main/>
    <footer id="footer">
            <?php include "footer.html"; ?>
    </footer>
    </div>
</body>
</html>