 <?php
require('func.php');
$tb_name="Pages";
$title="contact";
$query="SELECT * FROM $tb_name WHERE title=\"$title\"";
$row=getDB($tb_name,$query);

$tb_name="template";
$query="SELECT * FROM $tb_name WHERE id='2'";
$main_rows=getDB($tb_name,$query);



?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Contact Us</title>
<?php echo $main_rows['head']?>
</head>

<body  dir="ltr" >
	<?php
		editable($title);

	?>
     <div class="wrapper" >
        <div id="topmenu" class="topmenu">

<?php echo $main_rows['header']?>

<?php echo $main_rows['topbar']?>
  <div id="intro">
   <link href="styles/style.css" rel="stylesheet" />



                <div class="container">

                    <div class="row wrap"> 

                        <div class="col-lg-12">
                            <h1 class="page-header-top">Contact Us
                            </h1>
                            <ol class="breadcrumb">
                                <li><a href="index.html">Home</a>
                                </li>
                                <li class="active">Contact Us</li>
                            </ol>
                        </div>
  
		      <?php echo stripslashes($row['content']); ?>
				                    </div>

			</div>          <!--  end container -->

			          </div>
			   
     
<?php echo $main_rows['footer'];?>
   
			<?php echo $main_rows['copyright'];?>



      </div>
         </div>
</body>

</html>
