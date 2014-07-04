<?php
//logout after $timeoff in sec

    
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="9670"; // Mysql password 
$db_name="site_db"; // Database name 
$tbl_name="publications"; // Table name

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// get value of id that sent from address bar
//$id=$_GET['edit'];
$idtmp=$_GET['edit'];
$id=mysql_real_escape_string($idtmp);

// Retrieve data from database 
$sql="SELECT * FROM $tbl_name WHERE id='$id'";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);

// close connection 
mysql_close();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit</title>

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
          <a class="navbar-brand" href="#">Edit</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
			 <li ><a href="../Dash.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	
                <li><a href="view.php"><i class="fa fa-table"></i> View Data</a></li>
              <li class="active"><i class="fa fa-edit"></i> Edit</li>
            <li ><a href="addp.php"><i class="fa fa-plus"></i> Add</a></li>
          

          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
           
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <b class="caret"></b></a>
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
            <h1>Edit <small>the chosen row from the database</small></h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-edit"></i> Edit</li>
            </ol>
         
          </div>
        </div><!-- /.row -->

        <div class="row">
         <div class="col-lg-12">
             <form name="form1" role="form" method="post" action="update_publications.php">
                <div class="form-group">
                <label>Name:</label>
                <input class="form-control" type="text" id="name" name="name" value="<?php echo $rows['name']; ?>">
                <p class="help-block">Name of the author</p>
              </div>
			 <div class="form-group">
                <label>Subject:</label>
                <input class="form-control" type="text" id="subject" name="subject" value="<?php echo $rows['subject']; ?>">
                <p class="help-block">Subject of the publication</p>
              </div>
			 <div class="form-group">
                <label>Year:</label>
                <input class="form-control" type="text" id="year" name="year" value="<?php echo $rows['year']; ?>">
                <p class="help-block">Year of the publication</p>
              </div>
                 <div class="form-group">
                <label>Tag:</label>
                <input class="form-control" type="text" id="tag" name="tag" value="<?php echo $rows['tag']; ?>">
                <p class="help-block">Tag of the page</p>
              </div>
              <div class="form-group">
                <label>Title:</label>
                <input class="form-control" type="text" id="title" name="title" value="<?php echo $rows['title']; ?>">
                <p class="help-block">Title of the page</p>
              </div>
              <div class="form-group">
                <label>Abstract</label>
                <textarea class="form-control" rows="3" name="abstract" type="text" id="abstract"> <?php echo $rows['abstract']; ?></textarea>
                <p class="help-block">The abstract of the publication.</p>
              </div>
			
              <div class="form-group">
                <label>Link</label>
                <input class="form-control" name="link" type="text" id="link" value="<?php echo $rows['link']; ?>">
                <p class="help-block">The link to the pdf.</p>
              </div>
                 <input name="id" type="hidden" id="id" value="<?php echo $rows['id']; ?>">

                                            <button type="submit" class="btn btn-default">Submit</button>

                           <button type="reset" class="btn btn-default">Reset</button>  

</form>
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

