<?php
require_once('../database/Database.php');

$db = new Database('localhost', 'wjuphysi_nic', 'physical2015', 'wjuphysi_syllabi');
//$profileDb = new Database('localhost', 'wjuphysi_chafo', 'physical2015', 'wjuphysi_profiles');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

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
            <li><a href="/faculty/profile/profile.php?<?php echo $_POST['email']?>">Craig Ruby</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          <!--<form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>-->
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="faculty.php">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="documents.html">Documents</a></li>
            <li><a href="classes.html">Classes</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>

          <h2 class="sub-header">Classes</h2>
          <div class="table-responsive">
            <table data-url="../database/data1.json"class="table table-striped" data-sort-name="name" data-sort-order="desc">
              <thead>
                <tr>
                  <th data-field="id" data-sortable="true">#</th>
                  <th data-field="name" data-sortable="true">Course</th>
                  <th data-field="price" data-sortable="true">Contact Hours</th>
                  <th data-field="credits" data-sortable="true">Credits</th>
                  <th data-field="schedule" data-sortable="true">Days</th>
				  <th data-field="taxonomy" data-sortable="true">Taxonomy</th>
                </tr>
              </thead>
              <tbody>
              <?php $db->query("SELECT course_number, course_title, contact_hours, credits, schedule_days, taxonomy FROM classes");?>
                
              </tbody>
            </table>
          </div>
        </div>
      </div><!--End Div Row-->
    </div>
<?php $db->disconnect();?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../../assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
