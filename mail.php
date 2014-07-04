<?php 
$name = $_POST['name'];

$email = $_POST['email'];

$message = $_POST['message'];

$con=mysqli_connect("localhost","root","9670","site_db");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$tbl_name="messages";
// escape variables for security
$name = mysqli_real_escape_string($con, $name);
$email = mysqli_real_escape_string($con, $email);
$content = mysqli_real_escape_string($con,$message);

$sql="INSERT INTO $tbl_name (name,email, content)
VALUES ('$name','$email','$content')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
header("location:contact.html");
mysqli_close($con);

?>
