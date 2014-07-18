 <?php

require('../func.php');
  // connection parameters
$db_host = "localhost";
$username = "root";
$password = "9670";
$db_name = "cms";
$tb_name = "Pages";






$tb_name="template";
$query="SELECT * FROM $tb_name WHERE id='4'";
$main_rows=getDB($tb_name,$query);

$tb_name="Pages";
$query="SELECT * FROM $tb_name WHERE title='Undergrduate Projects'";
$rows=getDB($tb_name,$query);



?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Undergrduate Projects</title>
<?php echo $main_rows['head']?>
</head>

<body  dir="ltr" >
	<?php
		editable($rows['title']);

	?>
     <div class="wrapper" >
        <div id="topmenu" class="topmenu">

<?php echo $main_rows['header']?>

<?php echo $rows['topbar']?>
 	 <div id="intro">
	            <div>
	                    <!-- Custom CSS for the 'Round About' Template -->
	         <link href="../styles/style.css"rel="stylesheet" />
	     <div class="container">

	        <div class="row">
	                         <div class="col-lg-12" style="width:1000px"
	                    id="ugprojects" >
	<br class="clear"/>
	                    <h2 class="page-header-top"><?php echo$rows['title'];?></h2>
						<br class="clear"/>
	
	                              <ol class="breadcrumb">
	                                <li><a href="../index.php">Home</a>
	                                </li>
	                                 <li class="active"><?php echo$rows['title'];?></li>
	                            </ol>
	                    <div id="member"
	                         >
	<?php echo$rows['content'];?>


               
                     </div>
      
 

 </div>
 <!-- /container -->

 <!-- JavaScript -->
 <script src="../js/jquery-1.10.2.js"></script>
 <script src="../js/bootstrap.js"></script>
</div>
         </div>
     </div>
<?php echo $main_rows['footer'];?>
   
			<?php echo $main_rows['copyright'];?>



      </div>
         </div>
</body>

</html>
