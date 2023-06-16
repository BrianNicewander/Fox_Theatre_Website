<?php
	 include('database.php');
	
	 $img_full_name_gallery = filter_input(INPUT_POST, 'img_full_name_gallery');

	// Delete the users from the database
	if ($img_full_name_gallery == true) {
		$query = 'DELETE FROM gallery
				WHERE img_full_name_gallery = :img_full_name_gallery';
		$statement = $db->prepare($query);
		$statement->bindValue(':img_full_name_gallery', $img_full_name_gallery);
		$success = $statement->execute();
		$statement->closeCursor(); 
		
		//Deletes the photo from the images folder
		unlink("gallery_photos/images/".$img_full_name_gallery);
	}

	// Display the user page
	include('photo_gallery.php');
	
?>