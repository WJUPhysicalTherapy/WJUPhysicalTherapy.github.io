<?php
class Database {
	protected $conn, $_result, $_numRows;
	
	public function __construct($server, $username, $password, $db){
		global $conn;
		$conn = mysqli_connect($server, $username, $password, $db);
		if(!$conn){
			die("Connection Failed: ".mysqli_connect_error());
		}
		echo "Connected Successfully<br/>";
	}
	
	public function disconnect() {
		mysql_close($conn);
	}
	
	public function query($sql){
		global $conn;
		//echo $sql;
		
		if(!$conn){
			echo $sql."hello";
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
						  <td>".$row["schedule"]."</td>
					  </tr>";
			}
		} else {
			echo "0 results";
		}
	}
	
	public function numRows() {
		return $this->_numRows;
	}
	
	public function rows(){
		//PHP for Absolute Beginners
		//Video Lecture 52: MySQL Database Example Part 3
		
	}
}
?>