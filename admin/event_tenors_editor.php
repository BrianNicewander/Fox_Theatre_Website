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

    require_once('../database.php');

    $file_value = basename(__FILE__, '.php');

    $file_value = str_replace("_editor", "", $file_value);

    // Title of page
    $query = 'SELECT * FROM events
                  WHERE file_value = :file_value';
    $eventStatement = $db->prepare($query);

    $eventStatement->bindValue(':file_value', $file_value);

    $eventStatement->execute();
    $eventInfo = $eventStatement->fetch();
    $eventStatement->closeCursor();
    ?>
    <script src="../ckeditor4/ckeditor/ckeditor.js"></script>
</head>

<body class="backdrop_parallax">
    <?php
    $folder = 'data/';
    $file_value = $eventInfo['file_value'];
    require($folder . $file_value . '_data.php'); ?>

    <!-- title and main section -->
    <div class="page_old_admin">
        <?php require('logout_button.php'); ?>

        <div class="text">
            <h1>Edit <?php echo ($eventInfo["event_name"]) ?> Page</h1>
        </div>
        <br />
        <br />


        <!-- This form lets you add a picture to the image folder -->
        <form onsubmit="return confirm('Warning: Anything not updated will be lost!')" action="upload.php" method="post" enctype="multipart/form-data">
            <h3>Add a Photo</h3>
            <p>Upload a photo here to use in the editor (this adds it to your images folder).</p><br />

            <input type="file" name="fileToUpload" id="fileToUpload"><br />

            <br /><input type="submit" class="btn-success" value="Upload Image" name="submit"><br /><br />
        </form>

        <!-- The form for editing the website -->
        <form method="POST" action="updates/<?php echo $eventInfo['file_value'] . '_update.php'; ?>">
            <!-- event details -->
            <div>
                <h3>Edit Event Details</h3>
                <input type=" text" size="50" name="edit_name" value="<?php echo htmlspecialchars($eventInfo["event_name"]) ?>"></input><span>&nbsp;Event Name</span><br />
                <br /><input type="text" name="edit_date" size="50" value="<?php echo htmlspecialchars($eventInfo["event_date"]) ?>"></input><span>&nbsp;Event Date</span><br />
                <br /><input type="text" name="edit_time" size="50" value="<?php echo htmlspecialchars($eventInfo["event_time"]) ?>"></input><span>&nbsp;Event Time</span><br />
                <br /><input type="text" name="event_img_path" size="50" value="<?php echo htmlspecialchars($eventInfo["event_img_path"]) ?>"></input><span>&nbsp;Image Path</span><br /><br />
            </div>

            <div class="text">
                <h1><?php echo ($event_name) ?> Page Text</h1>
            </div>

            <textarea name="editor" rows="20" cols="70"><?php echo htmlspecialchars($eventInfo["page_content"]); ?></textarea><br />
            <script>
                CKEDITOR.plugins.addExternal('image2', '../plugins/image2', 'plugin.js');
                CKEDITOR.replace('editor', {
                    customConfig: '../plugins/custom_config.js'
                });
            </script>
            <div class="text">
                <h1>Side Box Text</h1>
            </div>
            <textarea name="editor2" rows="20" cols="70"><?php echo htmlspecialchars($eventInfo["side_content"]); ?></textarea><br />
            <script>
                CKEDITOR.plugins.addExternal('image2', '../plugins/image2', 'plugin.js');
                CKEDITOR.replace('editor2', {
                    customConfig: '../plugins/custom_config.js'
                });
            </script>
            <div>
                <h3>Online/Offline Status</h3>
                <p>Turn the page online or offline.</p>
                <input type='radio' id='online' name='online_offline' value='online' <?php echo $statusOn; ?>>
                <label for='online'>Online</label><br />
                <input type='radio' id='offline' name='online_offline' value='offline' <?php echo $statusOff; ?>>
                <label for='offline'>Offline</label>
            </div>
            <div>
                <h3>Home Page Slideshow Status</h3>
                <p>Determine whether or not this event appears on the home page slideshow.</p>
                <input type='radio' id='slideshowOn' name='slideshow_status' value='on' <?php echo $slideStatusOn; ?>>
                <label for='Turn On'>Turn On</label><br />
                <input type='radio' id='slidshowOff' name='slideshow_status' value='off' <?php echo $slideStatusOff; ?>>
                <label for='Turn Off'>Turn Off</label>
            </div>
            <input type="hidden" value="select" name="action"><br>
            <br /><button class="btn-success">Update</button>
        </form>
        <br /><a href="select_editor.php"><button class="btn-primary">Back</button></a>

    </div>
</body>

</html>