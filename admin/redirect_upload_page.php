<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <link rel="stylesheet" type="text/css" href="../css/master_styles.css" />
  <link href="https://fonts.googleapis.com/css2?family=Fondamento&family=Homenaje&family=Lato&display=swap" rel="stylesheet" />
  </style>

  <script type="text/javascript">
    /* <![CDATA[ */
    "use strict"

    var count = 15; //seconds in countdown
    function startCountDownPage() {
      var countdown = setInterval(startCountdown, 1000); // this runs the startCountdown every second
    }

    function startCountdown() {
      if (count > 0) { // this checks to see if count is above 0
        document.seconds.counter.value = count; //pulls the counter.value
        count--; // this takes one away from count    
      } else {
        location.href = "javascript:history.go(-1)"; // this send the user the the contact us page
      }

    }
    /* ]]> */
  </script>

</head>

<body class="backdrop_parallax" onload=startCountDownPage()>
  <div class="page_old_full" style="opacity: 100%;">
    <form name="seconds" action="">
      <h3>The picture has been uploaded successfully. You will be redirected back to the edit page in
        <input class="counter" type="text" name="counter" value="15" size="1" />seconds or click the link below
      </h3>
      <h2><a href="javascript:history.go(-1)" title="Return to the previous page" style="color: red;">Back to edit page</a></h2>
    </form>
  </div>
</body>

</html>