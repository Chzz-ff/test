<!DOCTYPE html>
<html>    
<head>
<meta charset="utf-8" />
<title>add.php</title>
<link rel="stylesheet" href="css/indexCSS.css" media="all">
    <link href="css/style.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="css/navCSS.css" media="all">
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
                $error = '';
                if($_SERVER["REQUEST_METHOD"] == "POST")
                {
                    if(isset($_POST["word"]) && isset($_POST["mandarin"]) && isset($_POST["partOfSpeech"]))
                    {
                        $word = $_POST["word"];
                        $partOfSpeech = $_POST["partOfSpeech"];
                        $mandarin = $_POST["mandarin"];
                        if($word != '' && $partOfSpeech != '' && $mandarin != '')
                        {
                            require_once("mycontacts_open.inc");
                            $sql = "INSERT INTO Vocabulary (word, partOfSpeech, mandarin) VALUES ('$word', '$partOfSpeech', '$mandarin')";
                            if(mysqli_query($link, $sql)){
                                echo "<font color=red>新增資料成功!";
                                echo "</font><br/>";
                            }
                            require_once("mycontacts_close.inc");
                        }
                        elseif($word == '')
                            $error = "單字不能為空";
                        elseif($partOfSpeech == '')
                            $error = "詞性不能為空";
                        elseif($mandarin == '')
                            $error = "中文解釋不能為空";
                    }
                }
            ?>
            <h2 style="color:red"><?php echo $error?></h2>
            <form action="add.php" method="post">
                <table class="entryTable">
                    <tr>
                        <th><font size="2">英文單字：</font></th>
                        <td><input name="word" type="text"></td>
                    </tr>
                    <tr>
                        <th><font size="2">詞性：</font></th>
                        <td>
                             <select name="partOfSpeech">
                                <option value="Noun">Noun</option>
                                <option value="Verb">Verb</option>
                                <option value="Adjective">Adjective</option>
                                <option value="Adverb">Adverb</option>
                                <option value="Pronoun">Pronoun</option>
                                <option value="Preposition">Preposition</option>
                                <option value="Conjunction">Conjunction</option>
                                <option value="Interjection">Interjection</option>
                            </select> 
                        </td>
                    </tr>
                     <tr>
                        <th><font size="2">中文解釋：</font></th>
                        <td><input name="mandarin" type="text"></td>
                    </tr>
                   <tr>
                        <td colspan="2" align="center">
                        <input type="submit" value="新增單字"/></td>
                    </tr>
                </table>
            </form>
            <hr/><a href="index.php">首頁</a> | <a href="add.php">新增聯絡資料</a> | <a href="search.php">搜尋通訊錄</a>
        </center>
    </main>
<footer>
    <?php
        include("../HW/footer.html");
    ?>
</footer>
</body>
</html>