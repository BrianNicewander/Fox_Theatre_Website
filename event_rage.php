<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-type" content="application/xhtml+xml; charset=iso-8859-1" />

  <title>Live Season</title>
  <link rel="stylesheet" type="text/css" href="css/master_styles.css" />
  <link href="https://fonts.googleapis.com/css2?family=Fondamento&family=Homenaje&family=Lato&display=swap" rel="stylesheet" />
  <!-- The php file that retrieves data from the database -->
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <meta name="ROBOTS" content="all" />
  <meta name="SEARCH ENGINES" content="Google, Yahoo, WebCrawler, Infoseek, Excite, HotBot, Lycos, MSN" />
  <meta name="UPDATED" content="Monthly" />
  <meta name="DISTRIBUTION" content="Global" />
  <meta name="RATING" content="General" />

  <?php
  require_once('database.php');

  $file_value = basename(__FILE__, '.php');

  // Title of page
  $query = 'SELECT * FROM events
      WHERE file_value = :file_value';
  $eventStatement = $db->prepare($query);
  $eventStatement->bindValue(':file_value', $file_value);
  $eventStatement->execute();
  $eventInfo = $eventStatement->fetch();
  $eventStatement->closeCursor();

  $folder = 'side_page_data/';
  $file_value = $eventInfo['file_value'];
  require($folder . $file_value . '_data.php');
  ?>
</head>

<body class="backdrop_parallax">
  <?php require('navigation_bar.php'); ?>
  <section id="container">
    <div class="page_old_side">
      <?php echo $side_content; ?>
    </div>
    <div class="page_old_main">
      <?php echo $page_content; ?>
      <!-- include statement that calls the footer (footer.php) -->
      <?php require('footer.php'); ?>
    </div>
    <!-- Side area for side panel -->
    <div class="page_old_side_mobile">
      <p>
        <?php echo ($side_content) ?>
      </p>
    </div>
  </section>
  <!-- end container -->
</body>

</html>