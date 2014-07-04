
<?php
// Check if session is not registered, redirect back to main page. 
// Put this code in first line of web page. 
session_start();

//if(!session_is_registered($myusername)){
if (!isset($_SESSION['myusername'])){
    echo "here";
header("location:../index.php");

}
//logout after $timeoff in sec
if (time()-$_SESSION['time']>$_SESSION['howLong']){
    header("location:../logout.php");

}
$_SESSION['time']=time();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin User</title>

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
          <a class="navbar-brand" href="add.php">Add</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
			 <li ><a href="Dash.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="view.php"><i class="fa fa-table"></i> View Data</a></li>
            <li class="active"><a href="add.php"><i class="fa fa-plus"></i> Add</a></li>

          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
           
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php $_SESSION['myusername'] ?> <b class="caret"></b></a>
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
            <h1>Add <small>to all database</small></h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-plus"></i> Add </li>
            </ol>
            
          </div>
        </div><!-- /.row -->

        <div class="row">
               <div class="col-lg-4">
                         <form action="add/addsearch.php" method="post">

  <div class="panel panel-info" align="center">
              <div class="panel-heading">
                <h3 class="panel-title">Search Engine</h3>
              </div>
              <div class="panel-body">
                Add to the "Search Engine" Database.<br><br>
                <button type="submit" class="btn btn-primary">GO TO</button>

              </div>
      </div>
                             </form>
            </div>
    <div class="col-lg-4">
            <form action="add/addpublications.php" method="post">
  <div class="panel panel-success" align="center">
              <div class="panel-heading">
                <h3 class="panel-title">Publications</h3>
              </div>
              <div class="panel-body">
                Add to the "Publications" Database.<br><br>
                <button type="submit" class="btn btn-primary">GO TO</button>

              </div>
      </div>
            </div>
                         </form>

              
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
