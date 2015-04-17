<?php
session_start();
ob_start();
	$host ="localhost"; //Host Name
	$username = "wjuphysi_chafo"; //Mysql username
	$password = "physical2015"; //Mysql password
	$db_name = "wjuphysi_syllabi";//DB
	$tbl_name ="profiles";//table name

	//Connect to server and select database
	$conn = mysqli_connect("$host", "$username", "$password", "$db_name") or die ("Cannot connect");

	//username and password sent from form
	$myusername =$_POST['username'];
	$mypassword=$_POST['password'];
	//To protect MySQL injection
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);
	//$myusername = mysqli_real_escape_string($myusername);
	//$mypassword = mysqli_real_escape_string($mypassword);
	echo "Username: $myusername Password: $mypassword <br/>";
	$sql = "SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
	$sqlId = "SELECT id FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
	$result = mysqli_query($conn, $sql);
	$idResult = mysqli_query($conn, $sql);
	if(mysqli_num_rows($idResult) > 0){
			//output data of each row
		while($row = mysqli_fetch_assoc($idResult)){
			//echo $row[$col];
			$_SESSION['id'] = $row['id'];
		}
	} else {
		echo = "0 results";
	}

	//echo "Result: ".$result."<br/>";
	//Mysql_num_row is counting table row
	$count = mysqli_num_rows($result);
	echo "Count: ".$count."<br/>";
	//If result matched $myusename and $mypassword,table row must be 1 row
	if($count==1){
		$_SESSION['myusername'] = $myusername;
		header("Location:/faculty/faculty.php");
	}else{
		header("location:/login/login.php?failed=true");
		echo "Wrong Username or Password <br/>";
	}
	ob_end_flush()

?>