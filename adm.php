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
          ?>
          <img id=logo src='img/logo.png' alt='Logo'>
        </header>
        <main>
          
        </main>
      </body>
      <footer>
        <?php
          require_once('common/footer.php');
        ?>
      </footer>    
</html>
<?php
  }
  ?>