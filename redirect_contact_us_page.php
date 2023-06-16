<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link rel="stylesheet" type="text/css" href="css/master_styles.css" />
  <link href="https://fonts.googleapis.com/css2?family=Fondamento&family=Homenaje&family=Lato&display=swap" rel="stylesheet" />
  </style>

  <script type="text/javascript">
  /* <![CDATA[ */
     "use strict"

    var count = 15;
    function startAdPage(){
    var countdown = setInterval(startCountdown, 1000); // this runs the startCountdown every second
    }
    
    function startCountdown(){
    if (count > 0){ // this checks to see if count is above 0
      document.seconds.counter.value = count; //pulls the counter.value
      count--; // this takes one away from count    
    } else{
      location.href="contact_us.php"; // this send the user the the contact us page
    }
    
  }
  /* ]]> */
  </script>
</head>

<body class="backdrop_parallax" onload=startAdPage()>
    <div class="page_old_full" style="opacity: 100%;">
      <form name="seconds" action="">
      <h3>Your email has been sent! Thank you for contacting us. You will be redirected back to the contact us page in <input class="counter" type="text" name="counter" value="15" size="1"/>seconds or click the link below</h3>
  <h2><a href="contact_us.php" style="color: red;">Contact us page</a></h2>
  </form>
    </div>

  </body>
</html>
