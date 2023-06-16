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

  <?php require("side_page_data/conditions_of_sale_data.php"); ?>

  <meta http-equiv="Content-type" content="application/xhtml+xml; charset=iso-8859-1" />

  <!-- head title -->
  <title><?php echo ($head_title) ?></title>

  <link rel="stylesheet" type="text/css" href="css/master_styles.css" />
  <link href="https://fonts.googleapis.com/css2?family=Fondamento&family=Homenaje&family=Lato&display=swap" rel="stylesheet" />

  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <meta name="ROBOTS" content="all" />
  <meta name="SEARCH ENGINES" content="Google, Yahoo, WebCrawler, Infoseek, Excite, HotBot, Lycos, MSN" />
  <meta name="UPDATED" content="Monthly" />
  <meta name="DISTRIBUTION" content="Global" />
  <meta name="RATING" content="General" />
  <?php require("side_page_data/conditions_of_sale_data.php"); ?>
</head>

<body class="backdrop_parallax">
  <!-- include statement that calls the navigation bar (navigation_bar.php) -->
  <?php require('navigation_bar.php'); ?>

  <body>
    <section class="page_old_full" style="opacity: 100%;">

      <!-- The text for the conditions of sale page -->
      <div>
      <pre class="text"><?php echo ($page_content) ?><pre>
    </div>

    <!-- include statement that calls the footer (footer.php) -->
    <?php require('footer.php'); ?>
    
    </section>
  </body>
</html>