<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title><link rel="stylesheet" href="css/indexCSS.css" media="all">
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

        <?php
            require_once("mycontacts_open.inc");
            $id = $_GET["id"];
            $action = $_GET["action"];

        
            switch($action)
            {

                case"update":
                    $sql = "";
                    $word = $_POST["word"];
                    $partOfSpeech = $_POST["partOfSpeech"];
                    $mandrain = $_POST["mandrain"];
                     $sql = "UPDATE contact SET word='".$word."', partOfSpeech='".$partOfSpeech."' , mandrain='".$mandrain."' WHERE id=".$id;
                case"edit":     
                    $sql = "SELECT * FROM vocabulary WHERE id = $id";
                    $result = mysqli_query($link, $sql);
                    $row = mysqli_fetch_array($result);   
                    $word = $row[1];
                    $partOfSpeech = $row[2];
                    $mandrain = $row[3];
                
            }
          
            require_once("mycontacts_close.inc");
        ?>
        <form action="edit.php?action=update&id=<?php$id?>" action="post">
            <table class="entryTable">
                <tr>
                    <th><font>姓名:</font></th>
                    <td><input type="text" value="<?php echo $word?>"></td>
                </tr>
                 <tr>
                    <th><font>詞性:</font></th>
                    <td> 
                             <select name="partOfSpeech">
                                <option value=""  selected disabled hidden><?php echo $partOfSpeech?></option>
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
                    <th><font>中文解釋:</font></th>
                    <td><input type="text" value="<?php echo $mandrain?>"></td>
                </tr>

                 <tr>
                        <td colspan="2" align="center">
                        <input type="submit" value="修改單字"/></td>
                    </tr>
            </table>
        </form>
    </main>

   <footer>
    <?php
        include("../HW/footer.html");
    ?>
</footer>
</body>
</html>