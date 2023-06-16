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

    // Title of page
    $query = 'SELECT * FROM web_content_side';
    $pageStatement = $db->prepare($query);
    $pageStatement->execute();
    $pageInfo = $pageStatement->fetchAll();
    $pageStatement->closeCursor();
    ?>
    <!-- title and main section -->
    <div class="page_old_full">
        <form method="POST" action="manage/delete_page.php" onsubmit="return confirm('Are you sure you want to delete this page?')">
            <div>
                <h1>Delete a Webpage</h1>
                <h5>Select Page to Delete</h5>
                <select name="editor_selector" id=editor>
                    <?php foreach ($pageInfo as $info) :  ?>
                        <option value=<?php echo $info['file_value']; ?>><?php echo $info['page_name']; ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="hidden" value="select" name="action"><br><br>
                <input type="submit" value="Delete Page"></input>
            </div>
        </form>
        <br /><a href="select_editor.php"><button class="btn-primary">CANCEL</button></a>
    </div>
</body>

</html>