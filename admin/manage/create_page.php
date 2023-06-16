<?php
require_once('../../database.php');

if (isset($_POST['action'])) {
    $page_name = filter_input(INPUT_POST, 'page_name');
    $category = strtolower(filter_input(INPUT_POST, 'category'));
    $menuAdd = filter_input(INPUT_POST, 'menuAdd');

    if ($menuAdd == 'checked') {
        $isMain = 1;
    };
}

//preset info
$head_title = "The Historic Hutchinson Fox Theatre - Hutchinson, Kansas";
$page_content = "";
$online_status = 0;
$file_value = preg_replace('/\s+/', '_', $page_name);
$file_name = $file_value . ".php";

//create the update, data (two places), editors, main page, 

// query to run the update and set the new values
$insert_query = 'INSERT INTO web_content_side (head_title, page_content, page_name, category, file_value, file_name, online_status, isMain)
                    VALUES (:head_title, :page_content, :page_name, :category, :file_value, :file_name, :online_status, :isMain);';
$createPageRow = $db->prepare($insert_query);

// bind all the values to the variables
$createPageRow->bindValue(':head_title', $head_title);
$createPageRow->bindValue(':page_content', $page_content);
$createPageRow->bindValue(':page_name', $page_name);
$createPageRow->bindValue(':category', $category);
$createPageRow->bindValue(':file_value', $file_value);
$createPageRow->bindValue(':file_name', $file_name);
$createPageRow->bindValue(':online_status', $online_status);
$createPageRow->bindValue(':isMain', $isMain);


// execute statement and close
$createPageRow->execute();
$createPageRow->closeCursor();

// copy from templates
copy("../templates/tem_data.php", "../data/" . $file_value . "_data.php");
copy("../templates/tem_side_data.php", "../../side_page_data/" . $file_value . "_data.php");
copy("../templates/tem_editor.php", "../" . $file_value . "_editor.php");
copy("../templates/tem_update.php", "../updates/" . $file_value . "_update.php");
copy("../templates/tem_page.php", "../../" . $file_value . ".php");

//redirect page
header("Location: redirect_page_success.php");
