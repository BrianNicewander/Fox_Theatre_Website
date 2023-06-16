<!-- Fox Theatre Home Page -->
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-165347947-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-165347947-1');
  </script>

  <?php require("side_page_data/home_data.php"); ?>

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>The Historic Hutchinson Fox Theatre</title>
  <!-- the CSS stylesheet -->
  <link rel="stylesheet" type="text/css" href="css/master_styles.css" />
  <!-- stylesheet for the various fonts (Google Fonts) -->
  <link href="https://fonts.googleapis.com/css?family=Lato|Niconne&display=swap" rel="stylesheet">
  <?php require("side_page_data/home_data.php"); ?>
</head>

<body class="backdrop_parallax">
  <!-- include statement that calls the navigation bar (navigation_bar.php) -->
  <?php require('navigation_bar.php'); ?>

  <!-- Space for the title and photo -->
  <div class="main_title">
    <h1>
      <?php echo ($head_title) ?>
    </h1>
  </div>
  <div class="photo_space "></div>
  <!-- Main Content -->

  <!-- Side area for side panel -->
  <div class="page_old_side">
    <pre class="text">
      <?php echo ($box_side) ?>
    </pre>
  </div>
  <!-- end side panel -->

  <!-- Live Season Title -->
  <div class="page_old_main_logo_and_title">
    <?php echo ($box_one) ?>
  </div>

  <?php require('home_page_slides.php'); ?>

  <!-- calls the javascript for the marquee -->
  <script class="image" src="javascript/marquee.js"></script>

  <!-- Side area for side panel -->
  <div class="page_old_side_mobile">
    <p>
      <?php echo ($box_side) ?>
    </p>
  </div>
  <!-- end side panel -->

  <div class="page_old_main">
    <?php echo ($box_sponsor) ?>
    <br /><br />

    
  <!-- include statement that calls the footer (footer.php) -->
      <?php require('footer.php'); ?>
  </div>
</body>

</html>