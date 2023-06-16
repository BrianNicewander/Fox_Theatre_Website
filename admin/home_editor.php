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

    $query = 'SELECT * FROM events';
    $eventsFilmsStatement = $db->prepare($query);
    $eventsFilmsStatement->execute();
    $eventsInfo = $eventsFilmsStatement->fetchAll();
    $eventsFilmsStatement->closeCursor();

    ?>

    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: white;
        }
    </style>
</head>
<script src="../ckeditor4/ckeditor/ckeditor.js"></script>

<body class="backdrop_parallax">

    <?php require('data/home_data.php'); ?>

    <!-- title and main section -->
    <div class="page_old_full">
        <?php require('logout_button.php'); ?>

        <div class="text">
            <h1>Edit Home Page</h1>
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
        <form method="POST" action="updates/home_update.php">
            <!-- select the page to edit -->

            <div class="text">
                <h1>Edit First Main Box Content</h1>
            </div>

            <textarea name="editor" rows="20" cols="70"><?php echo htmlspecialchars($box_one); ?></textarea><br />
            <script>
                CKEDITOR.replace('editor');
            </script>
            <div class="text">
                <h1>Edit Sponsor Box</h1>
            </div>
            <textarea name="editor2" rows="20" cols="70"><?php echo htmlspecialchars($box_sponsor); ?></textarea><br />
            <script>
                CKEDITOR.plugins.addExternal('image2', '../plugins/image2', 'plugin.js');
                CKEDITOR.replace('editor2', {
                    customConfig: '../plugins/custom_config.js'
                });
            </script>
            <div class="text">
                <h1>Edit Side Box</h1>
            </div>
            <textarea name="editor3" rows="20" cols="70"><?php echo htmlspecialchars($box_side); ?></textarea><br />
            <script>
                CKEDITOR.plugins.addExternal('image2', '../plugins/image2', 'plugin.js');
                CKEDITOR.replace('editor3', {
                    customConfig: '../plugins/custom_config.js'
                });
            </script>
            <input type="hidden" value="select" name="action"><br>
            <br /><button class="btn-success">Update</button>
        </form>
        <br /><a href="select_editor.php"><button class="btn-primary">Back</button></a>
    </div>
</body>

</html>