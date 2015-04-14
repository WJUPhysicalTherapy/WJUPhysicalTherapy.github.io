<?php
//Converting db values into json data

header('Content-type:application/json');

$conn = mysqli_connect('localhost', 'wjuphysi_nic', 'physical2015', 'wjuphysi_syllabi') or die(mysqli_connect_error());


$select = mysqli_query($conn, "SELECT * FROM 'classes'");

$rows=array();

while($row=mysqli_fetch_array($select, MYSQLI_ASSOC)){
	$rows[] = $row;
}

echo json_encode($rows);
?>