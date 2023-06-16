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
        header('Location: ../login_event.php');
        exit();
    }
    ?>

</head>

<body class="backdrop_parallax">
    <?php
    // data for side events

    require_once('../database.php');

    // Title of event
    $query = 'SELECT * FROM events';
    $eventStatement = $db->prepare($query);
    $eventStatement->execute();
    $eventInfo = $eventStatement->fetchAll();
    $eventStatement->closeCursor();
    ?>
    <!-- title and main section -->
    <div class="page_old_full">
        <form method="POST" action="manage/delete_event.php" onsubmit="return confirm('Are you sure you want to delete this event?')">
            <div>
                <h1>Delete an Event Page</h1>
                <h5>Select Event to Delete</h5>
                <select name="editor_selector" id=editor>
                    <?php foreach ($eventInfo as $info) :  ?>
                        <option value=<?php echo $info['file_value']; ?>><?php echo $info['event_name']; ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="hidden" value="select" name="action"><br><br>
                <input type="submit" value="Delete event"></input>
            </div>
        </form>
        <br /><a href="select_editor.php"><button class="btn-primary">CANCEL</button></a>
    </div>
</body>

</html>