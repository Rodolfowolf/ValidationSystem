<?php
session_start();
	if (!isset($_SESSION['id'])) {
		header('location:index.php');
		exit();
	}else{
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Assignment 1</title>
		<meta charset="utf-8" />
    <link rel="stylesheet" href="Css/style.css">
    </head>
        <body>
                <header>
                <img id=banner src='img/header2.jpeg' alt='Banner'>
                <?php
                require_once('common/menu.php');
                ?>
                <img id=logo src='img/logo.png' alt='Logo'>
</header>
<main>

                      <?php

    // Include database file
    require_once('common/database.php');
    require_once('common/crud.php');


    $customerObj = new database();
    $conn = new crud();

    // Edit customer record
    if(isset($_POST['fname']) && !empty($_POST['fname'])) {
    $fname = $_POST['fname'];
    $student = $customerObj->displayRecordById($fname);
    }

    // Update Record in customer table
    if(isset($_POST['update'])) {
    $customerObj->updateRecord($_POST);
    }
    $file=$_POST['file'];


    if(isset($_POST['file'])) {
      if (isset($_FILES['files'])) {
        $dir = 'uploads/';
        $uploadFile = $_FILES['files']['tmp_name'];
        $originalFile = $_FILES['files']['name'];
        $uniqueFileName = uniqid('image_', true) . '_' . $originalFile;
        $destination = $dir . $uniqueFileName;
        $query = "UPDATE student SET image='$destination' WHERE fname='$fname'";
        $statement = $conn->execute($query);
        if (move_uploaded_file($uploadFile, $destination)) {
          $photoUpdated = "Photo Updated";
        } else {
            echo 'Failed to upload the image.';
        }
        } else {
        echo 'No image file was uploaded.';
        }
      }
    ?>
    <div id="divform">
    <h3>Select your photo:</h3>
    <form method='post' action='' enctype='multipart/form-data'>
      <p><input type='file' id='files' name='files'/></p>
      <p><input type="hidden" name="file" value="file"></p>
      <p><input type="hidden" name="fname" value="<?php echo $student['fname'];?>"></p>
      <p><input class="btn btn-dark" type='submit' value='Submit' name='submit'/></p>
       <img id="photo" src="<?php echo $student['image'];?>">
    </form>
    </div>
    <div id="divform">
    
              <form action="up.php" method="post">
                <label for="fname">First name:</label>
                <input type="text" name="fname" value="<?php echo $student['fname']; ?>" required="">
                <label for="lname">Last name:</label>
                <input type="text" name="lname" value="<?php echo $student['lname']; ?>" required="">
                <label for="email">Email:</label>
                <input type="text" name="email" value="<?php echo $student['email']; ?>" required="">
                <label for="homepage">Homepage:</label>
                <input type="text" name="homepage" value="<?php echo $student['homepage']; ?>" required="">
                <label for="password">Password:</label>
                <input type="text" name="password" value="<?php echo $student['password']; ?>" required="">
                <label for="description">Description:</label>
                <textarea name="description" cols='50' rows='5'><?php echo $student['description']; ?></textarea>            
                <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
                <input type="submit" name="update" class="btn btn-primary" style="float:right;" value="Update">
            </form>
    </div>
  </main>
  </body>
  <footer>
            <?php
              require_once('common/footer.php');
            ?>
          </footer>    
        </body>
</html>
<?php
  }
  ?>