<?php
try{
  $conn = new PDO('mysql:host=localhost;dbname=mydb','root','');
}
catch(PDOException $e){
  echo "Connection failed: " . $e->getMessage();
}
  // To save some time we are going to create a class to hold the database connection information.
  // As mentioned in the PDF we will define our class using the class keyword followed by the name of our class.
  class Database{
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
    public function create($fname,$lname,$email,$homepage,$password,$description){
      $sql = "INSERT INTO Student (fname, lname, email, homepage, password) VALUES ('$fname', '$lname', '$email', '$homepage', '$password')";
      $res = mysqli_query($this->connection, $sql);
      if($res){
	 		    return true;
		  }
      else{
			    return false;
		  }
    }

      // Fetch single data for edit from customer table
  public function displayRecordById($fname)
  {
    $query = "SELECT * FROM student WHERE fname = '$fname'";
    $result = $this->connection->query($query);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      return $row;
    }else{
      echo "Record not found";
    }
  }

   // Update customer data into customer table
   public function updateRecord($postData)
   {
     $id = $_POST['id'];
     $lname = $_POST['lname'];
     $fname = $_POST['fname'];
     $email = $_POST['email'];
     $homepage = $_POST['homepage'];
     $password = $_POST['password'];
     $description = $_POST['description'];

     if (!empty($lname) && !empty($postData)) {
       $query = "UPDATE student SET fname = '$fname', lname= '$lname', email = '$email', homepage = '$homepage', password = '$password', description = '$description' WHERE id = '$id'";
       $sql = $this->connection->query($query);
       if ($sql==true) {
         header("Location:view.php?msg2=update");
       }else{
         echo "Registration updated failed try again!";
       }
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
  }
  $database = new Database();

?>