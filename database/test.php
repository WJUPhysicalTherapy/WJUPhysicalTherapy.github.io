<!--<script src="https://apis.google.com/js/platform.js" asynch defer></script>
<meta name="google-signin-client_id" content="858898272907-jrtv6e0h1iklt9m5jo9vhmugfb4i6abk.apps.googleusercontent.com">
-->
<html>
<head>
	<title>SQL DB/Table Testing</title>
	<!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
    <script src="../faculty/faculty.js"></script>
</head>
<body>
<div class="g-signin2" data-onsuccess="onSignIn"></div>
<?php
require_once('Database.php');

$db = new Database('localhost', 'wjuphysi_nic', 'physical2015', 'wjuphysi_syllabus');
?>

<table class='table table-striped'>
	<?php $db->query("SELECT * FROM syllabus");?>
</table>



<?php $db->disconnect();?>
<p id="addHere">Hello</p>
<button onclick="addObjective()">Add</button>

<script type="text/javascript">
	//function add(){
	//	document.getElementById("addHere").innerHTML += " <input placeholder='Type here' class='form-control input-md'>it kinda works";
	//}
</script>

</body>
</html>