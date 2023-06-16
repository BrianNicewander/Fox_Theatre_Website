<!DOCTYPE html>
<html>

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

  <?php
  $file_value = basename(__FILE__, '.php');
  ?>

  <?php require("side_page_data/" . $file_value . "_data.php"); ?>

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- head title -->
  <title><?php echo ($head_title) ?></title>

  <link rel="stylesheet" type="text/css" href="css/master_styles.css" />
  <link href="https://fonts.googleapis.com/css2?family=Fondamento&family=Homenaje&family=Lato&display=swap" rel="stylesheet" />
</head>

<body class="backdrop_parallax">
  <!-- include statement that calls the navigation bar (navigation_bar.php) -->
  <?php require('navigation_bar.php'); ?>
  <!-- Main content -->
  <div class="page_old_full">


    <!-- The text for tour the fox page -->
    <div>
      <pre class="text"><?php echo ($page_content) ?><pre>
    </div>
      <br />
    <!-- end of main content -->
    
    <!-- include statement that calls the footer (footer.php) -->
    <?php require('footer.php'); ?>
</body>

</html>