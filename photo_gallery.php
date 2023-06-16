<?php
session_start();
?>

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

  <meta http-equiv="Content-type" content="application/xhtml+xml; charset=iso-8859-1" />

  <!-- head title -->
  <title>The Historic Hutchinson Fox Theatre - Hutchinson, Kansas</title>

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

</head>

<body class="backdrop_parallax">
  <!-- include statement that calls the navigation bar (navigation_bar.php) -->
  <?php require('navigation_bar.php');

  $file_value = basename(__FILE__, '.php');

  ?>
  <!-- gets the navigation bar and put it on the screen -->

  <body>
    <?php require_once('database.php'); ?>
    <section class="page_old_full" style="opacity:100%">
      <?php if (isset($_SESSION['authorized']) && $_SESSION['authorized'] === TRUE) {
        require('logout_button_photo.php');
      }
      ?>
      <?php require("side_page_data/" . $file_value . "_data.php"); ?>
      <div>
        <!-- The text for the memberships page -->
        <div>
          <pre class="text"><?php echo ($page_content) ?><pre>
        </div>
    </div>
    </div>
      <section>
        <div>
          <div>

            <?php
            $sql = 'SELECT * FROM gallery ORDER BY id desc'; //select everything from the database gallery. and puts the newest picture on top.

            $pageStatement = $db->prepare($sql);
            $pageStatement->execute();
            $result = $pageStatement->fetchAll();
            $pageStatement->closeCursor(); ?>

            <table border="0">

              <?php
              $img_full_name = $result[0];
              $count = 0;
              foreach ($result as $image) {
                if ($count % 4 == 0) //makes it where there are 4 photos to a row.
                echo "<tr style='padding: 5px;'>";

                echo "<a href='gallery_photos/images/{$image['img_full_name_gallery']}''<td style='padding: 5px;'><img style='width:23%;height: 170px;' src='gallery_photos/images/{$image['img_full_name_gallery']}' /></td></a>"; //shows the images
                

                if (isset($_SESSION['authorized']) && $_SESSION['authorized'] === TRUE) {  //Checks to see if the user is authorized
                  //Echo if the user is authorized
                  echo '
                    <form action="delete_photo.php" method="post">
                    <input type="hidden" name="img_full_name_gallery" value="'.$image['img_full_name_gallery'].'">
                    <button type="submit" name="submit" >Delete</button>
                    </form>';
                }

                if ($count % 4 == 3)
                  echo '</tr>';
                  $count++; //adds a plus to the count for number of photos in row.
              }
              ?>

            </table>
          </div>
          <br>
          <br>

          <?php
          if (isset($_SESSION['authorized']) && $_SESSION['authorized'] === TRUE) { //Checks to see if the user is authorized

            //Echo if the user is authorized
            echo ' 
              <div class="gallery-upload">
                <form action="gallery_photos/gallery-upload.php" method="post" enctype="multipart/form-data"> <!--passes on images in php  -->
                  <input type="text" name="filename" placeholder="File name"> <!-- the name of the image in the image foler -->
                  <input type="text" name="filetitle" placeholder="Image title"> <!-- the name of the image that the user sees on the screen -->
                  <input type="file" name="file"> <!-- makes the browse button. -->
                  <button type="submit" name="submit">Upload image</button> <!-- button for submitting picture -->
                </form>
              </div>
              <br>
              <br>
              <a href="admin/select_editor.php"><button>Back to select editor</button></a>
              ';
          }
          ?>

        </div>
          <!-- include statement that calls the footer (footer.php) -->
          <?php require('footer.php'); ?>
        </div>
      </section>
    </section>
  </body>
</html>