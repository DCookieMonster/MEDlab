
<?php
// Check if session is not registered, redirect back to main page. 
// Put this code in first line of web page. 
session_start();

//if(!session_is_registered($myusername)){
if (!isset($_SESSION['myusername'])){
    echo "here";
header("location:index.php");
	 
//logout after $timeoff in sec
if (time()-$_SESSION['time']>$_SESSION['howLong']){
    header("location:../logout.php");

}
$_SESSION['time']=time();

}


  
    
    



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>View</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="../css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
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
          <a class="navbar-brand" href="../dash.php">Dashboard</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
			 <li ><a href="../Dash.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	
            <li ><a href="../view.php"><i class="fa fa-table"></i> View Data</a></li>
            <li class="active"><i class="fa fa-comments"></i>Messages</li>
            <li ><a href="../add.php"><i class="fa fa-plus"></i> Add</a></li>
  
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
           
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="../logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>View <small>all your messages</small></h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-table"></i> View Data</li>
             <li class="active"><i class="fa fa-comments"></i>Messages</li>

            </ol>
          
          </div>
        </div><!-- /.row -->
<?php
  // connection parameters
	require('../_con.php');

$db_name = "site_db";
$tb_name = "Messages";

// connection variables + connection to mysql and db
$db_con = mysqli_connect($db_host, $username, $password,$db_name);

// page variables
$query = 'SELECT * FROM Messages ORDER BY id DESC';
$result = mysqli_query($db_con,$query);
// successful result
echo' <div class="row">';
echo '<div class="col-lg-12"> <div class="table-responsive">
<table class="table table-bordered table-hover table-striped tablesorter" align="center">
    <thead>
    <tr>
    <th>id</th>
    <th>Name</th>
	<th>email</th>
	<th>Content</th>
    <th>Date</th>
</tr>
</thead> 
<tbody>';

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['content'] . "</td>";
    echo "<td>" . $row['date'] . "</td>";
    echo "</tr>";
}
$query = 'UPDATE `messages` SET `read`=1';
$result = mysqli_query($db_con,$query);

echo "</tbody></table></div></div>";
echo "</div>";
mysqli_close($db_con);
?>
        <div class="row">
         <div class="col-lg-12">
      <form action="../edit/editPublication.php" action="POST">
          <div class="col-lg-2" align="center">
              
        
                          </div>
             
        </div><!-- /.row -->

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="../js/morris/chart-data-morris.js"></script>
    <script src="../js/tablesorter/jquery.tablesorter.js"></script>
    <script src="../js/tablesorter/tables.js"></script>

  </body>
</html>
