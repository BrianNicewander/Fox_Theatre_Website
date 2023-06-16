<?php
require('../database.php');

    // Get user's info
    $query = 'SELECT *
              FROM login';
    $statement = $db->prepare($query);
    $statement->execute();
    $login = $statement->fetchAll();
    $statement->closeCursor();

    session_start();

    //Makes sure the user is logged in
    if (isset($_SESSION['authorized']) && $_SESSION['authorized'] === TRUE) {
        //If the user is authorized
        echo "";
    } else {
        // User is not authorized!
        header('Location: ../login_admin_page.php');
        exit();
    }

     //Makes sure the user is an administrator
     if($_SESSION['level'] == 2){
        //If the user is authorized
        echo "";
    } else {
        // User is not authorized!
         header("Location:redirect_user_page.php");  
    }   
?>

<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Users</title>

    <!-- CSS only -->
    <link rel="stylesheet" type="text/css" href="../css/master_styles.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery (for bootstrap)-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</head>

<!-- the body section -->
<body class="backdrop_parallax">

    <div class="page_old_full_user">
    <?php require('logout_button.php'); ?>
    <br>

    <header><h1>Manage users</h1></header>

     <!-- display a table for user info -->
     <table class = "tableuser">
            <tr>
                <th class = "thuser">ID</th>
                <th class = "thuser">User</th>
                <th class = "thuser">Password</th>
                <th class = "thuser">Level</th>
                <th class = "thuser">Delete user</th>
                <th class = "thuser">Edit user</th>
            </tr>

            <?php foreach ($login as $login) : ?>

            <tr><!--Shows the users info on a table-->
                <td class = "tduser"><?php echo $login['id']; ?></td>
                <td class = "tduser"><?php echo $login['user']; ?></td>
                <td class = "tduser"><?php echo $login['password']; ?></td>
                <td class = "tduser",class="right"><?php echo $login['level']; ?></td>
                <td class = "tduser"><form onsubmit="return confirm('Are you sure you want to delete user')" action="delete_user.php" method="post"><!-- Makes sure you want to delete a user -->
                    <input type="hidden" name="id"
                           value="<?php echo $login['id']; ?>">
                    <input type="submit" value="Delete">
                    </form></td>
                    
                    <!-- Pulls the info for the edit user page based on what edit button you click -->
                    <td class = "tduser"><form action="edit_user_form.php?id=<?php echo $login['id']; ?>" method="post">
                    <input type="hidden" name="id"
                           value="<?php echo $login['id']; ?>">

                            <input type="hidden" name="user"
                           value="<?php echo $login['user']; ?>">

                           <input type="hidden" name="level"
                           value="<?php echo $login['level']; ?>">

                    <input type="submit" value="Edit">
                    </form></td>  
            </tr>
            
            <?php endforeach; ?>
        </table>  
        <br>

        <h3>Add user</h3>

        <!-- bootstrap (pattern is so you can set limits) -->
        <form id="contactfrm" method="post" action="add_user.php">

        <table id="contactForm" cellpadding="0" cellspacing="8">
          <tr>
            <div>
              <input required type="text" name="id" value="" pattern="[0-9]{1,2}" class="form-control" placeholder="Id"/>
          </div>
          </tr>

           <tr>
            <div>
              <input required type="text" name="user" value="" pattern=".{1,20}" class="form-control" placeholder="User"/>
          </div>
          </tr>

          <tr>
            <div>
              <input required type="text" name="password" value="" pattern=".{6,20}" class="form-control" placeholder="Password (at least six characters long)"/>
          </div>
          </tr>

          <tr>
            <div>
              <input required type="text" name="level" value="" pattern="[1-2]{1,1}" class="form-control" placeholder="Level (1 or 2)"/>
          </div>
          </tr>   
          <br>
         <tr>
            <input type="submit" value="Add user">
        </tr>
        <br>
        <br>

        <tr>
        <p><a class ="user" href="index.php" style="color: black;">Manage users home page</a></p> <!-- Takes them to the manage user page -->
        </tr>

        </table>
      </form>   
    </div>
  </body>
</html>
