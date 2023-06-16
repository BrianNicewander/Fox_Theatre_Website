<?php require_once('database.php');

// Title of menu
$query = 'SELECT * FROM web_content_side
                  WHERE category = "events_films" AND online_status = 1';
$eventsFilmsStatement = $db->prepare($query);
$eventsFilmsStatement->execute();
$eventsInfo = $eventsFilmsStatement->fetchAll();
$eventsFilmsStatement->closeCursor();

$query = 'SELECT * FROM web_content_side
                  WHERE category = "visit" AND online_status = 1';
$visitStatement = $db->prepare($query);
$visitStatement->execute();
$visitInfo = $visitStatement->fetchAll();
$visitStatement->closeCursor();

$query = 'SELECT * FROM web_content_side
                  WHERE category = "support" AND online_status = 1';
$supportStatement = $db->prepare($query);
$supportStatement->execute();
$supportInfo = $supportStatement->fetchAll();
$supportStatement->closeCursor();

$query = 'SELECT * FROM web_content_side
                  WHERE category = "about" AND online_status = 1';
$aboutStatement = $db->prepare($query);
$aboutStatement->execute();
$aboutInfo = $aboutStatement->fetchAll();
$aboutStatement->closeCursor();

$query = 'SELECT * FROM web_content_side
                  WHERE isMain = "1" AND online_status = 1';
$otherStatement = $db->prepare($query);
$otherStatement->execute();
$otherInfo = $otherStatement->fetchAll();
$otherStatement->closeCursor();
?>
<div class="nav">
    <a href="home_page.php">Home</a>
    <div class="drop">
        <!-- Visit -->
        <button class="droplist">Events & Films</button>
        <div class="drop-content">
            <?php foreach ($eventsInfo as $info) :  ?>
                <a href=<?php echo $info['file_name']; ?>><?php echo $info['page_name']; ?></a>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="drop">
        <!-- Visit -->
        <button class="droplist">Visit</button>
        <div class="drop-content">
            <?php foreach ($visitInfo as $info) :  ?>
                <a href=<?php echo $info['file_name']; ?>><?php echo $info['page_name']; ?></a>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- Support -->
    <div class="drop">
        <button class="droplist">Support</button>
        <div class="drop-content">
            <?php foreach ($supportInfo as $info) :  ?>
                <a href=<?php echo $info['file_name']; ?>><?php echo $info['page_name']; ?></a>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- About -->
    <div class="drop">
        <button class="droplist">About</button>
        <div class="drop-content">
            <?php foreach ($aboutInfo as $info) :  ?>
                <a href=<?php echo $info['file_name']; ?>><?php echo $info['page_name']; ?></a>
            <?php endforeach; ?>
        </div>
    </div>
    <?php foreach ($otherInfo as $info) : ?>
        <div class="drop">
            <a href=<?php echo $info['file_name']; ?> class="droplist"><?php echo $info['page_name']; ?></a>
        </div>
    <?php endforeach; ?>
</div>
<!-- End menu bar -->