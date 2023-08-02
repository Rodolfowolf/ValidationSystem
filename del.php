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
    require_once('common/crud.php');

    $crud = new crud();
    $fname = $_POST['fname'];
    if(isset($_POST['Submit'])){
      $fname = $_POST['fname'];

        $result = $crud->execute("DELETE FROM student WHERE fname='$fname'");
        echo "<p>User removed successfuly.</p>";
        header("Location:view.php?msg2=update");
        //echo "<a id='button' href='view.php'>View Result</a>";
        echo "</div>";
    }
     ?>
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