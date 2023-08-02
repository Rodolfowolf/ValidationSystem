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
    <title>Assignment 2</title>
		<meta charset="utf-8" />
    <link rel="stylesheet" href="Css/style.css">
    </head>
      <body>
        <header>
          <img id=banner src='img/header2.jpeg' alt='Banner'>
          <?php
          require_once('common/menu.php');
		  require_once('common/crud.php');
		  require_once('common/validate.php');
          ?>
          <img id=logo src='img/logo.png' alt='Logo'>
        </header>
        <main>
<?php
	// connection
	require 'common/database.php';
	// variables
	$crud = new crud();
    $validate = new validate();
	$fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $homepage = $_POST['homepage'];
	$password = $_POST['password'];
    $spassword = $_POST['spassword'];
    $description = $_POST['description'];
echo $fname;
	//$msg = $validate->checkEmpty($_POST, array('fname', 'lname', 'email', 'homepage', 'password'));
    $checkEmail = $validate->validEmail($_POST['email']);
    $checkHomepage = $validate->validHomepage($_POST['homepage']);
	// validate inputs
	$ok = true;
	//require 'common/menu.php';
		if (empty($fname)) {
			echo '<p>First name required</p>';
			$ok = false;
		}
		if (empty($lname)) {
			echo '<p>Last name required</p>';
			$ok = false;
		}
		if ((empty($password)) || ($password != $spassword)) {
			echo '<p>Invalid passwords</p>';
			$ok = false;
		}
	// decide if we are saving or not
	if ($ok){
		$password = hash('sha512', $password);
		// set up the sql
		//$sql = "INSERT INTO Student (fname, lname, email, homepage, password, description) VALUES ('$fname', '$lname', '$email', '$homepage', '$password', '$description')";
		//$conn->exec($sql);
		$result = $crud->execute("INSERT INTO Student (fname, lname, email, homepage, password, description) VALUES ('$fname', '$lname', '$email', '$homepage', '$password', '$description')");
        echo "<p>Data added successfuly.</p>";
        //header("Location:view.php?msg2=update");
    	echo '<section class="success-row">';
		echo '<div>';
		echo '<h3>Admin Saved</h3>';
		echo '</div>';
    	echo '</section>';
		//disconnect
		$conn = null;
	}
	?>
	<section class="row success-back-row">
		<div>
			<p>All setup, click the button below to head to the sign in page!</p>
			<a href="signin.php" class="btn btn-primary">Sign In</a>
		</div>
	</section>
		</main>
	  </body>
<?php require 'common/footer.php'; ?>
</html>
<?php
	}
	?>