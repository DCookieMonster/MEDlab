
<?php
// Check if session is not registered, redirect back to main page. 
// Put this code in first line of web page. 
session_start();
$user="Admin";
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
$user=" ".$_SESSION['myusername'];
 




  // connection parameters
$db_host = "localhost";
$username = "root";
$password = "9670";
$db_name = "site_db";
$tb_name = "messages";

// connection variables + connection to mysql and db
$db_con = mysql_connect($db_host, $username, $password);
$result = mysql_select_db($db_name, $db_con);

// page variables
$query = 'SELECT * FROM '.$tb_name.' WHERE \'read\'=0';
$result = mysql_query($query, $db_con);
$num_rows = mysql_num_rows($result);
 

    



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="dash.php">Dashboard</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
	 <li class="active"><a href="Dash.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li ><a href="view.php"><i class="fa fa-table"></i> View Data</a></li>
            <li ><a href="add.php"><i class="fa fa-plus"></i> Add</a></li>
  
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
           
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $user?>  <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">
<div class="row">
		  <div class="col-lg-12">
		            <h1>Dashboard <small>Statistics Overview</small></h1>
		            <ol class="breadcrumb">
		              <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
		            </ol>
		            
		          </div>
		        </div><!-- /.row -->
		
				<div class="row">
				          <div class="col-lg-3">
				            <div class="panel panel-info">
				              <div class="panel-heading">
				                <div class="row">
				                  <div class="col-xs-6">
				                    <i class="fa fa-comments fa-5x"></i>
				                  </div>
				                  <div class="col-xs-6 text-right">
				                    <p class="announcement-heading"><?php echo $num_rows?></p>
				                    <p class="announcement-text">New Messages!</p>
				                  </div>
				                </div>
				              </div>
				              <a href="view/viewmess.php">
				                <div class="panel-footer announcement-bottom">
				                  <div class="row">
				                    <div class="col-xs-6">
				                      View Messages
				                    </div>
				                    <div class="col-xs-6 text-right">
				                      <i class="fa fa-arrow-circle-right"></i>
				                    </div>
				                  </div>
				                </div>
				              </a>
				            </div>
				          </div>
						 <div class="col-lg-3">
				            <div class="panel panel-danger">
				              <div class="panel-heading">
				                <div class="row">
				                  <div class="col-xs-6">
				                    <i class="fa fa-pencil fa-5x"></i>
				                  </div>
				                  <div class="col-xs-6 text-right">
				                    <p class="announcement-heading">Edit</p>
				                    <p class="announcement-text">your site!</p>
				                  </div>
				                </div>
				              </div>
				              <a href="../index.php">
				                <div class="panel-footer announcement-bottom">
				                  <div class="row">
				                    <div class="col-xs-6">
				                      View Messages
				                    </div>
				                    <div class="col-xs-6 text-right">
				                      <i class="fa fa-arrow-circle-right"></i>
				                    </div>
				                  </div>
				                </div>
				              </a>
				            </div>
				          </div>
						    <div class="col-lg-3">
					            <div class="panel panel-success">
					              <div class="panel-heading">
					                <div class="row">
					                  <div class="col-xs-6">
					                    <i class="fa fa-tasks fa-5x"></i>
					                  </div>
					                  <div class="col-xs-6 text-right">
					                    <p class="announcement-heading">View</p>
					                    <p class="announcement-text">All the Data</p>
					                  </div>
					                </div>
					              </div>
					              <a href="View.php">
					                <div class="panel-footer announcement-bottom">
					                  <div class="row">
					                    <div class="col-xs-6">
					                      Go
					                    </div>
					                    <div class="col-xs-6 text-right">
					                      <i class="fa fa-arrow-circle-right"></i>
					                    </div>
					                  </div>
					                </div>
					              </a>
					            </div>
					          </div>
				          <div class="col-lg-3">
				            <div class="panel panel-warning">
				              <div class="panel-heading">
				                <div class="row">
				                  <div class="col-xs-6">
				                    <i class="fa fa-plus fa-5x"></i>
				                  </div>
				                  <div class="col-xs-6 text-right">
				                    <p class="announcement-heading">Add</p>
				                    <p class="announcement-text">To The DB</p>
				
				                  </div>
				                </div>
				              </div>
				              <a href="add.php">
				                <div class="panel-footer announcement-bottom">
				                  <div class="row">
				                    <div class="col-xs-6">
				                      Go
				                    </div>
				                    <div class="col-xs-6 text-right">
				                      <i class="fa fa-arrow-circle-right"></i>
				                    </div>
				                  </div>
				                </div>
				              </a>
				            </div>
				          </div>
				      
				         
				        </div><!-- /.row -->
		
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="js/morris/chart-data-morris.js"></script>
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>

  </body>
</html>
