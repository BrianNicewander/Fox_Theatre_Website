<?php

if (isset($_POST['submit'])) { //checks if the sumbit button was press on the photo_gallery page.

	$newFileName = $_POST['filename']; //gets the data from the file on the photo_gallery page.
	if (empty($newFileName)) {
		$newFileName = "gallery"; //this names the file gallery if the field is left blank.
	} else {
		$newFileName = strtolower(str_replace(" ", "-", $newFileName)); //this takes away spaces and change all letters to lowercase.
	}

	$imageTitle = $_POST['filetitle']; //gets the data from the file on the photo_gallery page.
	if (empty($imageTitle)) { //checks to see if the image title was empty.
		$imageTitle = "gallery"; //this names the file gallery if the field is left blank.
	}

	$file = $_FILES['file'];

	$fileName = $file["name"]; //for error handling.
	$fileType = $file["type"]; //for error handling.
	$fileTempName = $file["tmp_name"]; //for error handling.
	$fileError = $file["error"]; //for error handling.
	$fileSize = $file["size"]; //for error handling.

	$fileExt = explode('.', $fileName); //gets the file name after the dot.
	$fileActualExt = strtolower(end($fileExt)); //sets the file extension to lowercase.

	$allowed = array("jpg", "jpeg", "png", "gif"); //types of file allowed.

	if (in_array($fileActualExt, $allowed)) { //this checks to see if the file extension is one that is allowed above.

		if ($fileError === 0) { //makes sure there is no errors.

			if ($fileSize < 30000000) { //size of file allowed.
				$imageFullName = $newFileName . "." . uniqid("", false) . "." . $fileActualExt; //makes the name of the file unique if the user does not add a file name.

				$imageFullTitle = $imageTitle . "." . uniqid("", false) . "." . $fileActualExt; //makes the name of the file unique if the user does not add a image title.

				$fileDestination = "images/" . $imageFullName; //puts the image in the images folder.
				require_once('../database.php');
				
					require_once('../database.php');
					$sql = 'SELECT * FROM gallery;'; //select everything from the database gallery.
					$pageStatement = $db->prepare($sql);

					$pageStatement->execute();

					$rowCount = $pageStatement->rowCount();

					$result = $pageStatement->fetchAll();
					$pageStatement->closeCursor();
					$setImageOrder = $rowCount + 1; //takes the rowcount and adds one to it.

					$sql = 'INSERT INTO gallery (title_gallery, img_full_name_gallery) VALUES (:title_gallery, :img_full_name_gallery);'; //insert the infor into the database.
					$insertStatement = $db->prepare($sql);

					$insertStatement->bindValue(':title_gallery', $imageFullTitle);
					$insertStatement->bindValue(':img_full_name_gallery', $imageFullName);
					$insertStatement->execute();
					$insertStatement->closeCursor();

					move_uploaded_file($fileTempName, $fileDestination);

					header("Location: ../photo_gallery.php");		
				
			} else {
				echo "Sorry, your file is too large.";
			}
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	} else {
		echo "The file type needs to be a jpg, jpeg, png, or gif";
		exit();
	}
}
