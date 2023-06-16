<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Site</title>
    <link rel="stylesheet" type="text/css" href="../css/master_styles.css" />
    <link href="https://fonts.googleapis.com/css2?family=Fondamento&family=Homenaje&family=Lato&display=swap" rel="stylesheet" />

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

    // Title of page
    $query = 'SELECT * FROM web_content_side';
    $pageStatement = $db->prepare($query);
    $pageStatement->execute();
    $pageInfo = $pageStatement->fetchAll();
    $pageStatement->closeCursor();

    $query = 'SELECT * FROM events';
    $eventStatement = $db->prepare($query);
    $eventStatement->execute();
    $eventInfo = $eventStatement->fetchAll();
    $eventStatement->closeCursor();
    ?>

    <!-- title and main section -->
    <div class="page_old_full">
        <?php require('logout_button.php'); ?>

        <h1>Edit Website</h1>
        <p>Edit the Fox Theatre Website here.</p><br />

        <!-- The form for editing the website -->
        <form method="POST">
            <!-- select the page to edit -->
            <h3>Select the page you wish to edit</h3>
            <select name="editor_selector" id=editor>
                <option value='home'>Home Page</option>
                <?php foreach ($pageInfo as $info) :  ?>
                    <option value=<?php echo $info['file_value']; ?>><?php echo $info['page_name']; ?></option>
                <?php endforeach; ?>
            </select>
            <br />
            <input type="hidden" value="select" name="action"><br>
        </form method="POST">
        <br /><button onclick="selectListEventsSide()">Edit</button>
        <script>
            function selectListEventsSide() {
                var list = document.getElementById("editor");
                var choice = list.options[list.selectedIndex].value;

                window.location.href = choice + "_editor.php";
            }
        </script>
        <form method="POST">
            <!-- select the page to edit -->
            <h3>Select the event page you wish to edit</h3>
            <select name="editor_selector" id=editor_events>
                <?php foreach ($eventInfo as $info) :  ?>
                    <option value=<?php echo $info['file_value']; ?>><?php echo $info['event_name']; ?></option>
                <?php endforeach; ?>
            </select>
            <br />
            <input type="hidden" value="select" name="action"><br>
        </form method="POST">
        <br /><button onclick="selectListEvents()">Edit</button>
        <script>
            function selectListEvents() {
                var list = document.getElementById("editor_events");
                var choice = list.options[list.selectedIndex].value;

                window.location.href = choice + "_editor.php";
            }
        </script>
        <!-- select the page to edit -->
        <h3>Add and Delete Pages</h3>
        <a href="add_page.php"><button>Add Webpage</button></a>
        <a href="add_event.php"><button>Add Event Page</button></a>
        <br /><br />
        <a href="delete_page.php"><button>Delete Webpage</button></a>
        <a href="delete_event.php"><button>Delete Event Page</button></a>
        <h3>Photo gallery for adding and deleting pictures</h3>
        <a href="../photo_gallery.php"><button>Edit</button></a>
        <h3>Edit users</h3>
        <a href="index.php"><button>Users</button></a>
    </div>


</body>

</html>