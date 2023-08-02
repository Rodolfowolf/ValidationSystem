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
        </header>
        <main>
    <?php
    require_once('common/crud.php');
    require_once('common/validate.php');
    $crud = new crud();
    $validate = new validate();
    $fname = $_POST['Submit'];
    if(isset($_POST['Submit'])){
      $fname = $_POST['fname'];
			$lname = $_POST['lname'];				
      $email = $_POST['email'];
      $homepage = $_POST['homepage'];
      $username = $_POST['username'];
      $password = $_POST['password'];
      $description = $_POST['description'];
      $image = $_POST[''];

      $msg = $validate->checkEmpty($_POST, array('fname', 'lname', 'email', 'homepage', 'username', 'password'));
      $checkEmail = $validate->validEmail($_POST['email']);
      $checkHomepage = $validate->validHomepage($_POST['homepage']);
      echo "<div>";
      if($msg != null){
        echo '<p>'.$msg.'</p>';
        echo "<a id='button_menu' href='javascript:self.history.back();'> Go Back</a>";
      }elseif(!$checkEmail){
        echo '<p> Please include a valid e-mail</p>';
        echo "<a id='button_menu' href='javascript:self.history.back();'> Go Back</a>";
      }elseif(!$checkHomepage){
        echo '<p> Please include a valid Homepage</p>';
        echo "<a id='button_menu' href='javascript:self.history.back();'> Go Back</a>";
      }else{
        $password = hash('sha512', $password);
        $result = $crud->execute("INSERT INTO Student (fname, lname, email, homepage, username, password, description, image) VALUES ('$fname', '$lname', '$email', '$homepage', '$username', '$password', '$description', '$image')");
        echo "<p>User added successfuly.</p>";
        echo "<a id='button_menu' href='index.php'> Go Back</a>";
      }
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
</html>