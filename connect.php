<?php include "db.php";

global $username;
global $password;

function createRows(){
if(isset($_POST['submit'])){
    global $conn;
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    
if($conn->connect_error){
    die('Connection Failed : '. $conn->connect_error);
}else {
    $stmt = $conn->prepare("insert into registration(name,email,password) values(?,?,?)");
    $stmt->bind_param("sss",$name,$email,$password);
    $stmt->execute();
    echo "Registered Successfully.....";
    $stmt->close();
    $conn->close();
}
      
}
}
?>

