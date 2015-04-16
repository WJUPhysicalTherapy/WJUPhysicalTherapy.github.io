<?php session_start();
  if(isset($_SESSION["myusername"])){
  }else{
    header("location:../index.html");
    //die();
  }
?>
<?php
require_once('../database/Database.php');

$db = new Database('localhost', 'wjuphysi_nic', 'physical2015', 'wjuphysi_syllabi');?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../css/starter-template.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  	
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../index.html">WJU PT</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../faculty/profile/profile.php"><?php echo $db->queryProfile("first_name", $_SESSION['myusername']); echo  " "; echo $db->queryProfile("last_name", $_SESSION['myusername']); ?></a></li>
            <li><a href="../faculty/faculty.php">Dashboard</a></li>
            <li><a href="/login/logout.php">Logout</a></li>
          </ul>
          <!--<form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>-->
        </div>
      </div>
    </nav>

    <div class="container">

	  <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="faculty.php">Overview</a></li>
            <li class="active"><a href="documents.html">Documents <span class="sr-only">(current)</span></a></li>
            <li><a href="classes.html">Classes</a></li>
          </ul>
      </div>
      <div class="starter-template">
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h1>Select a Syllabus</h1>
      <div class="list-group" >
      <form method="post" action="classes/class3.php">
      <!--<button type="submit" class="list-group-item" value="617" name="classNumber" style="width:100%;">Service Learning I</button><br/>
      <button type="submit" class="list-group-item" value="627" name="classNumber" style="width:100%;">Service Learning II</button>
      <button type="submit" class="list-group-item" value="627" name="classNumber" style="width:100%;"></button>-->
      <?php $db->queryFiles()?>
      </form>
	</div>
	<!--<button type="file" class="btn btn-default btn-lg">-->
		<div class="file_button_container btn btn-default btn-lg btn-file"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span>&nbsp;Upload Old Document<input type="file" value="Upload New Document" /></div>
	<a href="add-syllabus.php"><button type="button" class="btn btn-default btn-lg">
		<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create New Syllabus
	</button></a>

      </div>
        <!--h1>Bootstrap starter template</h1>
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p-->


        
        <!--
        <div class="g-savetodrive"
	        data-src="http://wjuphysicaltherapy.github.io/images/wjuBanner.jpg"
	        data-filename="wjuBanner.jpg"
	        data-sitename="WJUPTSyllabus">
        </div>*/-->
      </div>

    </div><!-- /.container */-->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
<?php $db->disconnect();?>