
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
          <a class="navbar-brand" href="../view.php">View Data</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
			 <li ><a href="../Dash.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	
            <li ><a href="../view.php"><i class="fa fa-table"></i> View Data</a></li>
            <li class="active"><i class="fa fa-table"></i>Publication Data</li>
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
            <h1>View <small>the data of the publications database</small></h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-table"></i> View Data</li>
             <li class="active"><i class="fa fa-pencil"></i>Publications</li>

            </ol>
          
          </div>
        </div><!-- /.row -->
<?php
  // connection parameters
$db_host = "localhost";
$username = "root";
$password = "9670";
$db_name = "site_db";
$tb_name = "Publications";

// connection variables + connection to mysql and db
$db_con = mysql_connect($db_host, $username, $password);
$result = mysql_select_db($db_name, $db_con);

// page variables
$query = 'SELECT * FROM '.$tb_name;
$result = mysql_query($query, $db_con);
// successful result
echo' <div class="row">';
echo '<div class="col-lg-12"> <div class="table-responsive">
<table class="table table-bordered table-hover table-striped tablesorter" align="center">
    <thead>
    <tr>
    <th>id</th>
    <th>name</th>
	<th>subject</th>
	<th>year</th>
    <th>tag</th>
    <th>title</th>
    <th>abstract</th>
    <th>link</th>
</tr>
</thead> 
<tbody>';

while ($row = mysql_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['subject'] . "</td>";
    echo "<td>" . $row['year'] . "</td>";
    echo "<td>" . $row['tag'] . "</td>";
    echo "<td>" . $row['title'] . "</td>";
    echo "<td>" . $row['abstract'] . "</td>";
    echo "<td>" . $row['link'] . "</td>";
    echo "</tr>";
}
echo "</tbody></table></div></div>";
echo "</div>";
mysql_close($db_con);
?>
        <div class="row">
         <div class="col-lg-12">
      <form action="../edit/editPublication.php" action="POST">
          <div class="col-lg-2" align="center">
              
          <div class="form-group">
                <label>Edit row</label>
                <input name="edit" class="form-control" placeholder="Enter ID">
              </div>
                  <button type="submit" class="btn btn-default">Edit</button>
            
</div>
          </form>
                          
             <form action="../del/del.php" action="POST">

          <div class="col-lg-2" align="center">   
              <div class="form-group">
                <label>Delete row</label>
                <input name="del"  class="form-control" placeholder="Enter ID">
                <input name="tbl_name" type="hidden" id="tbl_name" value="Publications">

              </div>
                  <button type="submit" class="btn btn-default" >Delete</button></div>      


	</form>
                     <form action="../add/addpublications.php" action="POST">

          <div class="col-lg-2" align="center">   
              <div class="form-group">
                <label>Add row</label>
              </div>
                  <button type="submit" class="btn btn-default" >Add</button></div>      


	</form>
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
