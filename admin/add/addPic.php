<?php
// Check if session is not registered, redirect back to main page. 
// Put this code in first line of web page. 
session_start();

//if(!session_is_registered($myusername)){
if (!isset($_SESSION['myusername'])){
    echo "here";
header("location:logout.php");

}
//logout after $timeoff in sec
if (time()-$_SESSION['time']>$_SESSION['howLong']){
    header("location:logout.php");

}
$_SESSION['time']=time();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Add Pictures</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/	signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
	
		
      <form class="form-signin"  action="upload_file.php" method="post" enctype="multipart/form-data" role="form">
        <h2 class="form-signin-heading">Add Picture</h2>
        <input name="name" type="text" id="name" class="form-control" placeholder="Picture Name" required>
		<br class="clear"/>

 		<div>Upload your photo:</div> <input type="file" name="photo_file" />

       	<input type="hidden" name="max_file_size" value="8000000" /> 
		<br class="clear"/>
        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Add</button>
        <input type=button onClick="location.href='../../about.php'" value='Back to About' class="btn btn-lg btn-warning btn-block" />

      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>