<html>
<head>
	<title>SQL DB/Table Testing</title>
	<!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
</head>
<body>
<?php
require_once('Database.php');

$db = new Database('localhost', 'wjuphysi_nic', 'physical2015', 'wjuphysi_syllabus');
?>

<table class='table table-striped'>
	<?php $db->query("SELECT * FROM syllabus");?>
</table>



<?php $db->disconnect();?>
<p>Hello</p>



</body>
</html>