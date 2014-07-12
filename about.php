 <?php
require('func.php');
$tb_name="Pages";
$title="about";
$query="SELECT * FROM $tb_name WHERE title=\"$title\"";
$row=getDB($tb_name,$query);

$tb_name="template";
$query="SELECT * FROM $tb_name WHERE id='3'";
$main_rows=getDB($tb_name,$query);


$tb_name="aboutPic";
$query="SELECT * FROM $tb_name";
$res=getRuData($tb_name,$query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>About us</title>
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
						                            <h1 class="page-header-top">About Us <small>It's Nice to Meet You!</small>
						                            </h1>
						                            <ol class="breadcrumb">
						                                <li><a href="index.html">Home</a>
						                                </li>
						                                <li class="active">Members</li>
						                            </ol>
						                            </div>
						                        </div>
  												<!-- Important Owl stylesheet -->
												<link rel="stylesheet" href="owl-carousel/owl.carousel.css">

												<!-- Default Theme -->
												<link rel="stylesheet" href="owl-carousel/owl.theme.css">

												<!--  jQuery 1.7+  -->
												<script src="owl-carousel/assets/js/jquery-1.9.1.min.js"></script>

												<!-- Include js plugin -->
												<script src="owl-carousel/owl.carousel.js"></script>
												<div class="col-lg-10">
    											<div id="owl-demo" class="owl-carousel owl-theme">
													             <!---  <div class="item"><img class="lazyOwl" data-src="img/about/DSC1.jpg" alt="ourTeam"></div>
													               ---->
																<?php 
																while ($pic = mysql_fetch_array($res)) {
																	echo             '   <div class="item"><img class="lazyOwl" data-src="'.$pic['img'].'" alt="'.$pic['name'].'"></div>';
																}
																?>
													</div>
													</div>
													<script>
												    $(document).ready(function() {

												      $("#owl-demo").owlCarousel({

														    lazyLoad : true,
												   		 autoPlay : 3000,

													      items : 3,
													      itemsDesktop : [1199,3],
													      itemsDesktopSmall : [979,3]
												      });

												    });
												    </script>
												<style>
												#owl-demo .owl-item div{
												  padding:5px;
												}
												#owl-demo .owl-item img{
												  display: block;
												  width: 100%;
												  height: auto;
												  -webkit-border-radius: 3px;
												  -moz-border-radius: 3px;
												  border-radius: 3px;
												}
												</style>
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
