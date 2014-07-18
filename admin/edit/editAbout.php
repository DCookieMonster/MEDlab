<?php
//logout after $timeoff in sec

    
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="9670"; // Mysql password 
$db_name="site_db"; // Database name 
$tbl_name="about"; // Table name

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
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<script src="tinymce/js/tinymce/tinymce.dev.js"></script>
	<script src="tinymce/js/tinymce/plugins/table/plugin.dev.js"></script>
	<script src="tinymce/js/tinymce/plugins/paste/plugin.dev.js"></script>
	<script src="tinymce/js/tinymce/plugins/spellchecker/plugin.dev.js"></script>
	<script>
		tinymce.init({
			selector: "textarea#text",
			theme: "modern",
			plugins: [
				"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
				"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
				"save table contextmenu directionality emoticons template paste textcolor importcss"
			],
			content_css: "css/development.css",
			add_unload_trigger: false,

			toolbar1: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons table",
			toolbar2: "custompanelbutton textbutton spellchecker",

			image_advtab: true,

			style_formats: [
				{title: 'Bold text', format: 'h1'},
				{title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
				{title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
				{title: 'Example 1', inline: 'span', classes: 'example1'},
				{title: 'Example 2', inline: 'span', classes: 'example2'},
				{title: 'Table styles'},
				{title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
			],

			template_replace_values : {
				username : "Jack Black"
			},

			template_preview_replace_values : {
				username : "Preview user name"
			},

			//file_browser_callback: function() {},

			templates: [ 
				{title: 'Some title 1', description: 'Some desc 1', content: '<strong class="red">My content: {$username}</strong>'}, 
				{title: 'Some title 2', description: 'Some desc 2', url: 'development.html'} 
			],

			setup: function(ed) {
				ed.addButton('custompanelbutton', {
					type: 'panelbutton',
					text: 'Panel',
					panel: {
						type: 'form',
						items: [
							{type: 'button', text: 'Ok'},
							{type: 'button', text: 'Cancel'}
						]
					}
				});

				ed.addButton('textbutton', {
					type: 'button',
					text: 'Text'
				});
			},

			spellchecker_callback: function(method, words, callback) {
				if (method == "spellcheck") {
					var suggestions = {};

					for (var i = 0; i < words.length; i++) {
						suggestions[words[i]] = ["First", "second"];
					}

					callback(suggestions);
				}
			}
		});
	</script>
	<style>
	*:focus {
		outline: 1px solid red !important;
	}
	</style>
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
             <form name="form1" role="form" method="post" action="update_about.php">
                <textarea id="text" name="text" rows="15" cols="80" style="width: 80%"><?php echo $rows['text'];?></textarea>
				
			    <input name="id" type="hidden" id="id" value="<?php echo $rows['id']; ?>">

                                            <button type="submit" class="btn btn-default">Submit</button>

                           <button type="reset" class="btn btn-default">Reset</button>  

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

