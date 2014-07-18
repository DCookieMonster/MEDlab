<?php
// Make sure the uploaded file is an image of type JPG, GIF, or PNG and that it does not exceed 8000000 bytes (approx. 8 MB) in size. 
if ( !empty($_FILES["photo_file"]["tmp_name"]) && $_FILES["photo_file"]["size"] < 8000000 && ( $_FILES["photo_file"]["type"] == "image/gif" || $_FILES["photo_file"]["type"] == "image/jpeg" || $_FILES["photo_file"]["type"] == "image/pjpeg") ) {   
	// The file has already been saved to a temporary location on the server. Get the temp file's path. 
	$file_path = $_FILES['photo_file']['tmp_name'];  
	 // Grab the User ID we sent from our form 
	// Create the directory where our user photos where be stored, if it doesn't already exist. 
	// We will give our directory name the ID of the user that uploaded the photo. 
	$save_dir = "../../img/about"; 
	if (!file_exists($save_dir)) {   
		// Our directory does not already exists, so create it. 
		mkdir($save_dir, 0755, true); }   
		// Attempt to move the temp file to our user's folder. 
		$save_file_path = $save_dir . "/" . basename($_FILES['photo_file']['name']); 
		$p="img/about/".basename($_FILES['photo_file']['name']);
		if (move_uploaded_file($_FILES['photo_file']['tmp_name'], $save_file_path)) {  
			 // Moving the file was a success! 
			echo("<div>Your photo has been uploaded successfully!</div><div><img src=".$save_file_path." />"); 
			$con=mysqli_connect("localhost","root","9670","cms");
			// Check connection
			if (mysqli_connect_errno()) {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			$tbl_name="aboutPic";
			// escape variables for security
			$name = mysqli_real_escape_string($con, $_POST['name']);
			
			$path = mysqli_real_escape_string($con,$p );

			$sql="INSERT INTO $tbl_name (img,name)
			VALUES ('$path','$name')";

			if (!mysqli_query($con,$sql)) {
			  die('Error: ' . mysqli_error($con));
			}
			echo "'$title' was added";
			mysqli_close($con);
			header("location:../../about.php");
			  } 
			else {  
				 // Moving the file failed. Prompt the user to try again. 
				echo("There was an error uploading your file. Please try again.");   
			} 
		
} 
?>