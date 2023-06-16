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
</head>

<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<body class="backdrop_parallax">
  <!-- include statement that calls the navigation bar (navigation_bar.php) -->
  <?php require('navigation_bar.php'); ?>

  <section class="page_old_full" style="opacity: 100%;">

    <div>
      <pre class="text"><?php echo ($page_content) ?><pre>
    </div>
              <!-- The Contact Form -->
      <form id="contactfrm" method="post" action="contact_data.php">
        <table id="contactForm" cellpadding="0" cellspacing="8">

          <tr>
            <div class="form-group">
              <input required type="text" name="first_name" value="" pattern="[A-Za-z]{1,50}" class="form-control" placeholder="First Name">
          </div>
          </tr>

           <tr>
            <div class="form-group">
              <input required type="text" name="Last_name" value="" pattern="[A-Za-z]{1,50}" class="form-control" placeholder="Last Name">
          </div>
          </tr>

          <tr>
            <div class="form-group">
              <input required type="text" name="Address" value="" pattern="[A-Za-z0-9 ]{1,255}" class="form-control" placeholder="Address">
          </div>
          </tr>

          <tr>
            <div class="form-group">
              <input required type="text" name="City" value="" pattern="[A-Za-z]{1,50}" class="form-control" placeholder="City">
          </div>
          </tr>

          <tr>
            <div class="form-group">
              <input required type="text" name="State" value="" pattern="[A-Za-z]{2}" class="form-control" placeholder="State">
          </div>
          </tr>

          <tr>
            <div class="form-group">
              <input required type="text" name="Zip code" value="" pattern="[0-9]{5}" class="form-control" placeholder="Zip code">
          </div>
          </tr>

          <tr>
            <div class="form-group">
              <input required type="text" name="Home Phone" value="" pattern="[0-9-()]{1,20}" class="form-control" placeholder="Home Phone">
          </div>
          </tr>

           <tr>
            <div class="form-group">
              <input type="text" name="Buesiness Phone" value="" pattern="[0-9-()]{0,20}" class="form-control" placeholder="Business Phone">
          </div>
          </tr>

          <tr>
            <div class="form-group">
              <input required type="email" name="email" id="email" value="" class="form-control" placeholder="Email-address">
         </div>
          </tr>

           <tr>
            <div class="form-group">
              <input required  onchange="validateEmail();" type="email" name="email_retype" id="email_retype" value="" class="form-control" placeholder="Re-type Email-address">
             <p id="emailError" class="errorMsg"></p>
         </div>
          </tr>

        <tr>
          <div class="form-group">
            <label>How Do You Prefer To Be Contacted?</label>
               <select class="form-control" name="contact_preference" id="contact_preference">
                <option value="Email">Email</option>
                <option value="Home Phone">Home Phone</option>
                <option value="Business Phone">Business Phone</option>
                <option value="No Contact">FYI only, no contact is needed</option>
              </select>
          </div>
        </tr>

          <tr>
            <div class="form-group">
            <label>Select A Subject Line For Your Message:</label>
              <select class="form-control" name="Subject" id="subject">
                <option value="Tickets">Tickets</option>
                <option value="SpecialEvents">Special Events</option>
                <option value="Rental">Rental</option>
                <option value="Information">Information</option>
                <option value="FYI">FYI</option>
              </select>
            </div>
           </tr>

       <tr>
             <div class="form-group">
             <label for="exampleFormControlTextarea1">Send Us A Message:</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          </tr>
          <br />
          <tr>
            <td></td>
            <input type="hidden" name="action" value="process_data">
            <input type="submit" id="submitBtn" value="Submit" class="btn btn-dark btn-lg">
          </tr>
        </table>
      </form>
      <br />

     <!-- include statement that calls the footer (footer.php) -->
    <?php require('footer.php'); ?>
    
    </section>
    <script src ="javascript/validateEmail.js"></script>
  </body>
</html>