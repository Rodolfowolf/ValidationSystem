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
          <img id=logo src='img/logo.png' alt='Logo'>
        </header>
        <main>
            <table>
              <tr>
                <td>
                <div id="newuser">
                <form method="post" action='add.php'>
                    <h3>Don't have an account, then sign up below!</h3>
                    <fieldset>
                    <legend>Personal Data</legend>
                    <label for="input1">First Name</label>
                    <input type="text" name="fname" id="input1" placeholder="First name" >
                    <label for="input1">Last Name</label>
                    <input type="text" name="lname" id="input2" placeholder="Last name" >
                    <label for="input1">Email</label>
                    <input type="email" name="email" id="input3" placeholder="Email" >
                    <label for="input1">Homepage URL</label>
                    <input type="text" name="homepage" id="input4" placeholder="URL http://" >
                    </fieldset>
                    <fieldset>
                    <legend>User Data</legend>
                    <label for="input1">Username</label>
                    <input type="text" name="username" id="input5">
                    <label for="input1">Record password</label>
                    <input type="password" name="password" id="input6">
                    <label for="input1">Security password</label>
                    <input type="password" name="spassword" id="input7">
                    <label for="input1">Description</label>
                    <textarea name="description" cols="50" rows="5"></textarea>
                    <input type="submit" name="Submit" value="Register" />
                    </fieldset>
                </form>
                </div>
              <td>
              <div id="user">
              <h3>Already have an account, then sign in below!</h3>
              <form method="post" action="common/validate.php">
                <fieldset>
                <legend>New user</legend>
        	      <p><input class="form-control" name="username" type="text" placeholder="Username" required /></p>
        	      <p><input class="form-control" name="password" type="password" placeholder="Password" required /></p>
                <p><input type="hidden" name="login" value="login"></p>
                <input class="btn btn-light" type="submit" value="Login" />
                </fieldset>
              </form>
              </div>
</tr>
</table>
              </div>

                <?php
                    require_once('common/database.php');
                        if(isset($_POST) & !empty($_POST)){
                            $fname = $_POST['fname'];
                            $lname = $_POST['lname'];
                            $email = $_POST['email'];
                            $homepage = $_POST['password'];
                            $spassword = $_POST['spassword'];
                            $description = $_POST['description'];
                            $res   = $database->create($fname, $lname, $email, $homepage, $password, $description);
                            if($res){
                                echo "<p>Successfully inserted data</p>";
                            }else{
                                echo "<p>Failed to insert data</p>";
                            }
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