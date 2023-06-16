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
<script src="../ckeditor4/ckeditor/ckeditor.js"></script>

<body class="backdrop_parallax">
    <?php require('data/live_season_lineup_data.php'); ?>

    <!-- title and main section -->
    <div class="page_old_admin">
    <?php require('logout_button.php'); ?>
    
     
    <div class="text">
         <h1>Edit <?php echo ($Page_name) ?> Page</h1>
    </div>
    <br />
    <br />

    <form action="upload.php" method="post" enctype="multipart/form-data">
            <h3>Add a Photo</h3>
            <p>Upload a photo here to use in the editor (this adds it to your images folder).</p><br />

            <input type="file" name="fileToUpload" id="fileToUpload"><br />

            <br /><input type="submit" class="btn-success" value="Upload Image" name="submit"><br /><br />
        </form>

        <!-- The form for editing the website -->
        <form method="POST" action="updates/live_season_lineup_update.php">
            
           
            <div class="text">
                <h1><?php echo ($Page_name) ?> Page Text</h1>
            </div>

             <!-- select the page to edit -->
            <textarea name="editor" rows="20" cols="70"><?php echo htmlspecialchars($page_content); ?></textarea><br />
            <script>
                CKEDITOR.replace('editor');
            </script>
            <input type="hidden" value="select" name="action"><br>
            <br /><button class="btn-success">Update</button>
        </form>
        <br /><a href="select_editor.php"><button class="btn-primary">Back</button></a>
    </div>
</body>

</html>