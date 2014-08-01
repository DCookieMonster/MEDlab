 <?php

require('../func.php');
  // connection parameters
require('../admin/con.php');

$db_name = "cms";
$tb_name = "about";

// connection variables + connection to mysql and db
$db_con = mysql_connect($db_host, $username, $password);
$result = mysql_select_db($db_name, $db_con);
$tag=mysql_real_escape_string($_GET['tag']);


// page variables
$query = "SELECT * FROM $tb_name WHERE tag='$tag'" ;
$result = mysql_query($query, $db_con);
// successful result

$row = mysql_fetch_array($result);

$tb_name="template";
$query="SELECT * FROM $tb_name WHERE id='4'";
$main_rows=getDB($tb_name,$query);

$tb_name="Pages";
$query="SELECT * FROM $tb_name WHERE id='4'";
$rows=getDB($tb_name,$query);



?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo $row['name']?></title>
<?php echo $main_rows['head']?>
</head>

<body  dir="ltr" >
	<?php
		Memeditable($row['tag']);

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
	                    id="<?php echo$row['tag'];?>" >
	                    <h2 class="page-header" style="font-size: 28px"><?php echo$row['name'];?></h2>
	                              <ol class="breadcrumb">
	                                <li><a href="../index.php">Home</a>
	                                </li>
	                                <li><a href="../about.php">Members</a></li>
	                                 <li class="active"><?php echo$row['name'];?></li>
	                            </ol>
	                    <div id="member"
	                         >
	<?php echo$row['content'];?>

<div id="Publications">
	<?php if($row['link']==NULL){
		echo'      <h4><a href="#" onclick="PublicationFunc()" >See Publications</a></h4>
              <script>
function PublicationFunc() {
alert("Sorry, I don\'t have Publictions yet.");
}
</script>';
	}
	else{
		echo '<h4><a href="'.$row['link'].'" >See Publications</a></h4>';
	}
	
	?>
               
                     </div>
             </div>
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
