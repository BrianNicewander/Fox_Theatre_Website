<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Site</title>
    <link rel="stylesheet" type="text/css" href="../css/master_styles.css" />
    <link href="https://fonts.googleapis.com/css2?family=Fondamento&family=Homenaje&family=Lato&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <?php
    session_start();

    if (isset($_SESSION['authorized']) && $_SESSION['authorized'] === TRUE) {
        //If the user is authorized
        echo "";
    } else {
        // User is not authorized!
        header('Location: ../login_page.php');
        exit();
    }
    ?>

</head>

<body class="backdrop_parallax">
    <?php
    // data for side pages

    require_once('../database.php');
    ?>

    <!-- title and main section -->
    <div class="page_old_full">
        <form method="POST" action="manage/create_event.php">
            <div>
                <h1>Create a New Event</h1>
                <p>This can be changed later.</p>
                <h5>Event Name</h5>
                <input name="event_name" type="text"></input><br><br>
                <h5>Event Date</h5>
                <input name="event_date" type="text"></input><br><br>
                <h5>Event Time</h5>
                <input name="event_time" type="text"></input><br><br>
                <h5>Image Path (ex. images/event.jpg)</h5>
                <input name="event_img_path" type="text"></input><br><br><br>

                <input type="hidden" value="select" name="action"><br>
                <input type="submit" value="Create Page"></input>

                <br><br>
                <h3><em>NOTE: New pages are set to <strong>offline</strong> by default. Add images after page has been created in the editor.</em></h3>

            </div>
        </form>
        <br /><a href="select_editor.php"><button class="btn-primary">CANCEL</button></a>
    </div>
</body>

</html>