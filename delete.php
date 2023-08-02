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

                     $host = "localhost";
                     $username = "root";
                     $password = "";
                     $dbname = "mydb";
                 
                     // creating a connection
                     $con = mysqli_connect($host, $username, $password, $dbname);
                     // to ensure that the connection is made
                     if (!$con)
                     {
                         die("Connection failed!" . mysqli_connect_error());
                     }
                     echo "<form method='post' action='del.php'>";
                     $sql = "SELECT fname FROM student";
                     $result = $con->query($sql);
                     if ($result->num_rows > 0) {
                         // output data of each row
                         //echo "<b>Discussion:</b><textarea rows='10%'>";
                         echo "Choose the user to delete: <select name='fname'>";
                         echo "<option></option>";
                         while($row = $result->fetch_assoc()) {
                          echo "<option>";
                          echo $row["fname"];
                          echo "</option>";
                         }
                       } else {
                         echo "0 results";
                       }
                       echo "</select>";
                       echo "<input type='submit' name='Submit' value='Delete'>";
                       echo "</form>";

                ?>
</main>
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
