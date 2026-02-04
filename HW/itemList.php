<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Jays ALCS lineup</title>
    <link rel="stylesheet" href="css/indexCSS.css" media="all">
    <link rel="stylesheet" href="css/navCSS.css" media="all">
    <link href="css/style.css" rel="stylesheet" media="all">
    <link href="css/lineup.css" rel="stylesheet" media="all">
    <?php
        function printPlayerCard($lineup, $imgName, $playerName, $position, $num){
            echo '<div class="player-card">';
            echo '  <div class="player-image-container">';
            echo '<img src="images/'.$imgName.'" alt="'.$playerName.'" class="player-image">';
            echo '</div>';
            echo '<div class="player-info">';
            echo '<h3 class="player-name">'.$playerName.'</h3>';
            echo '<div class="player-details">';
            echo '<span class="player-lineup">'.$lineup.'</span>';
            echo '<span class="player-position">'.$position.'</span>';
            echo '<span class="player-number">'.$num.'</span>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    ?>
</head>
<body>
    <div id="wrap">
        <header id="header">
            <?php include "nav.html"; ?>
        </header>
        <main id="contents" class="clearheader">
            <div class="lineup-container">
                <h2 class="lineup-title">Blue Jays ALCS lineup</h2>
                <div class="players-grid">
                   <?php
                    require_once("DB_open.php");

                    $records_per_page = 3;
                    $page = isset($_GET["page"]) ? intval($_GET["page"]) : 1;
                    $offset = ($page - 1) * $records_per_page;

                    $total_sql = "SELECT COUNT(*) AS total FROM players";
                    $total_result = mysqli_query($link, $total_sql);
                    $total_row = mysqli_fetch_assoc($total_result);
                    $total_records = $total_row['total'];
                    $total_pages = ceil($total_records / $records_per_page);

                    $sql = "SELECT * FROM players ORDER BY lineup LIMIT $records_per_page OFFSET $offset";
                    $result = mysqli_query($link, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        printPlayerCard(
                            $row['lineup'],
                            $row['img_name'],
                            $row['player_name'],
                            $row['position'],
                            $row['number']
                        );
                    }

                    mysqli_free_result($result);
                    require_once("DB_close.php");
                    ?>
                </div>

                <!-- 分頁區塊移出 grid -->
                <div class="pagination">
                    <?php
                    if ($page > 1)
                        echo "<a href='itemList.php?page=".($page-1)."' class='page-btn'>上一頁</a>";
                    for ($i = 1; $i <= $total_pages; $i++) {
                        if ($i != $page)
                            echo "<a href='itemList.php?page=$i' class='page-btn'>$i</a>";
                        else
                            echo "<span class='page-btn current'>$i</span>";
                    }
                    if ($page < $total_pages)
                        echo "<a href='itemList.php?page=".($page+1)."' class='page-btn'>下一頁</a>";
                    ?>
                </div>
            </div>
        </main>
        <footer>
            <?php include("footer.html"); ?>
        </footer>
    </div>
</body>
</html>
