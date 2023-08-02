<?php
  // To save some time we are going to create a class to hold the database connection information.
  // As mentioned in the PDF we will define our class using the class keyword followed by the name of our class.
  class crud{
    // A private keyword, as the name suggests is the one that can only be accessed from within the class in which it is defined. 
    // All the keywords are by default under the public category unless they are specified as private or protected.
    private $connection;
    //A constructor allows you to initialize an object's properties upon creation of the object. 
    //If you create a __construct() function, 
    //PHP will automatically call this function when you create an object from a class.
    function __construct(){
      // In PHP, $this keyword references the current object of the class. 
      //The $this keyword allows you to access the properties and methods of the current object within the class using the object operator
      $this->connect_db();
    }
    // The public access modifier allows you to access properties and methods from both inside and outside of the class.
    public function connect_db(){
      $this->connection = mysqli_connect('localhost', 'root', '', 'mydb');
      if(mysqli_connect_error()){
        die("Database Connection Failed" . mysqli_connect_error() . mysqli_connect_error());
      }
    }
    public function create($fname,$lname,$email,$homepage,$password){
      $sql = "INSERT INTO Student (fname, lname, email, homepage, password) VALUES ('$fname', '$lname', '$email', '$homepage', '$password')";
      $res = mysqli_query($this->connection, $sql);
      if($res){
	 		    return true;
		  }
      else{
			    return false;
		  }
    }
    public function read($id=null){
		    $sql = "SELECT * FROM Student order by id desc";
		    if($id){
          $sql .= " WHERE id=$id";
        }
 		    $res = mysqli_query($this->connection, $sql);
 		    return $res;
	  }
    public function displayUser($username,$password)
    {
      $query = "SELECT id,count(*) as tot FROM student WHERE username = '$username' AND password = '$password'";
      $result = $this->connection->query($query);
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $count = $row['tot'];
        //check if any matches found
        if ($count == 1){
          echo 'Logged in Successfully.';
          foreach  ($result as $row){
          //access the existing session created automatically by the server
          session_start();
          //take the user's id from the database and store it in a session variable
          $_SESSION['id'] = $row['id'];
          //redirect the user
          Header('Location: ../adm.php');
  }
}
else {
  echo 'Invalid Login';
  header('location:../index.php');
}
$conn = null;
      }else{
        echo "User not found";
      }
    }
    public function execute($query){
      $result = $this->connection->query($query);
      if ($result == false){
      echo 'Error: cannot execute the command';
      return false;
    }else{
      return true;
    }
  }
}
$database = new crud();
?>