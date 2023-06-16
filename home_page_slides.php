<!-- Slideshow of Events -->
<?php
$query = 'SELECT * FROM events
                    WHERE slideshow_status = 1';
$eventsFilmsStatement = $db->prepare($query);
$eventsFilmsStatement->execute();
$eventsInfo = $eventsFilmsStatement->fetchAll();
$eventsFilmsStatement->closeCursor();
?>
<div class="page_old_marquee w3-content w3-display-container">
    <!-- event slideshow -->
    <?php foreach ($eventsInfo as $info) :  ?>
        <div class="mySlides">
            <h1 class="center" id="event_title"><?php echo $info['event_name'] ?></h1>
            <h2 class="center" id="event_date"><?php echo $info['event_date'] ?></h2>
            <h2 class="center" id="event_time"><?php echo $info['event_time'] ?></h2>
           <a href=<?php echo $info['file_value'] . '.php'; ?>><img class="center_image_small" src=<?php echo $info['event_img_path']; ?> /></a>
        </div>
    <?php endforeach; ?>
    <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">
        &#10094;
    </button>
    <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">
        &#10095;
    </button>
</div>