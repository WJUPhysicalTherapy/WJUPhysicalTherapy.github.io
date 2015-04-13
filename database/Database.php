<?php
class Database {
	protected $conn, $_result, $_numRows;
	
	public function __construct($server, $username, $password, $db){
		global $conn;
		$conn = mysqli_connect($server, $username, $password, $db);
		if(!$conn){
			die("Connection Failed: ".mysqli_connect_error());
		}
		//echo "Connected Successfully<br/>";
	}
	
	public function disconnect() {
		mysql_close($conn);
	}
	
	public function query($sql){
		global $conn;
		//echo $sql;
		
		if(!$conn){
			echo "Boo No Connection!";
		}
		//$sql = "SELECT course_title FROM classes"
		$result = mysqli_query($conn, $sql);
		//echo $conn;
		if(mysqli_num_rows($result) > 0){
			//output data of each row
			
			while($row = mysqli_fetch_assoc($result)){
				echo "<tr><td>".$row["course_number"]."</td>
						  <td>".$row["course_title"]."</td>
						  <td>".$row["contact_hours"]."</td>
						  <td>".$row["credits"]."</td>
						  <td>".$row["schedule_days"]."</td>
					  </tr>";
			}
		} else {
			echo "0 results";
		}
	}

	public function querySingle($col, $where){
		global $conn;
		$sql = "SELECT ".$col." FROM classes WHERE course_number ='".$where."';";
		//echo $sql;
		
		if(!$conn){
			echo "Boo No Connection!";
		}
		//$sql = "SELECT course_title FROM classes"
		$result = mysqli_query($conn, $sql);
		//echo $conn;
		if(mysqli_num_rows($result) > 0){
			//output data of each row
			while($row = mysqli_fetch_assoc($result)){
				echo $row[$col];
			}
		} else {
			echo "0 results";
		}
		return $row = mysqli_fetch_assoc($result);
	}

	public function queryProfile($col, $where){
		global $conn;
		$sql = "SELECT ".$col." FROM login WHERE email ='".$where."';";
		//echo $sql;
		
		if(!$conn){
			echo "Boo No Connection!";
		}
		//$sql = "SELECT course_title FROM classes"
		$result = mysqli_query($conn, $sql);
		//echo $conn;
		if(mysqli_num_rows($result) > 0){
			//output data of each row
			while($row = mysqli_fetch_assoc($result)){
				echo $row[$col];
			}
		} else {
			echo "0 results";
		}
		//return $row = mysqli_fetch_assoc($result);
	}

	public function update($sql){
		global $conn;
		if(mysqli_query($conn, $sql)){
			echo "Record Updated Successfully";
		}else {
			echo "Error updating Record: ".mysqli_error($conn);
		}

	}
	
	public function insert($cn, $ct, $ch, $credits, $schedule_days){
		global $conn;
		
		$sql = "INSERT INTO classes(course_number, course_title, contact_hours, credits, schedule_days)
				VALUES('".$cn."', '".$ct."', '".$ch."', '".$credits."', '".$schedule_days."');";
		if($cn == "" || $ct == "" || $ch == "" || $credits == ""){
			echo "Not Added";
		}else if(mysqli_query($conn, $sql)){
			//echo "<script type='text/javascript'>alert('New record created');</script>";
		}else{
			echo mysqli_error($conn);
		}
	}
	
	public function numRows() {
		return $this->_numRows;
	}
}
?>