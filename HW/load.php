<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>貸款試算</title>
     <link rel="stylesheet" href="css/indexCSS.css" media="all">
    <link rel="stylesheet" href="css/navCSS.css" media="all">
    <style>
        div.welcome{color:green}
        div.error{color:red}
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
    <?php
        if(!$_POST['uname'] || !$_POST['loan'] || !$_POST['rate'] || !$_POST['year']){
            echo"<div class='error'>輸入資料不完整，無法試算!</div>";
        }
        else{
            $username = $_POST['uname'];
            $loanDate = date('Y-m-d',strtotime($_POST['Ldate']));
            $loanAmount = $_POST['loan']*10000;
            $loanRate = $_POST['rate'];
            $loanYear = $_POST['year'];

            $str = $loanDate."+".$loanYear."years";
            $endDate = date('Y-m-d',strtotime($str));

            $muliRate = (1+($loanRate/100))**$loanYear;
            $payment  = $loanAmount * $muliRate;
            echo "<p>$username 會員你好，您的貸款結果如下: </p>";
            
            echo "<ul>";         
            echo "<li>貸款期間:".$loanDate."~";
            echo "<li>貸款金額:".$loanAmount."元";
            echo "<li>年利率:".$loanRate."%";
            echo "<li>".$loanYear."年後應還款:".$payment."元";
            echo "</ul>";
        }
    ?>
     </main>
</body>
</html>